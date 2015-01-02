<?php require_once ("Includes/session.php"); 
 ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Concilium - <?php echo isset($pageTitle)?$pageTitle:'Welcome'?></title>
        <link href="resource/css/Site.css" rel="stylesheet" type="text/css" />
        <link href="resource/css/css.css" rel="stylesheet" type="text/css" />
        <link href="resource/css/css850.css" rel="stylesheet" type="text/css" />
        <link href="resource/bxslider/jquery.bxslider.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="resource/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="resource/js/js.js"></script>
        <script type="text/javascript" src="resource/bxslider/jquery.bxslider.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 


    </head>
    <body>
        <div class="outer-wrapper">
        <header>
            <div class="content-wrapper">
                <div class="float-left">
                    <div class="site-title"><a href="/index.php"> <div class="logo float-left"> <img src="resource/image/logo.png" alt="Concilium" class="img_logo"/></div> <div class="text float-left"><h1>Concilium</h1><h3>International Journal Of Theology</h3></div>
                        <br class="clear-fix"/> </a></div>
                </div>
                <div class="float-right" id="top-nav"><a href="index.php">Home</a> | <a href="contact.php">Contact</a></div>
                <br class="clear-fix"/>
            </div>

                <section class="navigation" data-role="navbar">
                    <nav>
                        <ul id="menu"><li><a href="index.php" class="current">Home</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="board-directors.php">Board Of Directors</a></li>
						<li><a href="board-editors.php">	Board of Editors</a></li>
						<li><a href="publishers.php">Publishers</a></li>
						<li><a href="current-issues.php">Issues</a></li>
						<li><a href="news.php">News</a></li>
						<li><a href="statements.php">Statements</a></li>
						<li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </nav>
            </section>
        </header>
<div style="text-align: center;">
<div id="main-content">
<h1><?php echo isset($pageTitle)?$pageTitle:'Welcome'?></h1>