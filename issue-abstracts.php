<?php    
				require_once ("Includes/simplecms-config.php");
				require_once ("Includes/connectDB.php");

				header('Content-Type: application/json');
					$sql = "SELECT articleid,articletitle,issueid,auther,articledate
						,abstract,status,articleimage from conciarticle where issueid =".$_REQUEST['issueid'];
				
					$result = $databaseConnection->query ( $sql );
					$rows = array();
					if ($result->num_rows > 0) {
						while ( $row = $result->fetch_assoc () ) {
							$rows[]=$row;
						}
					} 
						echo json_encode($rows);
 ?>
 