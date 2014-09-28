<?php
    include_once("utility.php");
    include_once("db.php");

    $db = new DbHandler();

    CommonVariables::set($db);

    $week = $_GET['week'];
    if (!isset($week) || $week >= CommonVariables::$currentTimePeriod) {
        header("Location: news.php");
        die();
    }

    include_once("header.php");

    $scorecard = false;

	$allMatches = getAllMatches($week, $db);
    $currentMatchesArray = $allMatches[$week];

    $scores = determineTotalScores($allMatches, $week);
	
	include_once("results-html.php");
	include_once("footer.php");
?>