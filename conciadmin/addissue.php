<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
			include ("../Includes/simplecms-config.php");
				include ("../Includes/connectDB.php");
				
				$_issuetitle = $_POST ['issuetitle'];
				$_issueyear = $_POST ['issueyear'];
				$_issueterm = $_POST ['issueterm'];
				$_issueautherc = $_POST ['issueautherc'];
				$_issueauther = $_POST ['issueauther'];
// 				$_coverimagepath = $_POST ['coverimagepath'];
				$_iscurrentissue = $_POST ['iscurrentissue'];
// 				$_contentpdfpath = $_POST ['contentpdfpath'];
				$_description = $_POST ['description'];
// 				$_issueaddeddate = $_POST ['issueaddeddate'];
				
				$_issuetitle=$_issuetitle==''?null:$_issuetitle;
				$_issueyear=$_issueyear==''?null:$_issueyear;
				$_issueterm=$_issueterm==''?null:$_issueterm;
				$_issueterm=$_issueterm==''?null:$_issueterm;
				$_issueautherc=$_issueautherc==''?null:$_issueautherc;
				$_issueauther=$_issueauther==''?null:$_issueauther;
// 				$_coverimagepath=$_coverimagepath==''?null:$_coverimagepath;
				$_iscurrentissue=$_iscurrentissue==''?null:$_iscurrentissue;
// 				$_contentpdfpath=$_contentpdfpath==''?null:$_contentpdfpath;
				$_description=$_description==''?null:$_description;
// 				$_issueaddeddate=$_issueaddeddate==''?null:$_issueaddeddate;
				
				$_issueid=$_POST ['issueid'];
				if(!empty($_issueid)){
/* 				$sql="update conciissue set issuetitle='".$_issuetitle."'"
.",issueyear='".$_issueyear."'"
.",issueterm='".$_issueterm."'"
.",issueautherc='".$_issueautherc."'"
.",issueauther='".$_issueauther."'"
// .",coverimagepath='".$_coverimagepath."'"
.",iscurrentissue='".$_iscurrentissue."'"
// .",contentpdfpath='".$_contentpdfpath."'"
.",description='".$_description."' where issueid=".$_issueid; */
				
				$sql="update conciissue set 
						issuetitle=?
						, issueyear=?
						, issueterm=?
						,issueautherc=?
						,issueauther=?
						, coverimagepath=?
						, iscurrentissue=?
						, contentpdfpath=?
						, description=? where issueid=?";

				$stmt = $databaseConnection->prepare($sql) or trigger_error($databaseConnection->error);
				$stmt->bind_param("sddsssdssd",  $_issuetitle ,
						$_issueyear ,
						$_issueterm ,
						$_issueautherc ,
						$_issueauther ,$_coverimagepath,
						$_iscurrentissue,$contentpdfpath,
						$_description,$_issueid  );
				}else{
/* 				$sql = "INSERT into conciissue( 
						 issuetitle, issueyear, issueterm,issueautherc,issueauther, coverimagepath
						, iscurrentissue, contentpdfpath, description)
						values(
NULLIF('" . $_issuetitle . "',''),
NULLIF('" . $_issueyear . "',''),
NULLIF('" . $_issueterm . "',''),
NULLIF('" . $_issueautherc . "',''),
NULLIF('" . $_issueauther . "',''),
NULLIF('" . $_iscurrentissue . "',''),
NULLIF('" . $_description . "','')
						)"; */
				$sql="INSERT into conciissue( 
						 issuetitle, issueyear, issueterm,issueautherc,issueauther, coverimagepath
						, iscurrentissue, contentpdfpath, description)
						values(?,?,?,?,?,?,?,?,?)";
				$stmt = $databaseConnection->prepare($sql);
				$stmt->bind_param("sddssssss",  $_issuetitle ,
 $_issueyear ,
 $_issueterm ,
 $_issueautherc ,
 $_issueauther ,$_coverimagepath,
 $_iscurrentissue,$contentpdfpath,
 $_description  );
				}
				
					
					$result = $stmt->execute();
				
				
// 				echo($sql);
// 				$result = $databaseConnection->query ( $sql );
				echo mysql_error() . "\n";
// 				echo($result);
				if (!$result) {
						$message  = '<b>Cannot save:</b>' . mysqli_error($databaseConnection) . '<br><br>';
// 						$message .= '<b>Whole query:</b><br>' . $sql . '<br><br>';
						die($message);
					}
				
				if($result=='1'){
					header('Location: '.'admin-panel.php');
				}
				include ("../Includes/closeDB.php");
				?>