<?php
include_once("utility.php");
include_once("db.php");
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 9/22/14
 * Time: 8:09 PM
 */
function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}

$W;
$A;
$B;

$week = $_POST["week"];
$db = new DbHandler();

reset($_POST);
while (list($key, $val) = each($_POST)) {

    if ($val != "") {
        if (startsWith($key, "A"))
            $A = $val;
        if (startsWith($key, "B"))
            $B = $val;
        if (startsWith($key, "W"))
            $W = $val;
    }

}

if (isset($A)) $a = determineTeamId($A, $db);
if (isset($B)) $b = determineTeamId($B, $db);
if (isset($W)) $w = determineTeamId($W, $db);

$db->insertPlaying($a, $b, $w, $week);

if (!isset($A)) { $A = 'NONE'; $a = 'NA'; }
if (!isset($B)) { $B = 'NONE'; $b = 'NA'; }
if (!isset($W)) { $W = 'NONE'; $w = 'NA'; }

exit("Week $week: $A($a),  $B($b),  $W($w)");
