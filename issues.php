    <?php  $pageTitle='Current Issue';
        //require_once ("Includes/simplecms-config.php"); 
       // require_once  ("Includes/connectDB.php");
        include("Includes/header.php");         
     ?>

     <div class="issue">
     <img alt="Cover Page" src="resource/image/cover/current_cover.png"/>
     <div class="issue-action"> <a href="resource/issue-abstract/Contents2014-3.pdf" target="_blank">Download Contents</a> <br/> <a href="publishers.php">Subscribe</a> </div>
     </div>
   
		<hr/>
		<ul id="issue-link">
                <li class="current-issue float-left"><a href="current-issues.php"> Current Issues</a></li>
                <li class="future-issue float-left"><a href="future-issues.php">Future Issues</a> </li>
                <li class="past-issue float-left"><a href="past-issues.php">Past Issues</a> </li>
                <li class="clear"></li>
        </ul>
<?php 
    include ("Includes/footer.php");
 ?>