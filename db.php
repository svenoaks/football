<?php
class DbHandler
{
    const CURRENT_TIME_PERIOD = 3;

    private $db;

    private $insertPlayingStmt;
    private $checkPersonStmt;
    private $insertPickStmt;

    public function __construct()
    {
        $this->db = $this->connectToDbLocal();
        $this->insertPlayingStmt = $this->db->prepare("INSERT INTO OfficeFootball.Playing (PlayingId, TimePeriodId, TeamAId,
            TeamBId, WinningTeamId, ConditionalWin) VALUES (NULL, ?, ?, ?, ?, 0);");
        $this->insertPickStmt = $this->db->prepare("INSERT INTO OfficeFootball.Pick (PickId, UserId, TimePeriodId, TeamId)
            VALUES (NULL, ?, ?, ?);");
        $this->checkPersonStmt = $this->db->prepare("Select UserId From Person Where Name = ? And Pass = ?;");
    }

    public function __destruct()
    {

        $this->insertPickStmt->close();
        $this->db->close();
    }

    public function insertPlaying($A, $B, $W, $week)
    {
        $this->insertPlayingStmt->bind_param('iiii', $week, $A, $B, $W);
        $success =  $this->insertPlayingStmt->execute();
        $this->insertPlayingStmt->close();
        return $success;
    }
    public function queryForUserId($name, $pass)
    {
        $this->checkPersonStmt->bind_param('ss', $name, $pass);
        $this->checkPersonStmt->execute();
        $this->checkPersonStmt->bind_result($userId);
        $this->checkPersonStmt->fetch();
        $this->checkPersonStmt->close();

        return $userId;
    }
    public function insertPick($userId, $timePeriodId, $teamId)
    {
        //echo $userId . ' '  .  $timePeriodId. ' ' . $teamId. "<br>";
        $this->insertPickStmt->bind_param('iii', $userId, $timePeriodId, $teamId);
        $success =  $this->insertPickStmt->execute();

        return $success;
    }
    public function queryForTeamId($name)
    {
        //TODO change to prepared
        $teamSql = <<<TAG
SELECT *
FROM Team
WHERE Name = '$name'
TAG;

        return $this->db->query($teamSql);
    }

    public function queryForAlias($person)
    {
        $id = $person->getId();
        $aliasSql = <<<TAG
SELECT *
FROM Person
WHERE UserId = $id
TAG;

        return $this->db->query($aliasSql);
    }

    public function queryForTieBreaker($person, $week)
    {
        $id = $person->getId();
        $tieBreakerSql = <<<TAG
SELECT COUNT( * ) As Total
FROM TieBreaker
WHERE TimePeriodId = $week AND UserId = $id
TAG;

        return $this->db->query($tieBreakerSql);
    }

    public function queryForMatches($week)
    {
        $matchesSql = <<<TAG
SELECT *
FROM  UserMatch
WHERE TimePeriodId = $week
TAG;

        return $this->db->query($matchesSql);
    }

    public function queryForPicks($person, $week)
    {
        $id = $person->getId();
        $byDivisionSql = ' ORDER BY DivisionId';
        $picksByDivisionSql = <<<TAG
SELECT Person.UserId, Person.Alias, TeamId, Picks.Name, DivisionId
FROM (
SELECT UserId, Team.TeamId, Team.Name, DivisionId
FROM Pick, Team
WHERE Pick.TeamId = Team.TeamId
AND TimePeriodId = $week
) AS Picks, Person
WHERE Picks.UserId = Person.UserId
AND Person.UserId = $id $byDivisionSql
TAG;


        return $this->db->query($picksByDivisionSql);
    }

    public function queryForWinning($teamId, $week)
    {
        $winningIdSql = <<<TAG
SELECT COUNT( * ) As Total, ConditionalWin
FROM Playing
WHERE TimePeriodId = $week
AND WinningTeamId = $teamId
TAG;

        return $this->db->query($winningIdSql);
    }

    public function queryForScore($person, $week)
    {
        $id = $person->getId();
        $scoreSql = <<<TAG
SELECT COUNT( * ) AS Total
FROM (
SELECT UserId, WinningTeamId
FROM Playing, Pick
WHERE Playing.WinningTeamId = Pick.TeamId
AND Playing.TimePeriodId = $week
AND Pick.TimePeriodId = $week
) AS UserPickedWinner, Person, Team
WHERE Person.UserId = UserPickedWinner.UserId
AND Team.TeamId = UserPickedWinner.WinningTeamId
AND Person.UserId = $id
TAG;
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
	
?>