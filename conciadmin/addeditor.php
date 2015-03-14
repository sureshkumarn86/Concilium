<?php
?>
<div id="add_editor" title="Editor" class="idialog">
	<form action="" method="post" id="_form_editor">
		<input type="hidden" id="editorid" name="articleid" value="" /> <input
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