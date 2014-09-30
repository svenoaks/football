<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 9/27/14
 * Time: 11:56 AM
 */
include_once("utility.php");
include_once("db.php");
$db = new DbHandler();
CommonVariables::set($db);
include_once("header.php");

$week = CommonVariables::$currentTimePeriod;

$allMatches = getAllMatches($week, $db);
$lastMatchesArray = $allMatches[$week -1];
$currentMatchesArray = $allMatches[$week];

$scores = determineTotalScores($allMatches, $week - 1);
sortForRankings($scores, $allMatches, $week);

include_once("rankings-html.php");
include_once("footer.php");