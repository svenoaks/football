<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">
    <script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
    <title>Office Football</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="m-body">

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><span class="">NCAA</span></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echoActiveClassIfRequestMatches("news")?>"><a href="news.php">News</a></li>
                    <li><a href="schedule.php">Full Schedule</a></li>
                    <li class="<?php echoActiveClassIfRequestMatches("results")?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Results<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="results.php">Week 1</a></li>
                            <li><a href="results.php">Week 2</a></li>
                            <li class="divider"></li>
                            <li><a href="all-results.php">All Results</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" action="html/form.html">
               
                         <button class="navbar-right btn btn-primary" role="button">Submission Form &raquo;</button>
                </form>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
