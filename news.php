 <?php
 	include_once("utility.php");
    include_once("db.php");
    include_once("header.php");

    
    $db = new DbHandler();
    $week = CommonVariables::$currentTimePeriod;

    $allMatches = getAllMatches($week);
    $lastMatchesArray = $allMatches[$week -1];
    $currentMatchesArray = $allMatches[$week];
    
    $scores = determineTotalScores($allMatches, $week - 1);
    uasort($scores, function($pA, $pB) {
        if ($pA['score'] < $pB['score'])
        {
            return 1;
        }
        if ($pA['score'] > $pB['score'])
        {
            return -1;
        }
        return $pA['points'] < $pB['points'];
    });
    
    include_once("news-html.php");
 	include_once("footer.php");
?>