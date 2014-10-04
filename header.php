<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
    <title>OfficeCFC</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" media="print" href="css/bootstrap.min.css">
    <link href='css/m-form.css' type='text/css' rel='stylesheet'>
    <link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="m-body">
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<form role="form m-form" id="form-submit">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
            class="sr-only">Close</span></button>
    <h3 class="modal-title" id="myModalLabel">Weekly Submission Form</h3>
</div>
<div class="modal-body">
<div class="m-form-div">
    <h4 class="">Enter your credentials:</h4>


    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" name="user_name" value="" class="form-control" id="user_name" placeholder="username"
               required>
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" value="" class="form-control" id="user_password"
               placeholder="password"
               required>
    </div>
</div>

<div class="m-form-div">
    <h4 class="">Choose your teams:</h4>


    <div class="form-group">

        <label for="option_american">American Athletic Conference</label>
        <select name="option_american" id="option_american" class="form-control" required>
            <option value=""></option>
            <option value="Central Florida (UCF)">Central Florida (UCF)</option>
            <option value="Cincinnati">Cincinnati</option>
            <option value="Connecticut (UConn)">Connecticut (UConn)</option>
            <option value="East Carolina (ECU)">East Carolina (ECU)</option>
            <option value="Houston">Houston</option>
            <option value="Memphis">Memphis</option>
            <option value="South Florida (USF)">South Florida (USF)</option>
            <option value="Southern Methodist (SMU)">Southern Methodist (SMU)</option>
            <option value="Temple">Temple</option>
            <option value="Tulane">Tulane</option>
            <option value="Tulsa">Tulsa</option>
        </select>
    </div>
    <div class="form-group">
        <label for="option_aac">Atlantic Coast Conference</label>
        <select name="option_acc" id="option_aac" class="form-control" required>
            <option value=""></option>
            <option value="Boston College (BC)">Boston College (BC)</option>
            <option value="Clemson">Clemson</option>
            <option value="Duke">Duke</option>
            <option value="Florida State (FSU)">Florida State (FSU)</option>
            <option value="Georgia Tech">Georgia Tech</option>
            <option value="Louisville">Louisville</option>
            <option value="Miami">Miami</option>
            <option value="North Carolina (UNC)">North Carolina (UNC)</option>
            <option value="North Carolina State (NC State)">North Carolina State (NC State)
            </option>
            <option value="Pittsburgh (Pitt)">Pittsburgh (Pitt)</option>
            <option value="Syracuse">Syracuse</option>
            <option value="Virginia">Virginia</option>
            <option value="Virginia Tech (VT)">Virginia Tech (VT)</option>
            <option value="Wake Forest">Wake Forest</option>
        </select>
    </div>

    <div class="form-group">
        <label for="option_big10">Big Ten</label>
        <select name="option_big10" class="form-control" id="option_big10" required>
            <option value=""></option>
            <option value="Illinois">Illinois</option>
            <option value="Indiana">Indiana</option>
            <option value="Iowa">Iowa</option>
            <option value="Maryland">Maryland</option>
            <option value="Michigan">Michigan</option>
            <option value="Michigan State">Michigan State</option>
            <option value="Minnesota">Minnesota</option>
            <option value="Nebraska">Nebraska</option>
            <option value="Northwestern">Northwestern</option>
            <option value="Ohio State">Ohio State</option>
            <option value="Penn State">Penn State</option>
            <option value="Purdue">Purdue</option>
            <option value="Rutgers">Rutgers</option>
            <option value="Wisconsin">Wisconsin</option>
        </select>
    </div>
    <div class="form-group">
        <label for="option_big12">Big 12</label>
        <select name="option_big12" id="option_big12" class="form-control"
                required>
            <option value=""></option>
            <option value="Baylor">Baylor</option>
            <option value="Iowa State">Iowa State</option>
            <option value="Kansas">Kansas</option>
            <option value="Kansas State (K-State)">Kansas State (K-State)</option>
            <option value="Oklahoma">Oklahoma</option>
            <option value="Oklahoma State">Oklahoma State</option>
            <option value="Texas">Texas</option>
            <option value="Texas Christian (TCU)">Texas Christian (TCU)</option>
            <option value="Texas Tech">Texas Tech</option>
            <option value="West Virginia (WVU)">West Virginia (WVU)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="option_pacific12">Pacific-12</label>
        <select name="option_pacific12" id="option_pacific12" class="form-control"
                required>
            <option value=""></option>
            <option value="Arizona">Arizona</option>
            <option value="Arizona State (ASU)">Arizona State (ASU)</option>
            <option value="California (Cal)">California (Cal)</option>
            <option value="Colorado">Colorado</option>
            <option value="Oregon">Oregon</option>
            <option value="Oregon State">Oregon State</option>
            <option value="Southern California (USC)">Southern California (USC)</option>
            <option value="Stanford">Stanford</option>
            <option value="UCLA">UCLA</option>
            <option value="Utah">Utah</option>
            <option value="Washington">Washington</option>
            <option value="Washington State">Washington State</option>
        </select>
    </div>
    <div class="form-group">
        <label for="option_southeastern">Southeastern</label>
        <select name="option_southeastern" id="Southeastern" class="form-control"
                required>
            <option value=""></option>
            <option value="Alabama">Alabama</option>
            <option value="Arkansas">Arkansas</option>
            <option value="Auburn">Auburn</option>
            <option value="Florida (UF)">Florida (UF)</option>
            <option value="Georgia">Georgia</option>
            <option value="Kentucky">Kentucky</option>
            <option value="Louisiana State (LSU)">Louisiana State (LSU)</option>
            <option value="Mississippi (Ole Miss)">Mississippi (Ole Miss)</option>
            <option value="Mississippi State">Mississippi State</option>
            <option value="Missouri">Missouri</option>
            <option value="South Carolina">South Carolina</option>
            <option value="Tennessee">Tennessee</option>
            <option value="Texas A&amp;M">Texas A&amp;M</option>
            <option value="Vanderbilt">Vanderbilt</option>
        </select>
    </div>
    <div class="form-group">
        <label for="option_nonaq">Non-AQ Division I FBS</label>
        <select name="option_nonaq" id="option_nonaq" class="form-control" required>
            <option value=""></option>
            <option value="Air Force">Air Force</option>
            <option value="Akron">Akron</option>
            <option value="Appalachian State">Appalachian State</option>
            <option value="Arkansas State">Arkansas State</option>
            <option value="Army">Army</option>
            <option value="Ball State">Ball State</option>
            <option value="Boise State">Boise State</option>
            <option value="Bowling Green">Bowling Green</option>
            <option value="Brigham Young (BYU)">Brigham Young (BYU)</option>
            <option value="Buffalo">Buffalo</option>
            <option value="Central Michigan">Central Michigan</option>
            <option value="Colorado State">Colorado State</option>
            <option value="Eastern Michigan">Eastern Michigan</option>
            <option value="Florida Atlantic (FAU)">Florida Atlantic (FAU)</option>
            <option value="Florida International (FIU)">Florida International (FIU)</option>
            <option value="Fresno State">Fresno State</option>
            <option value="Georgia Southern">Georgia Southern</option>
            <option value="Georgia State">Georgia State</option>
            <option value="Hawaii">Hawaii</option>
            <option value="Idaho">Idaho</option>
            <option value="Kent State">Kent State</option>
            <option value="Louisiana Tech (LA Tech)">Louisiana Tech (LA Tech)</option>
            <option value="Marshall">Marshall</option>
            <option value="Miami (Ohio)">Miami (Ohio)</option>
            <option value="Middle Tennessee">Middle Tennessee</option>
            <option value="Navy">Navy</option>
            <option value="Nevada">Nevada</option>
            <option value="New Mexico">New Mexico</option>
            <option value="New Mexico State">New Mexico State</option>
            <option value="Northern Illinois (NIU)">Northern Illinois (NIU)</option>
            <option value="North Texas">North Texas</option>
            <option value="Notre Dame">Notre Dame</option>
            <option value="Ohio">Ohio</option>
            <option value="Old Dominion">Old Dominion</option>
            <option value="Rice">Rice</option>
            <option value="San Diego State">San Diego State</option>
            <option value="San Jose State">San Jose State</option>
            <option value="South Alabama">South Alabama</option>
            <option value="Southern Miss">Southern Miss</option>
            <option value="Texas State">Texas State</option>
            <option value="Toledo">Toledo</option>
            <option value="Troy">Troy</option>
            <option value="UAB (Alabama - Birmingham)">UAB (Alabama - Birmingham)</option>
            <option value="ULL (Louisiana - Lafayette)">ULL (Louisiana - Lafayette)</option>
            <option value="ULM (Louisiana - Monroe)">ULM (Louisiana - Monroe)</option>
            <option value="UMass (Massachusetts)">UMass (Massachusetts)</option>
            <option value="UNLV (Nevada - Las Vegas)">UNLV (Nevada - Las Vegas)</option>
            <option value="Utah State">Utah State</option>
            <option value="UTEP (Texas - El Paso)">UTEP (Texas - El Paso)</option>
            <option value="UTSA (Texas - San Antonio)">UTSA (Texas - San Antonio)</option>
            <option value="Western Michigan">Western Michigan</option>
            <option value="WKU (Western Kentucky)">WKU (Western Kentucky)</option>
            <option value="Wyoming">Wyoming</option>
        </select>
    </div>
