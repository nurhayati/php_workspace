<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$id=$_GET['id'];
$query=mysql_fetch_array(mysql_query("select * from jurnal where id='$id'"));
$author=mysql_fetch_array(mysql_query("select * from author where id='$query[author]'"));
?>
<table width="100%" border="0">
  <tr>
    <td><?php echo "<a href='index.php?p=detailjurnal&id=$query[0]'><label style='font-size:24px;'>$query[judul]</label></a> <br>Category :  $query[category] <br>Author : $author[fname] $author[lname]"; ?></td>
  </tr>
  <tr>
    <td><img src="file/foto_jurnal/<?php echo $query['foto']; ?>" width="190" align="left" /><?php echo $query['isi']; ?></td>
  </tr>
    <tr>
  <td><?php echo "Status : <a href='#'>$query[status]</a> --Price : $query[harga]"; ?></td>
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
	?>		</td>
  </tr>
</table>
</body>
</html>
