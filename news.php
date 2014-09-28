<?php
include_once("utility.php");
include_once("db.php");
include_once("header.php");


$db = new DbHandler();

CommonVariables::set($db);

$week = CommonVariables::$currentTimePeriod;
$news1 = CommonVariables::$news1;
$news2 = CommonVariables::$news2;
$news3 = CommonVariables::$news3;


$allMatches = getAllMatches($week, $db);
$lastMatchesArray = $allMatches[$week - 1];
$currentMatchesArray = $allMatches[$week];

$scores = determineTotalScores($allMatches, $week - 1);
uasort($scores, function ($pA, $pB) {
    if ($pA['score'] < $pB['score']) {
        return 1;
    }
    if ($pA['score'] > $pB['score']) {
        return -1;
    }
    return $pA['points'] < $pB['points'];
});

include_once("news-html.php");
include_once("footer.php");
