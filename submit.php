<?php

include_once("db.php");
include_once("utility.php");

$db = new DbHandler();
$week = DbHandler::CURRENT_TIME_PERIOD;

reset($_POST);

$userName = htmlspecialchars(each($_POST)['value']);
$userPass = htmlspecialchars(each($_POST)['value']);

$userId = $db->queryForUserId($userName, $userPass);

while (list($key, $value) = each($_POST))
{
    $teamId = determineTeamId(htmlspecialchars($value), $db);
    if (isset($teamId)) $db->insertPick($userId, $week, $teamId);
}

header("Location: news.php");



