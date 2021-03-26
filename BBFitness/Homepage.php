<?php
session_start();
require_once './functions.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="webthemez">
        <title>BB Fitness</title>
        <!-- core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet"> 
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet"> 
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico"> 
    </head> 

    <body id="home">
        <header id="header">
            <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="Homepage.php"><img src="images/bbfitness.png" alt="logo"></a>
                    </div>

                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="scroll active"><a href="#home">Home</a></li>  
                            <li class="scroll"><a href="#services">Classes</a></li>
                            <li class="scroll"><a href="#about">About</a></li> 
                            <li class="scroll"><a href="#our-team">Trainers</a></li>
                            <li class="scroll"><a href="#portfolio">Gallery</a></li>
                            <li class="scroll"><a href="#pricing">Pricing</a></li>
                            <li class="scroll"><a href="#contact-us">Contact</a></li>
                            <li class="scroll"><a href="Authenticate.php">Login</a></li> 
                            <li class="scroll"><a href="Register.php">Register</a></li>
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->

        <section id="hero-banner">
            <div class="banner-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">                                 
                            <h2>Stronger than <b>EVER</b></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisici <br/> Praesent eget risus.</p>                                    

                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#main-slider-->
        <section id="services" >
            <div class="container">

                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Our Classes</h2>
                </div>
                <?php
                $query = "select cName, cImage from Course";
                $result = queryMysql($query);
                $error = $msg = "";
                if (!$result) {
                    $error = "Couldn't load data, please try again.";
                }
                ?> 
                <div class="row">
                    <div class="features">

                        <?php
                        while ($col = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">   
                                <div class="media service-box">
                                    <?php
                                    $cName = $col[0];
                                    $cImage = $col[1];
                                    echo "<img src='./images/courses/$cImage' style='width:200px;height:200px;'>";
                                    echo "<h3>$cName</h3>";
                                    ?>
                                </div>
                            </div>   
                            <?php
                        }
                        ?>  

                    </div>
                </div><!--/.row-->    
            </div><!--/.container-->
        </section><!--/#services-->
        <section id="about">
            <div class="container">

                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Who we are</h2>
                    <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
                </div>

                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft">
                        <img class="img-responsive" src="images/about.png" alt="">
                    </div>

                    <div class="col-sm-6 wow fadeInRight">
                        <h3 class="column-title">Our Fitness Studio</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa semper aliquam quis mattis quam. Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa semper aliquam quis mattis quam adipiscing elit. Praesent eget risus vitae massa.</p>
                        <ul class="listarrow">
                            <li><i class="fa fa-angle-double-right"></i>Aerobic</li>
                            <li><i class="fa fa-angle-double-right"></i>Cardio</li>
                            <li><i class="fa fa-angle-double-right"></i>Abdomen</li>
                            <li><i class="fa fa-angle-double-right"></i>Special Trainer</li> 
                            <li><i class="fa fa-angle-double-right"></i>Round the clock</li>
                        </ul>


                    </div>
                </div>
            </div>
        </section><!--/#about-->

        <section id="our-team">
            <div class="container">

                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Our Trainer</h2>
                </div>
                <?php
                $query = "select coName, coImage from Coach";
                $result = queryMysql($query);
                $error = $msg = "";
                if (!$result) {
                    $error = "Couldn't load data, please try again.";
                }
                ?> 
                <div class="row">
                    <div class="features">
                        <?php
                        while ($col = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">   
                                <div class="media service-box">
                                    <?php
                                    $coName = $col[0];
                                    $coImage = $col[1];
                                    echo "<img src='./images/coachs/$coImage' style='width:200px;height:200px;'>";
                                    echo "<h3>$coName</h3>";
                                    ?>
                                </div>
                            </div>   
                            <?php
                        }
                        ?>  

                    </div>
                </div><!--/.row-->  
            </div>
        </section><!--/#about-->
        <section id="portfolio">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Gallery</h2>
                    <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
                </div>

                <div class="text-center">
                    <ul class="portfolio-filter" style="display:none">
                        <li><a class="active" href="#" data-filter="*">All Works</a></li>
                        <li><a href="#" data-filter=".designing">Designing</a></li>
                        <li><a href="#" data-filter=".mobile">Mobile App</a></li>
                        <li><a href="#" data-filter=".development">Development</a></li>
                    </ul><!--/#portfolio-filter-->
                </div>

                <div class="portfolio-items">
                    <div class="portfolio-item designing">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/01.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/01.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item mobile development">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/02.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/02.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item designing">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/03.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/03.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item mobile">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/04.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/04.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item designing development">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/05.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/05.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item mobile">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/06.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/06.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item designing development">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/07.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/07.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item mobile">
                        <div class="portfolio-item-inner">
                            <img class="img-responsive" src="images/portfolio/08.jpg" alt="">
                            <div class="portfolio-info"> 
                                <a class="preview" href="images/portfolio/08.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->
                </div>
            </div><!--/.container-->
        </section><!--/#portfolio-->

        <section id="pricing">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Pricing</h2>
                    <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                            <ul class="pricing">
                                <li class="plan-header">
                                    <div class="price-duration">
                                        <span class="price">
                                            $45
                                        </span>
                                        <span class="duration">
                                            per month
                                        </span>
                                    </div>

                                    <div class="plan-name">
                                        Basic
                                    </div>
                                </li>
                                <li><strong>1</strong> DOMAIN</li>
                                <li><strong>100GB</strong> DISK SPACE</li>
                                <li><strong>UNLIMITED</strong> BANDWIDTH</li>
                                <li>SHARED SSL CERTIFICATE</li>
                                <li><strong>10</strong> EMAIL ADDRESS</li>
                                <li><strong>24/7</strong> SUPPORT</li>
                                <li class="plan-purchase"><a class="btn btn-primary" href="#">Get It Now!</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="200ms">
                            <ul class="pricing featured">
                                <li class="plan-header">
                                    <div class="price-duration">
                                        <span class="price">
                                            $85
                                        </span>
                                        <span class="duration">
                                            per month
                                        </span>
                                    </div>

                                    <div class="plan-name">
                                        Bronze
                                    </div>
                                </li>
                                <li><strong>5</strong> DOMAIN</li>
                                <li><strong>500GB</strong> DISK SPACE</li>
                                <li><strong>UNLIMITED</strong> BANDWIDTH</li>
                                <li>SHARED SSL CERTIFICATE</li>
                                <li><strong>30</strong> EMAIL ADDRESS</li>
                                <li><strong>24/7</strong> SUPPORT</li>
                                <li class="plan-purchase"><a class="btn btn-primary" href="#">Get It Now!</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="400ms">
                            <ul class="pricing">
                                <li class="plan-header">
                                    <div class="price-duration">
                                        <span class="price">
                                            $125
                                        </span>
                                        <span class="duration">
                                            per month
                                        </span>
                                    </div>

                                    <div class="plan-name">
                                        Silver
                                    </div>
                                </li>
                                <li><strong>10</strong> DOMAIN</li>
                                <li><strong>2GB</strong> DISK SPACE</li>
                                <li><strong>UNLIMITED</strong> BANDWIDTH</li>
                                <li>SHARED SSL CERTIFICATE</li>
                                <li><strong>50</strong> EMAIL ADDRESS</li>
                                <li><strong>24/7</strong> SUPPORT</li>
                                <li class="plan-purchase"><a class="btn btn-primary" href="#">Get It Now!</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="600ms">
                            <ul class="pricing">
                                <li class="plan-header">
                                    <div class="price-duration">
                                        <span class="price">
                                            $185
                                        </span>
                                        <span class="duration">
                                            per month
                                        </span>
                                    </div>

                                    <div class="plan-name">
                                        Gold
                                    </div>
                                </li>
                                <li><strong>15</strong> DOMAIN</li>
                                <li><strong>10GB</strong> DISK SPACE</li>
                                <li><strong>UNLIMITED</strong> BANDWIDTH</li>
                                <li>SHARED SSL CERTIFICATE</li>
                                <li><strong>100</strong> EMAIL ADDRESS</li>
                                <li><strong>24/7</strong> SUPPORT</li>
                                <li class="plan-purchase"><a class="btn btn-primary" href="#">Get It Now!</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#pricing-->



        <section id="business-stats">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Healty Report</h2>
                    <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
                </div>

                <div class="row text-center">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                            <div class="business-stats" data-digit="6850" data-duration="1000"></div>
                            <strong>Clients</strong>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                            <div class="business-stats" data-digit="1465" data-duration="1000"></div>
                            <strong>Trainer</strong>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                            <div class="business-stats" data-digit="4325" data-duration="1000"></div>
                            <strong>Programs</strong>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                            <div class="business-stats" data-digit="2568" data-duration="1000"></div>
                            <strong>Successes</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#business-stats-->


        <section class="testimonial-area" id="testimonial">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Testimonial</h2>
                    <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-testimonial animate_fade_in" style="opacity: 1; right: 0px;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <blockquote>Sontrary to popular belief, Lorem Ipsuis no simply random text. It has roots in a piece of classical Layears old. belief, Lorem Ipsuis not simply</blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="images/pic1.jpg" alt="client">
                                </div>
                                <div class="col-xs-9 half-gutter">
                                    <h5>John Bond</h5>
                                    <h6>Lorem Ipsuis simply</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-testimonial animate_fade_in" style="opacity: 1; right: 0px;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <blockquote>Tontrary to popular belief, Lorem Ipsuis no simply random text. It has roots in a piece of classical Layears old. belief, Lorem Ipsuis not simply</blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="images/pic2.jpg" alt="client">
                                </div>
                                <div class="col-xs-9 half-gutter">
                                    <h5>John Bond</h5>
                                    <h6>Lorem Ipsuis simply</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-testimonial animate_fade_in" style="opacity: 1; right: 0px;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <blockquote>Aontrary to popular belief, Lorem Ipsuis no simply random text. It has roots in a piece of classical Layears old. belief, Lorem Ipsuis not simply</blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="images/pic1.jpg" alt="client">
                                </div>
                                <div class="col-xs-9 half-gutter">
                                    <h5>John Bond</h5>
                                    <h6>Lorem Ipsuis simply</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact-us">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title wow fadeInDown">Contact Us</h2>
                    <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
                </div>
            </div>
        </section><!--/#contact-us-->


        <section id="contact">

            <div class="container">
                <div class="container contact-info">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="contact-form">
                                <h3>Contact Info</h3>

                                <address>
                                    <strong>Amazing Company, Inc.</strong><br>
                                    12345 NewYork, Street 125<br>
                                    United States 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div></div>
                        <div class="col-sm-8 col-md-8">
                            <div class="contact-form">

                                <form id="main-contact-form" name="contact-form" method="post" action="#">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#bottom-->

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2019 Company Name. <a target="_blank" href="http://webthemez.com/free-bootstrap-templates" title="Free Bootstrap Templates">Bootstrap Template</a> by <a target="_blank" href="http://webthemez.com/" title="Free Bootstrap Themes">WebThemez.com</a>
                    </div>
                    <div class="col-sm-6">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/mousescroll.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/jquery.inview.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom-scripts.js"></script>
    </body>
</html>

