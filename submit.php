<?php

include_once("db.php");
include_once("utility.php");

$db = new DbHandler();
$week = DbHandler::CURRENT_TIME_PERIOD;

reset($_POST);

$userName = htmlspecialchars(each($_POST)['value']);
$userPass = htmlspecialchars(each($_POST)['value']);

$userId = $db->queryForUserId($userName, $userPass);

if (!isset($userId) || $userId == "") exit ("Invalid User Name and Password Combination.");
if (alreadyPicked($userId, $week, $db)) exit ("You already picked this week.");

$picks = array();

while (list($key, $value) = each($_POST))
{
    $teamId = determineTeamId(htmlspecialchars($value), $db);
    if ($week > 1 && didPick($teamId, $userId, $week-1, $db))
        exit ("You picked $value last week, choose again.");
    array_push($picks, $teamId);
}

foreach($picks As $teamId)
{
    if (isset($teamId)) $db->insertPick($userId, $week, $teamId);
}

exit ("success");



