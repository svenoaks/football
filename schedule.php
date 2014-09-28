<?php
 	include_once("utility.php");
    include_once("db.php");

    $db = new DbHandler();
    CommonVariables::set($db);
	include_once("header.php");


	$maxWeek = 12;
	$allMatchesArray = getAllMatches($maxWeek, $db);
	
	include_once("schedule-html.php");
	include_once("footer.php");
?>