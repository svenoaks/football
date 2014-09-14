 <?php
 	include_once("utility.php");
    include_once("header.php");
    
    $db = new DbHandler();
    $week = DbHandler::CURRENT_TIME_PERIOD;
    
    $lastMatchesArray = getMatches($week - 1);
    $currentMatchesArray = getMatches($week);
    
    include_once("news-html.php");
 	include_once("footer.php");
?>