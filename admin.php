<?php
include_once("utility.php");
include_once("db.php");
$db = new DbHandler();
CommonVariables::set($db);

$week = CommonVariables::$currentTimePeriod;
$scorecardEnabled = CommonVariables::$scorecardEnabled;
$news1 = CommonVariables::$news1;
$news2 = CommonVariables::$news2;
$news3 = CommonVariables::$news3;


include_once("admin-html.php");