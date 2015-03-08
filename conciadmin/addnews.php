<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
			include ("../Includes/simplecms-config.php");
				include ("../Includes/connectDB.php");

				$_newsid=$_POST['newsid'];
				$_newstitle=$_POST['newstitle'];
				$_content=$_POST['content'];
				
				if(!empty($_newsid)){
					$sql="update concinews SET newstitle='".$_newstitle."', content='".$_content."' where newsid=".$_newsid;
				}else{
				$sql = "INSERT into  concinews(	
newstitle, content, status, publishdate)
				
						values(
NULLIF('" . $_newstitle . "',''),
NULLIF('" . $_content . "',''),1,now()
						)";
				}
				//echo($sql);
				$result = $databaseConnection->query ( $sql );
				//echo($result);

				if (!$result) {
					$message  = '<b>Cannot save:</b>' . mysqli_error($databaseConnection) . '<br><br>';
					// 						$message .= '<b>Whole query:</b><br>' . $sql . '<br><br>';
					die($message);
				}
				include ("../Includes/closeDB.php");
				if($result=='1'){
					header('Location: '.'admin-panel.php');
				}
				?>