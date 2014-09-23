<?php
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
                $people[$personA->getAlias()] = 0;
            if (!array_key_exists($personB->getAlias(), $people))
                $people[$personB->getAlias()] = 0;

            if ($personA->getWin($i)) $people[$personA->getAlias()]++;
            if ($personB->getWin($i)) $people[$personB->getAlias()]++;
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
            while ($row = $picksRs->fetch_assoc()) {
                $winRow = $fetchWin($row['TeamId'], $week, $db);
                $won = $winRow['Total'];
                $conditionalWin = $winRow['ConditionalWin'];
                $pick = new Pick($row['Name'], $won, $conditionalWin);
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

class DbHandler
{
    const CURRENT_TIME_PERIOD = 2;

    private $db;

    public function __construct()
    {
        $this->db = $this->connectToDbLocal();
    }

    public function __destruct()
    {
        $this->db->close();
    }
    public function insertPlaying($A, $B, $W, $week)
    {
        if (!isset($A)) $A = 'NULL';
        if (!isset($B)) $B = 'NULL';
        if (!isset($W)) $W = 'NULL';
        $insertSql =
            '
            INSERT INTO OfficeFootball.Playing (PlayingId, TimePeriodId, TeamAId,
            TeamBId, WinningTeamId, ConditionalWin) VALUES (NULL, ' . $week . ',' . $A . ',' . $B . ',' . $W . ',' . '0)';
        return $this->db->query($insertSql);
        
    }
    public function queryForTeamId($name)
    {
        $teamSql =
            "
SELECT *
FROM Team
WHERE Name = '$name'";
        return $this->db->query($teamSql);

    }
    public function queryForAlias($person)
    {
        $aliasSql =
            '
SELECT *
FROM Person
WHERE UserId = ' . $person->getId();
        return $this->db->query($aliasSql);
    }
    public function queryForTieBreaker($person, $week)
    {
        $tieBreakerSql =
            '
SELECT COUNT( * ) As Total
FROM TieBreaker
WHERE TimePeriodId =' . $week .
            ' AND UserId =' . $person->getId();
        return $this->db->query($tieBreakerSql);
    }

    public function queryForMatches($week)
    {
        $matchesSql =
            '
SELECT * 
FROM  UserMatch
WHERE TimePeriodId =' . $week;
        return $this->db->query($matchesSql);
    }

    public function queryForPicks($person, $week)
    {
        $byDivisionSql = ' ORDER BY DivisionId';
        $picksByDivisionSql =
            '
SELECT Person.UserId, Person.Alias, TeamId, Picks.Name, DivisionId
FROM (
SELECT UserId, Team.TeamId, Team.Name, DivisionId
FROM Pick, Team
WHERE Pick.TeamId = Team.TeamId
AND TimePeriodId =' . $week . '
) AS Picks, Person
WHERE Picks.UserId = Person.UserId
AND Person.UserId =' . $person->getId() . ' ' . $byDivisionSql;

        return $this->db->query($picksByDivisionSql);
    }

    public function queryForWinning($teamId, $week)
    {
        $winningIdSql =
            '
SELECT COUNT( * ) As Total, ConditionalWin
FROM Playing
WHERE TimePeriodId =' . $week .
            ' AND WinningTeamId =' . $teamId;
        return $this->db->query($winningIdSql);
    }

    public function queryForScore($person, $week)
    {
        $scoreSql =
            '
SELECT COUNT( * ) AS Total
FROM (

SELECT UserId, WinningTeamId
FROM Playing, Pick
WHERE Playing.WinningTeamId = Pick.TeamId
AND Playing.TimePeriodId =' . $week . ' ' . '
AND Pick.TimePeriodId =' . $week . ' ' . '
) AS UserPickedWinner, Person, Team
WHERE Person.UserId = UserPickedWinner.UserId
AND Team.TeamId = UserPickedWinner.WinningTeamId
AND Person.UserId =' . $person->getId();

        return $this->db->query($scoreSql);
    }

    private function connectToDb()
    {
        $user = "OfficeFootball";
        $password = "footballintheOffice555#";
        $database = "OfficeFootball";
        $host = "OfficeFootball.db.12033577.hostedresource.com";

        $sql = new mysqli($host, $user, $password, $database);
        return $sql;
    }

    private function connectToDbLocal()
    {
        $user = "root";
        $password = "football555";
        $database = "OfficeFootball";
        $host = "localhost";

        $sql = new mysqli($host, $user, $password, $database);
        return $sql;
    }
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

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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

    public function __construct($teamName, $won, $conditionalWin)
    {
        $this->teamName = $teamName;
        $this->won = $won;
        $this->conditionalWin = $conditionalWin;
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
}

?>