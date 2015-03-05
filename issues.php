<?php 
$__issueid='(SELECT issueid FROM conciissue where iscurrentissue=1 and issueyear='.date("Y").' order by issueterm desc LIMIT 1)';
$pageTitle='Current Issue: ';
    include ("issue-detail.php");
 ?>