<?php 
	function echoActiveClassIfRequestMatches($requestUri)
	{
    	$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    	if ($current_file_name == $requestUri)
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
	class DbHandler {
	    const CURRENT_TIME_PERIOD = 1;
	    
	    private $db;
	    
	    public function __construct() {
	         $this->db = $this->connectToDb();
	    }
	    public function __destruct() {
	         $this->db->close();
	    }
	    public function queryForTieBreaker($person, $week)
	    {
	         $tieBreakerSql =
'
SELECT COUNT( * ) As Total
FROM TieBreaker
WHERE TimePeriodId =' . $week .
' AND UserId =' . $person->getId()
;
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
AND Person.UserId =' . $person->getId() . ' ' . $byDivisionSql
;
	        
	         return $this->db->query($picksByDivisionSql);
	    }
	    public function queryForWinning($teamId, $week)
	    {
	        $winningIdSql =
'
SELECT COUNT( * ) As Total, ConditionalWin
FROM Playing
WHERE TimePeriodId =' . $week .
' AND WinningTeamId =' . $teamId
;
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
	    private function connectToDb() {
		     $user="OfficeFootball";
		     $password="footballintheOffice555#";
		     $database="OfficeFootball";
		     $host = "OfficeFootball.db.12033577.hostedresource.com";
	
		     $sql =  new mysqli($host, $user, $password, $database);
		     return $sql;
	    }
	    
	    private function connectToDbLocal() {
		     $user="root";
		     $password="football555";
		     $database="Football";
		     $host = "localhost";
	
		      $sql =  new mysqli($host, $user, $password, $database);
		     return $sql;
	    }
	}
	class Person {
		 private $name;
	     private $alias;
	     private $picks = array();
	     private $id;
	     private $scores = array();
	     private $tieBreaker = array();
	     private $wonMatch = array();
	     
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
	}
	class Pick {
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