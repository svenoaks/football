<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 9/27/14
 * Time: 12:41 PM
 */
include_once("utility.php");
include_once("db.php");
include_once("header.php");

$scorecard = true;

$week = CommonVariables::$currentTimePeriod;
$allMatches = getAllMatches($week);
$currentMatchesArray = $allMatches[$week];

$scores = determineTotalScores($allMatches, $week - 1);

include_once("results-html.php");
include_once("footer.php");