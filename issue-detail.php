<?php    
				require_once ("Includes/simplecms-config.php");
				require_once ("Includes/connectDB.php");
$iid=isset($_REQUEST['id'])?"'".mysqli_real_escape_string($databaseConnection,$_REQUEST['id'])."'":$__issueid;
								//$iid=mysqli_real_escape_string($databaseConnection, $string_to_escape)
				$sql = "SELECT
						issueid, issuetitle, issueyear, issueterm,issueautherc,issueauther, coverimagepath
						, iscurrentissue, contentpdfpath, description, issueaddeddate
						FROM conciissue where issueid =$iid order by issueyear,issueterm,iscurrentissue desc";
// 				echo($sql);
				$result_issue = $databaseConnection->query ( $sql );
				

				if ($result_issue->num_rows > 0) {

					$hasrec=( $row1 = $result_issue->fetch_assoc () );
					if($hasrec ){
					$pageTitle=(isset($pageTitle)?$pageTitle:'').$row1['issuetitle'];
					}
				}
					include("Includes/header.php");
					if ($result_issue->num_rows > 0) {
					echo('('.$row1['issueyear'].'/'.$row1['issueterm'].') ');
					echo('<strong>Editor(s): '.$row1['issueautherc'].'(c)</strong>, '.$row1['issueauther'].'<br/>');
					$sql = "SELECT articleid,articletitle,issueid,auther,articledate
						,abstract,status,articleimage from conciarticle where issueid =".$row1['issueid'];
				
					$result = $databaseConnection->query ( $sql );

					
				
					// output data of each row
					
				
				?>
				<link rel="stylesheet" href="/resource/jqui/jquery-ui.min.css"/>
				<script src="/resource/jqui/jquery-ui.min.js"></script>
				   
				    <div class="issue">
     <img alt="Cover Page" height="325px;" src="/resource/issue-content/<?php echo (is_null($row1['coverimagepath'])||empty($row1['coverimagepath'])?'ConciliumCover.png':($row1['issueyear']."/".$row1['coverimagepath']));?>"/>
     <div class="issue-action">
      <a href="/resource/issue-content/<?php echo ($row1['issueyear']."/Contents-".$row1['issueyear']."-".$row1['issueterm'].".pdf");?>" target="_blank">Download Contents</a> 

          <a href="/publishers.php">Subscribe</a> </div>
<?php if ($result->num_rows > 0) {?>
     <div class="articles" style="text-align: left;">
				<h2>Articles of the issue</h2>
				<div class="accordion">
				
				
				<?php 
				while ( $row = $result->fetch_assoc () ) {
					?>
					<h3><?php echo $row ["articletitle"];?></h3>
					<div>
					<p>
					<?php echo $row ["abstract"];?>
					</p>
					</div>
					
					<?php }	?>
				
				</div>
				</div>
				<?php 
				} else {
					echo "No Articles found.";
				}
				} else {
					echo "No issue found for the given id.";
				}
				?>
				
				
				</div>		<hr/>
		<ul id="issue-link">
                <li class="current-issue float-left"><a href="/current-issues"> Current Issues</a></li>
                <li class="future-issue float-left"><a href="/future-issues">Future Issues</a> </li>
                <li class="past-issue float-left"><a href="/past-issues">Past Issues</a> </li>
                <li class="clear"></li>
        </ul>
        
				<script>
  $(function() {
    $( ".accordion" ).accordion();
  });
  </script>
  
  
				<?php 
    include ("Includes/footer.php");
 ?>
 