<?php
				require_once ("Includes/simplecms-config.php");
				require_once ("Includes/connectDB.php");
				
				$sql = "SELECT newsid, newstitle, content, status, publishdate
						FROM concinews where status=1 ".(isset($dlimit)?(' LIMIT '.$dlimit):'');
				$result = $databaseConnection->query ( $sql );
				
				if ($result->num_rows > 0) {
				?>
				<?php 
				while ( $row = $result->fetch_assoc () ) {
					?>
					<h3><?php echo $row ["newstitle"];?></h3>
					<span style="font-style:italic; "><?php echo $row ["publishdate"];?></span>
					<div>
					<p>
					<?php echo $row ["content"];?>
					</p>
					</div>
					<hr/>
					<?php }	?>
				<?php 
				} else {
					echo "0 results";
				}
				?>