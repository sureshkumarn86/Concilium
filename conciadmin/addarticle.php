<?php
				error_reporting ( E_ALL );
				ini_set ( 'display_errors', '1' );
				include ("../Includes/simplecms-config.php");
				include ("../Includes/connectDB.php");
				
				$_articleid = $_POST ['articleid'];
				$_issueid = $_POST ['issueid'];
				$_articletitle = $_POST ['articletitle'];
				$_auther = $_POST ['auther'];
				$_abstract = $_POST ['abstract'];
				$_articleimage = $_POST ['articleimage'];
				
				if (! empty ( $_articleid )) {
					$sql="update conciarticle set issueid=?
,	articletitle=?
,	auther=?
,	abstract=?
,	articleimage=? where articleid=?";
					$stmt = $databaseConnection->prepare ( $sql ) or trigger_error ( $databaseConnection->error );
					$stmt->bind_param ( "dssssd", $_issueid, $_articletitle, $_auther, $_abstract, $_articleimage ,$_articleid);
				} else {
					
					$sql = "INSERT into  conciarticle(	
	issueid
,	articletitle
,	auther
,	abstract
,	articleimage) values(?,?,?,?,?)";
					
					$stmt = $databaseConnection->prepare ( $sql ) or trigger_error ( $databaseConnection->error );
					$stmt->bind_param ( "dssss", $_issueid, $_articletitle, $_auther, $_abstract, $_articleimage );
				}
				echo($sql);
				$result = $stmt->execute ();
				echo ($result);
				if ($result == '1') {
					header ( 'Location: ' . 'admin-panel.php' );
				}
				include ("../Includes/closeDB.php");
				?>