<?php
				require_once ("Includes/simplecms-config.php");
				require_once ("Includes/connectDB.php");
				
				$sql = "SELECT 
						issueid, issuetitle, issueyear, issueterm,issueautherc,issueauther, coverimagepath
						, iscurrentissue, contentpdfpath, description, issueaddeddate 
						FROM conciissue where issueyear in(".$issueyear.") order by issueyear desc,issueterm desc ";
				$result = $databaseConnection->query ( $sql );
				
				if ($result->num_rows > 0) {
					// output data of each row
					
				
				?>
				<ul class="issue-list">
				<?php 
				while ( $row = $result->fetch_assoc () ) {
					?>
					<li>
					<span class="coverimagepath">
					<img alt="Cover Page" height="35px;" width="35px" src="thumbnail/coverimg/<?php echo $row['issueyear']."/Coverpage".$row['issueyear']."-".$row ["issueterm"].".png"?>"/>
     </span>
					<span class="issueyear"><?php echo $row ["issueyear"];?></span>/
					<span class="issueterm"><?php echo $row ["issueterm"];?></span>-
					<span class="issuetitle"><?php echo $row ["issuetitle"];?></span>
					<span class="issueautherc"><?php echo $row ["issueautherc"];?>(c)</span>,
					<span class="issueauther"><?php echo $row ["issueauther"];?></span>
					<a href="issue-detail/<?php echo $row ["issueid"]."/".str_replace(" ","-",$row ["issuetitle"]);?>">View Details</a>
					     
    |       <a href="/resource/issue-content/<?php echo ($row['issueyear']."/Contents-".$row['issueyear']."-".$row['issueterm'].".pdf");?>" target="_blank">Download Contents</a> 
    			</li>
					<?php }	?>
				
				</ul>
				<?php 
				} else {
					echo "0 results";
				}
				?>
				
				<br/>
				     <div class="issue-action">
      <a href="/resource/issue-content/index.php">Browes &amp; Download Contents</a>
</div>
				<!-- <a href="conciadmin/admissues.php">Add Issues</a> -->