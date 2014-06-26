<?php
if($access!="masuk") die('invalid access');
if($_SESSION['loginas']!=9){
main::invalid("Document Not Found");
}else{
$id=$_GET['id'];
$query=mysql_fetch_array(mysql_query("select * from news where id='$id'"));
if($_POST[tambah]){
if(!empty($judul) and !empty($isi)){
if(!empty($filefoto)){
if(file_exists("file/news/".$filefoto))
$filefoto=main::coding(5).$filefoto;
if(move_uploaded_file("$tmp_foto","file/news/".$filefoto)){
$random=main::coding(15);
$add=mysql_query("UPDATE `news` SET `judul`='$judul', `isi`='$isi',  `foto`='$filefoto', `tanggal`='$tanggal' where id='$id'");
}else{
echo "max upload 1mb";
}
}else{
$add=mysql_query("UPDATE `news` SET  `judul`='$judul', `isi`='$isi', `tanggal`='$tanggal' where id='$id'");
}
if($add){
echo "<center><font color=\"green\">*) Berhasil Update Data news </center></font>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=adminnews'; />";
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
      <td colspan="3">Update Data News  </td>
    </tr>
    <tr>
      <td width="11%">Judul</td>
      <td width="1%">:</td>
      <td width="88%"><input name="judul" type="text" id="judul" value="<?php echo $query['judul']; ?>" /></td>
    </tr>
    <tr>
      <td>Isi</td>
      <td>:</td>
      <td><textarea name="isi" id="isi"><?php echo $query['isi']; ?></textarea></td>
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