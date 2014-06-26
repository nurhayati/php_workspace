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
$member=mysql_query("select * from member where username='$username' and password='$password'");
$data=mysql_fetch_array($member);
$cek=mysql_num_rows($member);
if($cek==0){
$author=mysql_query("select * from author where username='$username' and password='$password'");
$data=mysql_fetch_array($author);
$cek=mysql_num_rows($author);
if($cek==0){
$admin=mysql_query("select * from admin where username='$username' and password='$password'");
$data=mysql_fetch_array($admin);
$cek=mysql_num_rows($admin);
if($cek==0){ 
$invalid=1;
}else{
$status=9;//for admin
$invalid=0;
}
}else{
$status=2;//for member
$invalid=0;
}
}else{
$status=1;//for member
$invalid=0;
}
?>
<?php
if($invalid==0){
$_SESSION['loginas']=$status;
$_SESSION['hlogin']=1;
$_SESSION['user_id']=$data[0];
?>
<div align="center">You Are Login...<br />
Please While Wait Riderecting</div>
<?php }else{ ?>
<div align="center">Password Or email False...<br />
Please Cek Again</div>
<?php } ?>
</td>
</tr>
</table>
<meta http-equiv="refresh" content="3; url=../index.php"; />
