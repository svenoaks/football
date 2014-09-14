<?php
 	include_once("utility.php");
	include_once("header.php");
	
	
	$week = $_GET['week'];
	$matchesArray = getMatches($week);
	
	function getMatches($week)
	{
		$db = new DbHandler();
		$matchesRs = $db->queryForMatches($week);
		$matchesRs->data_seek(0);
		$matchesArray = array();
		while($row = $matchesRs->fetch_assoc()) {
		 
			 $personA = new Person($row['UserAId']);
			 $personB = new Person($row['UserBId']);
		 
			 $fetchPicks = function($person, $week, $db) {
			
				$fetchWin = function($id, $week, $db) {
					$d = $db->queryForWinning($id, $week, $db);
					return $d->fetch_assoc();
				};
			 
				 $picksRs = $db->queryForPicks($person, $week);
				 $picksRs->data_seek(0);
				 while($row = $picksRs->fetch_assoc()) {
					  $person->setAlias($row['Alias']);
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
			 
			if ($scoreA > $scoreB) { $personA->setWin($week, true); }
			else 
				if ($scoreA < $scoreB) { $personB->setWin($week, true); }
			else
				if ($personA->wonTieBreaker($week)) { $personA->setWin($week, true); }
			else
				 { $personB->setWin($week, true); }
		 
			array_push($matchesArray, array('personA' => $personA, 'personB' => $personB));
	     }
	     return $matchesArray;
	}
    
    
	include_once("results-html.php");
	include_once("footer.php");
?>