<?php
class CommonVariables {
    static $currentTimePeriod = 5;
    static $formEnabled = true;
    static $scorecardEnabled= true;
}
function alreadyPicked($userId, $week, $db)
{
    $pickRs = $db->queryForpick($userId, $week);
    $pickRs->data_seek(0);
    return $pickRs->num_rows;
}
function didPick($teamId, $userId, $week, $db)
{
    $pickRs = $db->queryForpick($userId, $week);
    $pickRs->data_seek(0);
    while($row = $pickRs->fetch_assoc())
    {
        if ($row['TeamId'] == $teamId)
            return true;
    }
    return false;
}
function retrieveAliasFor($person, $db)
{
    $aliasRs = $db->queryForAlias($person);
    $aliasRs->data_seek(0);
    return $aliasRs->fetch_assoc()['Alias'];
}

function determineTeamId($name, $db)
{

    $teamRs = $db->queryForTeamId($name);
    $teamRs->data_seek(0);
    return $teamRs->fetch_assoc()['TeamId'];
}

function determineTotalScores($allMatches, $limit)
{
    $people = array();
    for ($i = 1; $i <= $limit; ++$i) {
        foreach ($allMatches[$i] as $match) {
            $personA = $match['personA'];
            $personB = $match['personB'];
            if (!array_key_exists($personA->getAlias(), $people))
                $people[$personA->getAlias()] = array('score' => 0, 'points' => 0);
            if (!array_key_exists($personB->getAlias(), $people))
                $people[$personB->getAlias()] = array('score' => 0, 'points' => 0);

            if ($personA->getWin($i)) $people[$personA->getAlias()]['score']++;
            if ($personB->getWin($i)) $people[$personB->getAlias()]['score']++;

            $people[$personA->getAlias()]['points'] += $personA->getTotalPoints();
            $people[$personB->getAlias()]['points'] += $personB->getTotalPoints();
        }
    }
    return $people;
}

function getAllMatches($maxWeek)
{
    $allMatches = array();
    for ($i = 1; $i <= $maxWeek; ++$i) {
        $allMatches[$i] = getMatches($i);
    }
    return $allMatches;
}

function getMatches($week)
{
    $db = new DbHandler();
    $matchesRs = $db->queryForMatches($week);
    $matchesRs->data_seek(0);
    $matchesArray = array();
    while ($row = $matchesRs->fetch_assoc()) {

        $personA = new Person($row['UserAId']);
        $personB = new Person($row['UserBId']);

        $personA->setAlias(retrieveAliasFor($personA, $db));
        $personB->setAlias(retrieveAliasFor($personB, $db));

        $fetchPicks = function ($person, $week, $db) {

            $fetchWin = function ($id, $week, $db) {
                $d = $db->queryForWinning($id, $week, $db);
                return $d->fetch_assoc();
            };

            $picksRs = $db->queryForPicks($person, $week);
            $picksRs->data_seek(0);
            while ($pickRow = $picksRs->fetch_assoc()) {
                $winRow = $fetchWin($pickRow['TeamId'], $week, $db);
                $conditionalWin = $winRow['ConditionalWin'];
                $badPick = $pickRow['BadPick'];
                $won = $winRow['Total'] && !$badPick;
                if ($won) $person->incrementPoints();
                $pick = new Pick($pickRow['Name'], $won, $conditionalWin, $badPick);
                $person->pushPick($pick);
            }
        };

        $fetchPicks($personA, $week, $db);
        $fetchPicks($personB, $week, $db);

        $personA->setTieBreaker($week, wonTieBreaker($personA, $week, $db));
        $personB->setTieBreaker($week, wonTieBreaker($personB, $week, $db));

        $personA->setScore($week, determineScore($personA, $week, $db));
        $personB->setScore($week, determineScore($personB, $week, $db));

        $scoreA = $personA->getScore($week);
        $scoreB = $personB->getScore($week);

        if ($scoreA > $scoreB) {
            $personA->setWin($week, true);
        } else
            if ($scoreA < $scoreB) {
                $personB->setWin($week, true);
            } else
                if ($personA->wonTieBreaker($week)) {
                    $personA->setWin($week, true);
                } else {
                    $personB->setWin($week, true);
                }

        array_push($matchesArray, array('personA' => $personA, 'personB' => $personB));
    }
    return $matchesArray;
}

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI']);
    if (strpos($current_file_name, $requestUri) !== false)
        echo ' active';
}

function determineScore($person, $week, $db)
{
    $scoreRs = $db->queryForScore($person, $week);
    $scoreRs->data_seek(0);
    return $scoreRs->fetch_assoc()['Total'];
}

function wonTieBreaker($person, $week, $db)
{
    $tieRs = $db->queryForTieBreaker($person, $week);
    $tieRs->data_seek(0);
    return $tieRs->fetch_assoc()['Total'];
}


class Person
{
    private $name;
    private $alias;
    private $picks = array();
    private $id;
    private $scores = array();
    private $tieBreaker = array();
    private $wins = array();
    private $totalPoints;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTotalPoints()
    {
        return $this->totalPoints;
    }
    public function incrementPoints()
    {
        $this->totalPoints++;
    }
    public function pushPick($pick)
    {
        array_push($this->picks, $pick);
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getPickAt($i)
    {
        if (!array_key_exists($i, $this->picks)) return NULL;
        return $this->picks[$i];
    }

    public function getPickCount()
    {
        return count($this->picks);
    }

    public function setScore($week, $value)
    {
        $this->scores[$week] = $value;
    }

    public function getScore($week)
    {
        return $this->scores[$week];
    }

    public function setTieBreaker($week, $value)
    {
        $this->tieBreaker = $value;
    }

    public function wonTieBreaker($week)
    {
        return $this->tieBreaker;
    }

    public function setWin($week, $value)
    {
        $this->wins[$week] = $value;
    }

    public function getWin($week)
    {
        if (!array_key_exists($week, $this->wins))
            return false;
        return $this->wins[$week];
    }
}

class Pick
{
    private $teamName;
    private $won;
    private $conditionalWin;
    private $badPick;

    public function __construct($teamName, $won, $conditionalWin, $badPick)
    {
        $this->teamName = $teamName;
        $this->won = $won;
        $this->conditionalWin = $conditionalWin;
        $this->badPick = $badPick;
    }

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function didWin()
    {
        return $this->won;
    }

    public function wasConditionalWin()
    {
        return $this->conditionalWin;
    }
    public function isBadPick() {
        return $this->badPick;
    }
}

?>