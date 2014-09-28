<?php
include_once("utility.php");
include_once("db.php");
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 9/22/14
 * Time: 8:09 PM
 */
$user = "richarddurden";
$pw = "Zero";

if (strtolower($_POST['user_name']) != $user || $_POST['user_password'] != $pw)
    exit("INVALID CREDENTIALS");

$week = $_POST["week"];
$scorecard = $_POST["scorecard"];

if ($scorecard == 'true') $scorecard = 1;
else $scorecard = 0;

$news1 = $_POST["news1"];
$news2 = $_POST["news2"];
$news3 = $_POST["news3"];

$db = new DbHandler();

$db->insertVariables($week, $scorecard, $news1, $news2, $news3);

exit("Status: Content inserted successfully");