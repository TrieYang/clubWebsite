<?php
include "../include/password.php";
// Create connection
$conn = new mysqli($servername, $un, $pw, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$qnaId=str_replace("'","''",$_GET['qnaID']);
if ($qnaId!=""){
$qnaSql = "SELECT * FROM qna WHERE id = '".$qnaId."'";
$result = $conn->query($qnaSql);
while($row = $result->fetch_assoc()) {
  $title = $row["title"];
  $question = $row["question"];
  $content = $row["answer"];
  $time = $row['time'];
  $clubID = $row["clubID"];
}
$nameSql = "SELECT * FROM clubs WHERE id = '".$clubID."'";
$nameResult = $conn->query($nameSql);
while($clubsRow = $nameResult->fetch_assoc()) {
  $clubName=$clubsRow["clubName"];
}
}
?>

<!DOCTYPE html>
<html>
<head>
 
    <style>
        .box {
            margin: 10px;
            column-count: 3;
            column-gap: 10px;
        }

        .item img{
            width: 100%;
            height:100%;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Title here -->
    <title>RPC Home</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="RPC" />
    <meta name="keywords" content="RPC" />
    <meta name="author" content="RPC" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0, user-scalable=no" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/font-awesome.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/response.css" />
    <!-- jQuery -->
    <script src="js/jquery.js" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- Slider JS -->
    <script type="text/javascript" src="js/responsiveslides.min.js"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="js/custom.js"></script>
</head>
<body>

    <!--start heading-->
    <div class="agileits_top_menu">
        <div class="container">
            <div class="w3l_header_left">
                <ul>
                    <li>Welcome</li>
                    <li><i class="fa fa-phone"></i><a href="tel:13800138000">236-888-9080</a></li>
                    <li><i class="fa fa-envelope-o"></i><a href="mailto:server@szqfsl.com"> yangirisyu@gmail.com</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-navbar row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <img src="images/RELogo.png" alt="..." class="img-logo"/>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 P0">
                <div class="collapse collapse-zdy navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="cur"><a href="index.php">&nbsp;&nbsp;HOME&nbsp;&nbsp;</a></li>
                        <li><a href="about.php" class="a_about">ABOUT</a></li>
                        <li><a href="events.php">EVENTS</a></li>
                        <li><a href="q&a.php">Q&A</a></li>
                        <li><a href="allClubs.php">All CLUBS</a></li>
                        <li><a href="login.php">LOGIN</a></li>
                    </ul>
                </div>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!--/end heading-->

    <!--Slider-->
    <div class="banner">
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li>
                    <div class="banner"><a href="#"><img src="images/home_banner_01.png" class="img-responsive" alt="banner" style="width: 100%;" /></a></div>
                </li>
                <li>
                    <div class="banner"><a href="#"><img src="images/home_banner_02.jpg" class="img-responsive" alt="banner" style="width: 100%;" /></a></div>
                </li>
                <li>
                    <div class="banner"><a href="#"><img src="images/home_banner_03.jpg" class="img-responsive" alt="banner" style="width: 100%;" /></a></div>
                </li>
                <li>
                    <div class="banner"><a href="#"><img src="images/home_banner_04.jpg" class="img-responsive" alt="banner" style="width: 100%;" /></a></div>
                </li>
                <li>
                    <div class="banner"><a href="#"><img src="images/home_banner_05.jpg" class="img-responsive" alt="banner" style="width: 100%;" /></a></div>
                </li>
            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--/Slider-->


    <div class="heng_box heng_box_2 bg_gray">
        <div class="plan_com clearfix">
            <div class="container">
            <div class="titleBox">
                <a href="q&a.php">
                <i class="fa fa-chevron-left fa-4x" aria-hidden="true" style="color:rgb(8, 41, 114)"></i>
                </a>
                <div class="blockTitle">Q&A</div>

            </div>
            

            <div class="tutorialContainer">
            <div class="articleBox">
            <div class="articleTitle">
                <?php echo $title;?>
            </div>
            <div class="tutorialContent">
                <p>
                <?php
                if($question!=""){
                echo "<p><label style='font-size:20px'>Description:  </label></p>" ;
                echo $question;
                }
                ?>
                </p>
                <p>
                <p style="margin-top:70px"><label style="font-size:20px">Answer:  </label></p>
                <?php echo $content;?>
                </p>
            </div>
            <div style="width:30%;float:right;margin-top:-50px;">
            <span class="rightSpan">
                <?php echo $clubName;?>
            </span>
            <span style="margin-top:20px" class="rightSpan">
                <?php echo $time;?>
            </span>
            </div>
            </div>
        </div>
    </div>
    <!--end body-->

    <!--start page foot-->
    <div class="footer">
        <div class="footer_com clearfix">
            <div class="col-md-4 col-sm-4 col-xs-12 com_div">
                <p>
                    Friend Links：
                    <a href="#">West Vancouver Schools</a>
                    <a href="#">Rockridge Secondary</a>
                </p>
                <p>
                    Copyright 2021 Rockridge Programming Club All Rights Reserved
                </p>
                <p>
                    <a href="#">Backend Login</a>
                </p>

            </div>
        </div>
    </div>
    <!--page foot end-->
</body>
</html>