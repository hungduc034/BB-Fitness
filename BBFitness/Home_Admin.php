<?php
require_once './functions.php';
session_start();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <link href="admin_css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <!-- Custom Theme files -->
        <link href="admin_css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <!--js-->
        <script src="admin_js/jquery-2.1.1.min.js"></script> 
        <!--icons-css-->
        <link href="admin_css/font-awesome.css" rel="stylesheet"> 
        <!--Google Fonts-->
        <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
        <!--static chart-->
        <script src="admin_js/Chart.min.js"></script>
        <!--//charts-->
        <!-- geo chart -->
        <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
        <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
        <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
        <!-- Chartinator  -->
        <script src="admin_js/chartinator.js" ></script>
        <script type="text/javascript">
            jQuery(function ($) {

                var chart3 = $('#geoChart').chartinator({
                    tableSel: '.geoChart',

                    columns: [{role: 'tooltip', type: 'string'}],

                    colIndexes: [2],

                    rows: [
                        ['China - 2015'],
                        ['Colombia - 2015'],
                        ['France - 2015'],
                        ['Italy - 2015'],
                        ['Japan - 2015'],
                        ['Kazakhstan - 2015'],
                        ['Mexico - 2015'],
                        ['Poland - 2015'],
                        ['Russia - 2015'],
                        ['Spain - 2015'],
                        ['Tanzania - 2015'],
                        ['Turkey - 2015']],

                    ignoreCol: [2],

                    chartType: 'GeoChart',

                    chartAspectRatio: 1.5,

                    chartZoom: 1.75,

                    chartOffset: [-12, 0],

                    chartOptions: {

                        width: null,

                        backgroundColor: '#fff',

                        datalessRegionColor: '#F5F5F5',

                        region: 'world',

                        resolution: 'countries',

                        legend: 'none',

                        colorAxis: {

                            colors: ['#679CCA', '#337AB7']
                        },
                        tooltip: {

                            trigger: 'focus',

                            isHtml: true
                        }
                    }


                });
            });
        </script>
        <!--geo chart-->

        <!--skycons-icons-->
        <script src="admin_js/skycons.js"></script>
        <!--//skycons-icons-->
    </head>
    <body>	
        <div class="page-container">	
            <div class="left-content">
                <div class="mother-grid-inner">
                    <!--header start here-->
                    <div class="header-main">
                        <div class="header-left">
                            <div class="logo-name">
                                <a href="Home_Admin.php"> <h1>BB Fitness</h1> 
                                    <!--<img id="logo" src="" alt="Logo"/>--> 
                                </a> 								
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="header-right">
                            <div class="profile_details_left"><!--notifications of menu start -->
                            </div>
                            <!--notification menu end -->
                            <div class="profile_details">		
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">	
                                                <span class="prfil-img"><img src="admin_images/avatar.png" alt=""> </span> 
                                                <div class="user-name">
                                                    <p>Hung Duc</p>
                                                    <span>Administrator</span>
                                                </div>

                                                <div class="clearfix"></div>	
                                            </div>	
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="#"> Settings</a> </li> 
                                            <li> <a href="#">Profile</a> </li> 
                                            <li> <a href="logout.php">Logout</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>				
                        </div>
                        <div class="clearfix"> </div>	
                    </div>
                    <!--heder end here-->
                    <!-- script-for sticky-nav -->
                    <script>
            $(document).ready(function () {
                var navoffeset = $(".header-main").offset().top;
                $(window).scroll(function () {
                    var scrollpos = $(window).scrollTop();
                    if (scrollpos >= navoffeset) {
                        $(".header-main").addClass("fixed");
                    } else {
                        $(".header-main").removeClass("fixed");
                    }
                });

            });
                    </script>
                    <!-- /script-for sticky-nav -->
                </div>
            </div>
            <!--slider menu-->
            
            <div class="clearfix"></div>            
        </div>
 	<div class="sidebar-menu">
                <div class="menu">
                    <ul id="menu" >
                        <li id="menu-home" ><a href="Home_Admin.php"><span>Home</span></a></li>
                        <li><a href="#"><span>Course</span><span  style="float: right"></span></a>
                            <ul>
                                <li><a href="addCourse.php">Add New Course</a></li>
                                <li><a href="loadCourse.php">View All/Edit/Delete Course</a></li>
                            </ul>
                        </li>
                        <li><a href=""><span>Customer</span><span style="float: right"></span></a>
                            <ul>
                                <li><a href="loadCustomer.php">View All/Edit/Delete Customer</a></li>	            
                            </ul>
                        </li>                       
                        <li><a href="#"><span>Coach</span><span  style="float: right"></span></a>
                            <ul>
                                <li><a href="addCoach.php">Add New Coach</a></li>
                                <li><a href="loadCoach.php">View All/Edit/Delete Coach</a></li>	            
                            </ul>
                        </li>
                        <li><a href="#"><span>Register Course</span><span  style="float: right"></span></a>
                            <ul>
                                <li><a href="addRegisterCourse.php">Add New Register</a></li>
                                <li><a href="loadRegisterCourse.php">View All/Edit/Delete Register</a></li>	            
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        <!--slide bar menu end here-->

        <script>
            var toggle = true;

            $(".sidebar-icon").click(function () {
                if (toggle)
                {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position": "absolute"});
                } else
                {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function () {
                        $("#menu span").css({"position": "relative"});
                    }, 400);
                }
                toggle = !toggle;
            });
        </script>
        <!--scrolling js-->
        <script src="admin_js/jquery.nicescroll.js"></script>
        <script src="admin_js/scripts.js"></script>
        <!--//scrolling js-->
        <script src="admin_js/bootstrap.js"></script>
        <!-- mother grid end here-->
    </body>
</html>                     