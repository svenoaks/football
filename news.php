 <?php
 	include_once("utility.php");
    include_once("db.php");
    include_once("header.php");

    
    $db = new DbHandler();
    $week = DbHandler::CURRENT_TIME_PERIOD;
    
    $allMatches = getAllMatches($week);
    $lastMatchesArray = $allMatches[$week -1];
    $currentMatchesArray = $allMatches[$week];
    
    $scores = determineTotalScores($allMatches, $week - 1);
    arsort($scores);
    
    include_once("news-html.php");
 	include_once("footer.php");
?>