<?php
include_once("utility.php");
include_once("db.php");

$db = new DbHandler();

CommonVariables::set($db);

$week = CommonVariables::$currentTimePeriod;
$news1 = CommonVariables::$news1;
$news2 = CommonVariables::$news2;
$news3 = CommonVariables::$news3;

include_once("header.php");

$allMatches = getAllMatches($week, $db);
$lastMatchesArray = $allMatches[$week - 1];
$currentMatchesArray = $allMatches[$week];

$scores = determineTotalScores($allMatches, $week - 1);
sortForRankings($scores, $allMatches, $week);


include_once("news-html.php");
include_once("footer.php");
