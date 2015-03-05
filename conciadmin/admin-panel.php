<?php
				require_once ("../Includes/simplecms-config.php");
				require_once ("../Includes/connectDB.php");
				$pageTitle = 'Admin Panel';
				include ("../Includes/header.php");
				?>

<div>
	<button id="btnissues" onclick="$('#add_issue').dialog('open');$('#_form_issue')[0].reset();">Add
		Issue</button>
	<button id="btnarticle" onclick="">Add
		Article</button>
	<button id="btnnews" onclick="$('#add_news').dialog('open');$('#_form_news')[0].reset();CKEDITOR.instances.content.setData( '', function() { this.updateElement(); } );">Add News</button>
</div>
<div id="issue_list">
	<h3>Issue List</h3>
	<ul id="issue_ul">
	</ul>
    <?php
								$sql = "SELECT 
						issueid, issuetitle, issueyear, issueterm, coverimagepath,issueautherc,issueauther
						, iscurrentissue, contentpdfpath, description, issueaddeddate 
						FROM conciissue order by issueyear desc,issueterm desc ";
								$result = $databaseConnection->query ( $sql );
								
								if ($result->num_rows > 0) {
									$rows = array();
									// output data of each row
									while ( $row = $result->fetch_assoc () ) {
										$rows[]=$row;
//										echo json_encode( $row );
										
								}
								echo '<script> var issueData='.json_encode($rows).';</script>';
								} else {
									echo "0 results";
								}
								
								?>
				</ul>
</div>
<hr />
<div id="news_list">
	<h3>News List</h3>
	<ul id="news_ul"></ul>
    <?php
								$sql = "SELECT newsid, newstitle, content, status, publishdate
						FROM concinews ";
								$result = $databaseConnection->query ( $sql );
								$rows = array();
								if ($result->num_rows > 0) {
									while ( $row = $result->fetch_assoc () ) {
										$rows[]=$row;
									}
				echo '<script> var newsData='.json_encode($rows).';</script>';
								} else {
									echo "0 results";
								}
								?>



</div>
<link href="<?php echo ($_root);?>resource/jqui/jquery-ui.min.css"
	rel="stylesheet" type="text/css" />

<script type="text/javascript"
	src="<?php echo ($_root);?>resource/jqui/jquery-ui.min.js"></script>


<div id="add_issue" title="Issue" class="idialog">
	<form id="_form_issue" action="addissue.php" method="post">
	<input type="hidden" name="issueid" value=""/>
		<table border="0" cellspacing="0" cols="1" frame="void" rules="none">
			<colgroup>
				<col width="86" />
			</colgroup>
			<tbody>
				<tr>
					<td width="86"><span>ISSUETITLE</span></td>
					<td width="86"><input id="issuetitle" name="issuetitle" type="text" /></td>
				</tr>
				<tr>
					<td><span>ISSUEYEAR</span></td>
					<td>
						<!-- <input id="issueyear" name="issueyear" type="text" /> --> <select
						id="issueyear" name="issueyear">
			<?php
			for($i = date ( "Y" ) - 3; $i < date ( "Y" ) + 3; $i ++) {
				?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
			}
			?>
			</select>
					</td>
				</tr>
				<tr>
					<td><span>ISSUETERM</span></td>
					<td><input id="issueterm" name="issueterm" type="number" size="1" maxlength="1" min="1" max="9" /></td>
				</tr>
				<tr>
					<td><span>ISSUEAUTHER(C)</span></td>
					<td><input id="issueautherc" name="issueautherc" type="text" /></td>
				</tr>
				<tr>
					<td><span>OTHER AUTHERS</span></td>
					<td><input id="issueauther" name="issueauther" type="text" /></td>
				</tr>
				<tr>
					<td><span>ISCURRENTISSUE</span></td>
					<td>
						<!-- <input id="iscurrentissue" name="iscurrentissue" type="text" /> -->
						<input id="iscurrentissue" name="iscurrentissue" type="radio"
						value="1" checked="checked" />-Yes <input id="iscurrentissue"
						name="iscurrentissue" type="radio" value="0" />-No
					</td>
				</tr>
				<!-- 		<tr>
			<td><span>COVERIMAGEPATH</span></td>
			<td><input id="coverimagepath" name="coverimagepath" type="text" /></td>
		</tr>
		<tr>
			<td><span>CONTENTPDFPATH</span></td>
			<td><input id="contentpdfpath" name="contentpdfpath" type="text" /></td>
		</tr> -->
				<tr>
					<td><span>DESCRIPTION</span></td>
					<td><input id="description" name="description" type="text" /></td>
				</tr>
			</tbody>
		</table>
		<button type="submit">Submit</button>

	</form>
</div>

<div id="add_title" title="Article" class="idialog">
	<form action="addarticle.php" method="post" id="_form_article">
		<input type="hidden" id="articleid" name="articleid" value="" /> <input
			type="hidden" id="" name="issueid" value="" /> <input
			type="hidden" id="status" value="1" name="status" />
		<table>
			<TBODY>
				<TR>
					<TD>ARTICLE TITLE</TD>
					<TD><input type="text" id="articletitle" name="articletitle" /></TD>
				</TR>
				<TR>
					<TD>AUTHER</TD>
					<TD><input type="text" id="auther" name="auther" /></TD>
				</TR>
				<TR>
					<TD>ARICLEDATE</TD>
					<TD><input type="text" id="aricledate" name="aricledate" /></TD>
				</TR>
				<TR>
					<TD>ABSTRACT</TD>
					<TD><textarea class="editor" id="abstract" name="abstract"></textarea></TD>
				</TR>
				<TR>
					<TD>ARTICLEIMAGE</TD>
					<TD><input type="text" id="articleimage" name="articleimage" /></TD>
				</TR>
			</TBODY>
		</table>

		<button type="submit">Submit</button>

	</form>
</div>

<div id="add_news" title="News" class="idialog">
	<form id="_form_news" action="addnews.php" method="post">
		<input type="hidden" id="newsid" name="newsid" /> <input
			type="hidden" id="status" value="1" name="status" />
		<table>
			<TBODY>
				<TR>
					<TD>NEWS TITLE</TD>
					<TD><input type="text" id="newstitle" name="newstitle" /></TD>
				</TR>
				<TR>
					<TD>content</TD>
					<TD><textarea class="editor" id="content" name="content"></textarea></TD>
				</TR>
			</TBODY>
		</table>

		<button type="submit">Submit</button>

	</form>
</div>
<script type="text/javascript" src="/resource/ckeditor/ckeditor.js"></script>
<script type="text/javascript"
	src="/resource/ckeditor/adapters/jquery.js"></script>
<script>

$(document).ready(function(){
	$( 'textarea.editor' ).ckeditor();
$('.idialog').dialog({autoOpen:false,width: 500,modal:true,
	open: function () {
		
		//$('div.ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-front').unbind('mousedown');

	}});
});
</script>
<?php
require_once ("../Includes/closeDB.php");
include ("../Includes/footer.php");
					?>