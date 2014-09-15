<?php
 	include_once("utility.php");
	include_once("header.php");
	
	$week = $_GET['week'];
	$allMatches = getAllMatches($week);
    $currentMatchesArray = $allMatches[$week];
	
	include_once("results-html.php");
	include_once("footer.php");
?>