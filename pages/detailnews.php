<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$id=$_GET['id'];
$query=mysql_fetch_array(mysql_query("select * from news where id='$id'"));
?>
<table width="100%" border="0">
  <tr>
    <td><?php echo "<a href='index.php?p=detailnews&id=$query[0]'><label style='font-size:24px;'>$query[judul]</label></a>"; ?></td>
  </tr>
  <tr>
    <td><img src="file/news/<?php echo $query['photo']; ?>" width="190" align="left" /><?php echo $query['isi']; ?></td>
  </tr>
  <tr>
    <td>
	<br />
	<?php echo "Posted By : <a href='#'>Admin</a> -- Date : $query[tanggal]"; ?>
	</td>
  </tr>
</table>
</body>
</html>
