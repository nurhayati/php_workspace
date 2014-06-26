<?php
session_start();
include "include/koneksi.php";
include "include/function.php";
include "include/postdata.php";
$access="masuk";
$p=mysql_escape_string($_GET[p]);
$p=strtolower($p);
$action=mysql_escape_string($_GET[action]);
$id=mysql_escape_string($_GET[id]);
$title=ucwords(str_replace(" ","-",$p))
?>
<title><?php echo ".::Indonesian Jurnal | $p $action::."; ?></title>
<link rel="stylesheet" type="text/css" href="css.css" />
<link rel="icon" href="favicon.png" type="image/png">
<!--mulai container-->
<div class="container">
<!--mulai wrapper-->
<div class="wrapper">
<!--mulai top-nav-->
<div class="top-nav">
<!--mulai search-->
<div class="search">
  <form action="index.php?p=jurnal" method="post">
    <img src="images/cari.png" width="40" height="20" />
    <input type="hidden" name="p" id="jurnal" />
<input type="text" name="keyword" />
<select name="authorid">
<option value="">ALL AUTHOR</option>
<?php
$a=mysql_query("select * from author");
while($da=mysql_fetch_array($a)){
echo "<option value=\"$da[0]\">$da[fname]</option>";
}
?>
</select>
<select name="catid">
<option value="">ALL CATEGORY</option>
<?php
$c=mysql_query("select * from category");
while($dc=mysql_fetch_array($c)){
echo "<option value=\"$dc[1]\">$dc[1]</option>";
}
?>
</select>
<input name="search" type="submit" value="Search" />
</form>
</div>
<!--mulai left top-nav-->
<div class="breadchumb">
<strong>You In Here : </strong><a href="index.php">IndonesianJournal</a> <?php if(!empty($p)) echo '&raquo;'.$title; ?>
</div>
</div>
<div class="header radius shadow">
<embed src="header/banner.swf" quality="hight" height="125" width="960" type="application-flash/shockwave-x"></embed>
</div>
<!--mulai mani-nav-->
<div class="main-nav radius shadow">
<ul>
<li><a href="index.php?p=jurnal"><span>Jurnal Catalog </span></a>&nbsp; |&nbsp;</li>
<li><a href="index.php?p=news"><span>News & Events</span></a>&nbsp; | &nbsp;</li>
<li><a href="index.php?p=about"><span>About</span></a>&nbsp; |&nbsp; </li>
<li><a href="index.php?p=help"><span>Help</span></a></li>
</ul>
</div>
<!--muali main-content-->
<div class="main-content">
<!--mulai left-->
<div class="column1 box radius shadow">
<h3 class="title">
<?php
if(!empty($p))
echo $title;
else
echo "Welcome To Indo Jurnal Homepage";
?>
</h3>
<div class="body">
<?php
if(!empty($p) and !empty($action)){
include "pages/$p-$action.php";
}else if(!empty($p)){
include "pages/$p.php";
}else{
include "pages/jurnal.php";
}
?>
</div>
</div>
<!--muali right-->
<div class="column2">
<div class="box radius shadow">
<h3>List Category</h3>
<div>
<ul class="menu">
<?php
$c=mysql_query("select * from category");
while($dt=mysql_fetch_array($c)){
?>
<li><a href="index.php?p=jurnal&category=<?php echo $dt['category']; ?>"><span><?php echo $dt['category']; ?></span></a></li>
<?php } ?>
</ul>
</div>
</div>
<!--menu admin-->
<?php if($_SESSION['loginas']==9) { ?>
<div class="box radius shadow">
<h3>Halaman Admin</h3>
<div>
<ul class="menu">
<li><a href="index.php?p=adminjurnal"><span>List Jurnal</span></a></li>
<li><a href="index.php?p=admintransaksi"><span>List Transaksi</span></a></li>
<li><a href="index.php?p=adminmember"><span>List Member</span></a></li>
<li><a href="index.php?p=adminauthor"><span>List Author</span></a></li>
<li><a href="index.php?p=adminnews"><span>List News</span></a></li>
<li><a href="index.php?p=adminiklan"><span>List Iklan</span></a></li>
<li><a href="pages/logout.php"><span>Logout</span></a></li>
</ul>
</div>
</div>
<!--halaman author-->
<?php }else if($_SESSION['loginas']==2){ ?>
<div class="box radius shadow">
<h3>Halaman Author</h3>
<div>
<ul class="menu">
<li><a href="index.php?p=adminjurnal"><span>List Jurnal</span></a></li>
<li><a href="index.php?p=detailauthor"><span>Detail Account</span></a></li>
<li><a href="index.php?p=editauthor"><span>Edit Author</span></a></li>
<li><a href="pages/logout.php"><span>Logout</span></a></li>
</ul>
</div>
</div>
<!--halaman member-->
<?php }else if($_SESSION['loginas']==1){ ?>
<div class="box radius shadow">
<h3>Halaman Member</h3>
<div>
<ul class="menu">
<li><a href="index.php?p=cartmember"><span>List Cart</span></a></li>
<li><a href="index.php?p=transaksimember"><span>List Transaksi</span></a></li>
<li><a href="index.php?p=detailmember"><span>Member Member</span></a></li>
<li><a href="index.php?p=editmember"><span>Edit Member</span></a></li>
<li><a href="pages/logout.php"><span>Logout</span></a></li>
</ul>
</div>
</div>
<?php } ?>
<?php if($_SESSION['hlogin']==0){ ?>
<div class="box radius shadow">
<h3>Login User</h3>
<div>
<form action="pages/ceklogin.php" method="post">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td>Insert Your Username</td>
</tr>
<tr>
<td><input name="username" type="text" id="username" size="28" /></td>
</tr>
<tr>
<td>Insert Your Password</td>
</tr>
<tr>
<td><input name="password" type="password" size="28" /></td>
</tr>
<tr>
<td><input name="login" type="submit" value="Login Now" /> 
| <a href="index.php?p=register">Register</a></td>
</tr>
</table>
</form>
</div>
</div>
<?php } ?>
<div class="box radius shadow">
<h3>Link Iklan</h3>
<div>
<?php
$queryik=mysql_query("select * from iklan");
while($ik=mysql_fetch_array($queryik)){
?>
<a target="_blank" href="http://<?php echo $ik['link']; ?>"><br />
<img src="file/iklan/<?php echo $ik['photo']; ?>" width="190" /></a>
<?php } ?>
</div>
</div>
</div>
<!--akhir column2-->
</div>
<!--akhir content-->
</div>
<div class="footer">
<a href="index.php">Indonesian Journal</a> &copy; Creative Nurhayati 2012</div>
<!--akhir container-->
</div>
<!--akhir warpper-->
</div>
