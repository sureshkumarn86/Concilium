<?php require_once ("session.php"); 
 ini_set('display_errors',1);
error_reporting(E_ALL);
$_root='/';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Concilium - <?php echo isset($pageTitle)?$pageTitle:'Welcome to the International Journal Of Theology'?></title>
        <link href="<?php echo ($_root);?>resource/css/Site.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ($_root);?>resource/css/css.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ($_root);?>resource/css/css850.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ($_root);?>resource/bxslider/jquery.bxslider.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="<?php echo ($_root);?>resource/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo ($_root);?>resource/js/js.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
<script type="text/javascript">
var issueData=null;
var newsData=null;
</script>

    </head>
    <body>
        <div class="outer-wrapper">
        <header>
            <div class="content-wrapper">
                <div class="float-left">
                    <div class="site-title"><a href="/"> <div class="logo float-left"> <img src="<?php echo ($_root);?>resource/image/logo3_1.png" alt="Concilium" class="img_logo"/></div> <div class="text float-left"><h1>Concilium</h1><h3>International Journal Of Theology</h3></div>
                        <br class="clear-fix"/> </a></div>
                </div>
                <div class="float-right" id="top-nav"><a href="<?php echo ($_root);?>">Home</a> | <a href="<?php echo ($_root);?>contact">Contact</a></div>
                <br class="clear-fix"/>
            </div>

                <section class="navigation" data-role="navbar">
                    <nav>
                        <ul id="menu"><li><a href="<?php echo ($_root);?>" class="current">Home</a></li>
						<li><a href="<?php echo ($_root);?>about">About Us</a></li>
						<li><a href="<?php echo ($_root);?>board-directors">Board Of Directors</a></li>
						<li><a href="<?php echo ($_root);?>board-editors">	Board of Editors</a></li>
						<li><a href="<?php echo ($_root);?>publishers">Publishers</a></li>
						<li><a href="<?php echo ($_root);?>issues">Issues</a></li>
						<li><a href="<?php echo ($_root);?>news">News/Statements</a></li>
		<!-- 				<li><a href="<?php echo ($_root);?>statements">Statements</a></li> -->
						<li><a href="<?php echo ($_root);?>contact">Contact Us</a></li>
                        </ul>
                    </nav>
            </section>
        </header>
<div style="text-align: center;">
<div id="main-content">
<h1><?php echo !isset($noPageTitle)? isset($pageTitle)?$pageTitle:'Welcome':''?></h1>