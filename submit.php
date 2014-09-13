<?php

include_once ("db.php");

$sql = connectToDb();

if ($sql->connect_error) {
    	die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
	} 
	else
	{
		echo "Connected to database successfully.";
	}
function createHtml() {

	$userName = htmlspecialchars($_POST['user_name']);
	$userPass = htmlspecialchars($_POST['user_password']);
	$optionAmerican = htmlspecialchars($_POST['option_american']);
	$optionAcc = htmlspecialchars($_POST['option_acc']);
	$optionBig10 = htmlspecialchars($_POST['option_big10']);
	$optionBig12 = htmlspecialchars($_POST['option_big12']);
	$optionPac12 = htmlspecialchars($_POST['option_pacific12']);
	$optionSE = htmlspecialchars($_POST['option_southeastern']);
	$optionNonAq = htmlspecialchars($_POST['option_nonaq']);
	
	echo "<!DOCTYPE html>
			<html>
				<head>
				<title>Form Submissiont</title>
				<meta http-equiv=\"refresh\" content=\"5;index.php\" />
				</head>
				<body>
				<h2>Form submission successful!</h2>
				<ul>
					<li><h3>User Name: $userName</h3></li>
					<li><h3>User Pass: $userPass</h3></li>
					<li><h3>American: $optionAmerican</h3></li>
					<li><h3>ACC: $optionAcc</h3></li>
					<li><h3>Big10: $optionBig10</h3></li>
					<li><h3>Big12: $optionBig12</h3></li>
					<li><h3>Pac12: $optionPac12</h3></li>
					<li><h3>SE: $optionSE</h3></li>
					<li><h3>Non-AQ: $optionNonAq</h3></li>
				</ul
				</body>
			</html>";
}


//createHtml();
?>