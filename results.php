<?php
	include_once("db.php");
 	include_once("utility.php");
	include_once("header.php");
	
	define ("TIME_PERIOD", 1);
	
	$db = connectToDb();
	$matchesSql =
'	
SELECT 
       UserAAlias,
       UserBAlias
FROM UserMatch,

  (SELECT MatchId AS MatchAId,
          Alias AS UserAAlias
   FROM Person,
        UserMatch
   WHERE UserMatch.UserAId = Person.UserId) AS UserA,

  (SELECT MatchId AS MatchBId,
          Alias AS UserBAlias
   FROM Person,
        UserMatch
   WHERE UserMatch.UserBId = Person.UserId) AS UserB
WHERE UserMatch.MatchId = UserA.MatchAId
  AND UserMatch.MatchId = UserB.MatchBId
  AND TimePeriodId =' . TIME_PERIOD . ' ' .
'ORDER BY UserAAlias;';

	$ScoresSql =
'	
SELECT 
       UserAAlias,
       UserBAlias
FROM UserMatch,

  (SELECT MatchId AS MatchAId,
          Alias AS UserAAlias
   FROM Person,
        UserMatch
   WHERE UserMatch.UserAId = Person.UserId) AS UserA,

  (SELECT MatchId AS MatchBId,
          Alias AS UserBAlias
   FROM Person,
        UserMatch
   WHERE UserMatch.UserBId = Person.UserId) AS UserB
WHERE UserMatch.MatchId = UserA.MatchAId
  AND UserMatch.MatchId = UserB.MatchBId
  AND TimePeriodId = 1
ORDER BY UserAAlias;';
  
    $matches = $db->query($matchesSql);
    $matches->data_seek(0);
    
	include_once("results-html.php");
	include_once("footer.php");
?>