<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$query="select * from jurnal where 0=0";
if($_POST[search]){
if(!empty($_POST['catid'])){
$query .=" and category like '%$_POST[catid]%'";
}
if(!empty($_POST['authorid'])){
$query .=" and author like '%$_POST[authorid]%'";
}
if(!empty($_POST['keyword'])){
$query .=" and judul like '%$_POST[keyword]%'";
}
}else{
if($_GET['category']!=""){
$query .=" and category like '%$_GET[category]%'";
}
}
$query .=" order by id desc";
$q=mysql_query($query);
$num_data=mysql_num_rows($q);
if($num_data==0){ echo "<center><font color=\"red\">*) DATA NOT FOUND</font></center>"; }
while($data=mysql_fetch_array($q)){
$author=mysql_fetch_array(mysql_query("select * from author where id='$data[author]'"));
?>
<table width="100%" border="0">
  <tr>
    <td><?php echo "<a href='index.php?p=detailjurnal&id=$data[0]'><label style='font-size:24px;'>$data[judul]</label></a> <br>Category :  $data[category] <br>Author : $author[fname] $author[lname]"; ?></td>
  </tr>
  <tr>
    <td><img src="file/foto_jurnal/<?php echo $data['foto']; ?>" width="90" align="left" /><?php echo substr(nl2br($data['isi']),0,350)."<a href='index.php?p=detailjurnal&id=$data[0]'>Readmore...</a>"; ?></td>
  </tr>
  <tr>
  <td><?php echo "Status : <a href='#'>$data[status]</a> --Price : $data[harga]"; ?></td>
  </tr>  
  <tr>
    <td>
	<img src="images/c.png" width="40" height="40" />
	<?php
	if($_SESSION['loginas']==1){
	if($data[status]=="FREE") echo "<input type='button' value='Download Free, Rp.0'> onclick=\"window.location='file/jurnal/$data[file]'\""; else echo "<form action='index.php?p=cartmember' method='post'><input type='hidden' name='id_jurnal' value='$data[0]'><input type='submit' value='Add To Cart'></form>";
	}else{
	echo "Login Dulu sebagai member Jika Ingin Beli Jurnal <a href='index.php?p=login'>[LOGIN]</a>";
	}
	?>	</td>
  </tr>
</table>
<hr />
<?php } ?>
</body>
</html>
