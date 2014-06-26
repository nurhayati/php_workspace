<?php
session_start();
include "../include/koneksi.php";
$username=mysql_escape_string($_POST[username]);
$password=md5(mysql_escape_string($_POST[password]));
?>
<style type="text/css">
body{background:url(../images/bg-grid.png) #333 fixed; }
</style>
<table width="50%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
<td height="35" style="border:solid thin #cc6600; background:#FFF; font-family:'Maiandra GD'; font-size:18px; color:#996633;">
<?php
if($_SESSION['hlogin']==1){
$_SESSION['loginas']=0;
$_SESSION['hlogin']=0;
$_SESSION['user_id']=0;
?>
<div align="center">You Are Logout...<br />
Please While Wait Riderecting</div>
<?php }else{ ?>
<div align="center">Unable Access To This Pages...<br />
Please While Wait Riderecting</div>
<?php } ?>
</td>
</tr>
</table>
<meta http-equiv="refresh" content="3; url=../index.php"; />
