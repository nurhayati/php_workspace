<?php
if($access!="masuk") die('invalid access');
if($_GET['act']=='del'){
$id=$_GET[id];
$del=mysql_query("delete from iklan where id='$id'");
if(!$del){ echo "Data gagal hapus"; }
}
if($_SESSION['loginas']!=9){
main::invalid("Document Not Found");
}else{
if($_POST[tambah]){
if(!empty($judul) and !empty($link) and !empty($fileres)){
if(file_exists("file/iklan/".$fileres))
$fileres=main::coding(5);
if(move_uploaded_file("$tmp_file","file/iklan/".$fileres)){
$add=mysql_query("insert into iklan (id,judul,link,photo) values (NULL,'$judul','$link','$fileres')");
}else{
echo "max upload 1mb";
}
if($add){
echo "<center><font color=\"green\">*) Berhasil Tambahkan Iklan Baru</center></font>";
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
      <td colspan="3">Tambahkan Iklan Baru </td>
    </tr>
    <tr>
      <td width="14%">Judul</td>
      <td width="1%">:</td>
      <td width="85%"><label>
        <input name="judul" type="text" id="judul" />
      </label></td>
    </tr>
    <tr>
      <td>Link</td>
      <td>:</td>
      <td><input name="link" type="text" id="link" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td>:</td>
      <td><label>
        <input name="fileres" type="file" id="fileres" />
      </label></td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <input name="tambah" type="submit" id="tambah" value="Tambahkan" />
      </label></td>
    </tr>
  </table>
</form>

<br />
<table width="100%" border="0" id="t">
  <tr bgcolor="#996633">
    <td>No</td>
    <td>Link</td>
    <td>Tools</td>
  </tr>
  <?php
  $no=0;
  $query=mysql_query("select * from iklan order by id desc");
  while($data=mysql_fetch_array($query)){
  $no++;
  ?>
  <tr <?php if($no%2==0) echo 'bgcolor="#aa7f00"'; ?>>
    <td><?php echo $no; ?></td>
    <td><?php echo "<a href='$data[link]'>$data[link]</a>"; ?></td>
    <td><a href="javascript:void(0);" onclick="var agree=confirm('Are You Sure Delete?'); if(agree){ window.location='index.php?p=adminiklan&act=del&id=<?php echo $data[0];?>'; } return false;">[D]</a></td>
  </tr><?php } ?>
</table>

</body>
</html>
<?php } ?>