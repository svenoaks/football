<?php
 	include_once("utility.php");
	include_once("header.php");
	$maxWeek = 12;
	$allMatchesArray = getAllMatches($maxWeek);
	
	include_once("schedule-html.php");
	include_once("footer.php");
?>