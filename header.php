<?php
session_start();

ini_set('auto_detect_line_endings',TRUE);
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; ?></title>

        <!-- some custom CSS -->
        <style>
            .left-margin{
                margin:0 .5em 0 0;
            }

            .right-button-margin{
                margin: 0 0 1em 0;
                overflow: hidden;
            }
        </style>

        
        <link rel="stylesheet" href="printStyle.css" media="print">
        
        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" media="screen">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        <script src="Search/searching.js"></script>
        <script src="jQueryFunc.js"></script>

        <script>
            function showResult(str) {
                if (str.length == 0) {
                    document.getElementById("livesearch").innerHTML = "";
                    document.getElementById("livesearch").style.border = "0px";
                    return;
                }
                if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                        document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                    }
                }
                xmlhttp.open("GET", "Search/liveSearch.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>


    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php">SchedulerPro</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Add Contact</a></li>
                                <li><a href="#">Add Resource</a></li>
                                <li><a href="#">Add Schedule</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">View <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">View Contacts</a></li>
                                <li><a href="#">View Resources</a></li>
                                <li><a href="#">View Schedule</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Update <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="update/csvUpdate.php">Update Monthly Report</a></li>
                                <li><a href="update_ics.php">Update iCal</a></li>
                                <li><a href="Search/xml_update.php">Update LiveSearch</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="search"><span class="glyphicon glyphicon-search"></span> Search</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <?php
                        if ($_SESSION['username']) {
                            echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                        } else {
                            echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- container -->

        <div class="searching">
            <form>
                <table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <td>
                            <input type="text" class='form-control' onkeyup="showResult(this.value)">
                            <div id="livesearch"></div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="container">
            <?php
// show page header
            echo "<div class='page-header'>";
            echo "<h1>{$page_title}";

            echo "</h1>";
            echo "</div>";
            ?>