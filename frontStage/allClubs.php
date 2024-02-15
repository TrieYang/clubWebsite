﻿<?php
include "../include/password.php";
// Create connection
$conn = new mysqli($servername, $un, $pw, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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

    <div class="heng_box">
        <div class="plan_com clearfix">
            <div class="container" id="allClubs">
                <div class="titleBox">
                <div class="titleBreaker"></div>
                <div class="blockTitle">ALL CLUBS</div>
                </div>
                <div class="row c1_list">
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/SquareClubLogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Rockridge Programming Club</div>
                            <div class="c1_desc">
                                The founder of this website, join us to learn programming or web design!
                            </div>
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/CCLogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Conquering Cancer Club</div>
                            <div class="c1_desc">
                            A club that promotes awareness for all types of cancer through dress up days, school wide initiatives, and large fundraisers! 
                            </div>
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/DovieLogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Rockridge Dovie Club</div>
                            <div class="c1_desc">
                            We are dedicated to aiding our healthcare system through action-based services such as volunteering and fundraising. 
                            </div>
                            
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/InteractLogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Rockridge Interact Club</div>
                            <div class="c1_desc">
                            Join us! A volunteer-based club dedicated to bettering our local and global communities through fundraising.
                            </div>
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/CMACLogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Classical Music Appreciation Club</div>
                            <div class="c1_desc">
                            Dedicated to fostering appreciation for classical music, and building comradery between peers while sharing music.
                            </div>
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/RPLogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Rockridge Post</div>
                            <div class="c1_desc">
                            Rockridge Post is a club where students passionate about writing can work together in effort of publishing semi-annual newspapers.
                            </div>
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/RELogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Rockridge E-sport Club</div>
                            <div class="c1_desc">
                            Join this club for all champion unlocked and a skin on all champion in League
                            </div>
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/DEALogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Duke of Edinburgh Award Club </div>
                            <div class="c1_desc">
                            This club is for students who would like to set goals and get credit for extracurricular activities.   
                            </div>
                        </div>
                    </div>
                    <div class="clubContainer">
                        <div class="clubItem">
                            <div class="c1_img"><img src="images/Logos/KanataLogo.png" class="img-responsive" /></div>
                            <div class="c1_titleText">Rockridge Kanata Club</div>
                            <div class="c1_desc">
                            We help connect the international students and local community. Join us to learn different culture!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--box ends-->

    <div class="heng_box heng_box_2 bg_gray">
        <div class="plan_com clearfix">
            <div class="container">
                <div class="top_all center PB15">
                    <h4 class="MT0">—— RECENT EVENTS ——</h4>
                    <!--waterfall start-->
                    <div class="masonry">
                        <!--waterfallItem-->
                        <?php
                        $sql = "SELECT * FROM events";
                        $conn->query($sql);
                        $result = $conn->query($sql);
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "
                        <a href='article.php?articleID=".$row["id"]."'>
                        <div class='item'>
                        <div class='border' > 
                            <img src='../backStage/".$row["picture"]."' class='waterfallImg'/>
                            <div class='waterfallText'>
                                <div name='eventTitle' class='titleLine'></div>
                                ".$row["title"]."
                                <div class='titleLine'></div>
                                <div class='waterfallTime'>
                                    <span class='font12 color999'>
                                        <i class='fa fa-clock-o'></i>".$row["time"]."
                                    </span>
                                </div>
                            </div>
                        </div>
                        </div>
                        </a> 
                        ";
                        }
                     
                        ?>

                        <!--/one waterfall item end-->

                    <!-- /waterfall end -->
                    </div>
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