</div>
<div id="div-error" class="text-center"><p>dd</p></div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary">Submit Form</button>
</div>

</div>

</form>
</div>
</div>
<div class="m-navbar navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><span class="">Week <?= CommonVariables::$currentTimePeriod ?></span></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echoActiveClassIfRequestMatches("news") ?>"><a href="news.php">News</a></li>
                <li class="<?php echoActiveClassIfRequestMatches("schedule") ?>"><a href="schedule.php">Schedule</a>
                </li>
                <li class="<?php echoActiveClassIfRequestMatches("rankings") ?>"><a href="rankings.php">Rankings</a>
                <li class="<?php echoActiveClassIfRequestMatches("scorecard") ?>"><a href="scorecard.php">Scorecard</a>
                </li>
                <li class="<?php echoActiveClassIfRequestMatches("results") ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Results<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php for ($i = 1; $i <= CommonVariables::$currentTimePeriod - 1; ++$i) { ?>
                            <li><a href="results.php?week=<?= $i; ?>">Week <?= $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>

            </ul>
            <div class="navbar-form navbar-right navbar-collapse collapse">
                <div class="btn-group">
                    <button class="btn-print btn btn-default" role="button" onClick="window.print()"><i class="fa fa-print fa-lg"></i>Print
                    </button>
                    <button class="btn btn-default" <?php if (CommonVariables::$scorecardEnabled) echo "disabled=\"disabled\" "; ?>role="button" data-toggle="modal"
                            data-target="#formModal"><i class="fa fa-check-square fa-lg"></i>
                        Weekly Submission Form &raquo;
                    </button>
                </div>
            </div>
        </div>

        <!--/.nav-collapse -->
    </div>
</div>
<div id="div-success"><h5>Form submitted successfully.</h5></div>
