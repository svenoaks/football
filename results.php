<?php
	include_once("db.php");
 	include_once("utility.php");
	include_once("header.php");
	
	define ("TIME_PERIOD", '1');
	
	class Person {
		 private $name;
	     private $alias;
	     private $picks = array();
	     private $id;
	     
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
	
		$matchesSql =
	'	
SELECT * 
FROM  UserMatch
WHERE TimePeriodId =' . TIME_PERIOD;

    $picksByDivisionSql = 
'
SELECT Person.UserId, Person.Alias, TeamId, Picks.Name, DivisionId
FROM (
SELECT UserId, Team.TeamId, Team.Name, DivisionId
FROM Pick, Team
WHERE Pick.TeamId = Team.TeamId
AND TimePeriodId =1
) AS Picks, Person
WHERE Picks.UserId = Person.UserId
AND Person.UserId =
';
	$byDivisionSql = ' ORDER BY DivisionId';
	
    $winningIdSql =
'
SELECT COUNT( * ) As Total
FROM Playing
WHERE TimePeriodId =' .TIME_PERIOD .
' AND WinningTeamId =
';


	$db = connectToDb(); 
	
    $matchesRs = $db->query($matchesSql);
    $matchesRs->data_seek(0);
    $matchesArray = array();
    
    while($row = $matchesRs->fetch_assoc()) {
         
         $personA = new Person($row['UserAId']);
         $personB = new Person($row['UserBId']);
         
         $fetchPicks = function($person) {
         	 global $db;
         	 global $picksByDivisionSql;
         	 global $byDivisionSql;
         	
         	$didWin = function($id) {
         		global $db;
         	 	global $winningIdSql;
         	 	$d = $db->query($winningIdSql . $id);
				return $d->fetch_assoc()['Total'];
         	};
         	 
         	 $picksRs = $db->query($picksByDivisionSql . 
         	      $person->getId() . $byDivisionSql);
         	 $picksRs->data_seek(0);
             while($row = $picksRs->fetch_assoc()) {
                  $person->setAlias($row['Alias']);
                  $won = $didWin($row['TeamId']);
                  $pick = new Pick($row['Name'], $won, false);
                  $person->pushPick($pick);
             }
         };
        
        $fetchPicks($personA);
        $fetchPicks($personB);
         
         array_push($matchesArray, array('personA' => $personA, 'personB' => $personB));
    }
    
    $db->close();
	include_once("results-html.php");
	include_once("footer.php");
?>