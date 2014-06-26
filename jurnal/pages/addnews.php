<?php
if($access!="masuk") die('invalid access');
if($_SESSION['loginas']!=9){
main::invalid("Document Not Found");
}else{
if($_POST[tambah]){
if(!empty($judul) and !empty($isi) and !empty($filefoto)){
if(file_exists("file/news/".$filefoto))
$filefoto=main::coding(5).$filefoto;
if(move_uploaded_file("$tmp_foto","file/news/".$filefoto)){
$random=main::coding(15);
$add=mysql_query("INSERT INTO `news` (`id`, `judul`, `isi`, `photo`, `tanggal`) VALUES ('NULL','$judul', '$isi', '$filefoto', '$tanggal')");
}else{
echo "max upload 1mb";
}
if($add){
echo "<center><font color=\"green\">*) Berhasil Tambahkan news Baru</center></font>";
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
      <td colspan="3">Tambahkan News Baru </td>
    </tr>
    <tr>
      <td width="11%">Judul</td>
      <td width="1%">:</td>
      <td width="88%"><input name="judul" type="text" id="judul" value="<?php echo $judul; ?>" /></td>
    </tr>
    <tr>
      <td>Isi</td>
      <td>:</td>
      <td><textarea name="isi" id="isi"><?php echo $isi; ?></textarea></td>
    </tr>
    <tr>
      <td>Foto</td>
      <td>:</td>
      <td><input name="filefoto" type="file" id="filefoto" /></td>
    </tr>

    <tr>
      <td colspan="3"><label>
        <input name="tambah" type="submit" id="tambah" value="Tambahkan" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php } ?>