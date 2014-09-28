<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 9/27/14
 * Time: 12:41 PM
 */
include_once("utility.php");
include_once("db.php");

$db = new DbHandler();

CommonVariables::set($db);

include_once("header.php");

if (!CommonVariables::$scorecardEnabled)
{
    echo "<div class=\"container m-container\"><h5 class=\"text-center\">
            Your administrator has disabled the scorecard for this week until all forms are submitted.</h5></div>";
    include_once("footer.php");
    die();
}


$scorecard = true;

$week = CommonVariables::$currentTimePeriod;


$allMatches = getAllMatches($week, $db);
$currentMatchesArray = $allMatches[$week];

$scores = determineTotalScores($allMatches, $week - 1);

include_once("results-html.php");
include_once("footer.php");