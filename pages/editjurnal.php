<?php
if($access!="masuk") die('invalid access');
if(!($_SESSION['loginas']==9 or $_SESSION['loginas']==2)){
main::invalid("Document Not Found");
}else{
$id=$_GET['id'];
$query=mysql_fetch_array(mysql_query("select * from jurnal where id='$id'"));
if($_POST[tambah]){
if(!empty($category) and  !empty($author) and  !empty($judul) and !empty($isi) and !empty($status) and  !empty($harga)){
if(!empty($filefoto) and !empty($fileres)){
if(file_exists("file/jurnal/".$fileres) and file_exists("file/foto_jurnal/".$fileres))
$fileres=main::coding(5).$fileres;
$filefoto=main::coding(5).$filefoto;
if(move_uploaded_file("$tmp_file","file/jurnal/".$fileres) and move_uploaded_file("$tmp_foto","file/foto_jurnal/".$filefoto)){
$random=main::coding(15);
$add=mysql_query("UPDATE `jurnal` SET `category`='$category', `author`='$author', `judul`='$judul', `isi`='$isi', `file`='$fileres', `foto`='$filefoto', `status`='$status', `harga`='$harga', `tanggal`='$tanggal' where id='$id'");
}else{
echo "max upload 1mb";
}
}else{
$add=mysql_query("UPDATE `jurnal` SET `category`='$category', `author`='$author', `judul`='$judul', `isi`='$isi', `status`='$status', `harga`='$harga', `tanggal`='$tanggal' where id='$id'");
}
if($add){
echo "<center><font color=\"green\">*) Berhasil Update Data Jurnal </center></font>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=adminjurnal'; />";
}else{
echo mysql_error();
}
}else{
echo "<center><font color=\"red\">*) Invalid Form Data</font></center>";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0">
    <tr>
      <td colspan="3">Update Data  Journal</td>
    </tr>
    <tr>
      <td width="11%">Category</td>
      <td width="1%">:</td>
      <td width="88%"><label>
        <select name="category" id="category">
		<OPTION value="">ALL CATEGORY</OPTION>
		<?php
		$c=mysql_query("select * from category");
		while($dt=mysql_fetch_array($c)){
		echo "<option value=\"$dt[1]\">$dt[1]</option>";
		}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Author</td>
      <td>:</td>
      <td><select name="author" id="author">
	  <OPTION value="">ALL AUTHOR</OPTION>
	  <?php
		$a=mysql_query("select * from author");
		while($dt=mysql_fetch_array($a)){
		echo "<option value=\"$dt[0]\">$dt[fname]</option>";
		}
		?>
            </select></td>
    </tr>
    <tr>
      <td>Judul</td>
      <td>:</td>
      <td><input name="judul" type="text" id="judul" value="<?php echo $query['judul']; ?>" /></td>
    </tr>
    <tr>
      <td>Isi</td>
      <td>:</td>
      <td><textarea name="isi" id="isi"><?php echo $query['isi']; ?></textarea></td>
    </tr>
    <tr>
      <td>Status</td>
      <td>:</td>
      <td><select name="status" id="status">
        <option value="FREE">FREE</option>
        <option value="BUY">BUY</option>
                  </select></td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>:</td>
      <td><input name="harga" type="text" id="harga" value="<?php echo $query['harga']; ?>" <?php if($_SESSION['loginas']==2) echo 'disabled="disabled"'; ?> />
      Rp.</td>
    </tr>
    <tr>
      <td>File</td>
      <td>:</td>
      <td><label>
        <input name="fileres" type="file" id="fileres" />
      </label></td>
    </tr>
    <tr>
      <td>Foto</td>
      <td>:</td>
      <td><input name="filefoto" type="file" id="filefoto" /></td>
    </tr>

    <tr>
      <td colspan="3"><label>
        <input name="tambah" type="submit" id="tambah" value="Update Now" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php } ?>