<?php  $pageTitle='Current Issues of 2015';
        //require_once ("Includes/simplecms-config.php"); 
       // require_once  ("Includes/connectDB.php");
        include("Includes/header.php");         

        $issueyear=date("Y");
        include("getissuelist.php");
        
        ?>


		<hr/>
		<ul id="issue-link">
        <!--         <li class="current-issue float-left"><a href="current-issues.php"> Current Issues</a></li> -->
                <li class="future-issue float-left"><a href="future-issues.php">Future Issues</a> </li>
                <li class="past-issue float-left"><a href="past-issues.php">Past Issues</a> </li>
                <li class="clear"></li>
        </ul>
<?php 
    include ("Includes/footer.php");
 ?>