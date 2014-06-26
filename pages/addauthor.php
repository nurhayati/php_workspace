<?php
if($access!="masuk") die('invalid access');
if(!($_SESSION['loginas']==9 or $_SESSION['hlogin']==0)){
main::invalid("Document Not Found");
}else{
if($_POST[tambah]){
if(!empty($fname) and  !empty($lname) and  !empty($province) and !empty($city) and !empty($address) and  !empty($phone) and  !empty($gelar) and !empty($description) and !empty($filefoto) and !empty($username) and !empty($password)){
if(is_numeric($phone)){
if(file_exists("file/foto/".$filefoto))
$filefoto=main::coding(5).$filefoto;
if(move_uploaded_file("$tmp_foto","file/foto/".$filefoto)){
$random=main::coding(15);
$password=md5($password);
$add=mysql_query("INSERT INTO `author` (`id`, `fname`, `lname`, `province`, `city`, `address`, `phone`, `gelar`, `description`, `photo`, `username`, `password`) VALUES ('$random', '$fname', '$lname', '$province', '$city', '$address', '$phone', '$gelar', '$description', '$filefoto', '$username', '$password')");
}else{
echo "max upload 1mb";
}
if($add){
if($_SESSION['loginas']==9){
echo "<center><font color=\"green\">*) Berhasil Tambahkan Author Baru</center></font>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=adminauthor'; />";
}else{
echo "<center><font color=\"green\">*) Anda Berhasil Bergabung Menjadi Author</center></font>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=login'; />";
}
}else{
echo mysql_error();
}
}else{
echo "<center><font color=\"red\">*) Format Phone False</font></center>";
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
      <td colspan="3">Tambahkan Author Baru </td>
    </tr>
    <tr>
      <td width="19%">First Name </td>
      <td width="1%">:</td>
      <td width="80%"><label>
        <input name="fname" type="text" id="fname" value="<?php echo $fname; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Last Name </td>
      <td>:</td>
      <td><input name="lname" type="text" id="lname" value="<?php echo $lname; ?>" /></td>
    </tr>
    <tr>
      <td>Province</td>
      <td>:</td>
      <td><label>
      <select name="province" id="province">
        <?php
		$c=mysql_query("select * from province");
		while($dt=mysql_fetch_array($c)){
		echo "<option value=\"$dt[1]\">$dt[1]</option>";
		}
		?>
            </select>
      </label></td>
    </tr>
    <tr>
      <td>City</td>
      <td>:</td>
      <td><input name="city" type="text" id="city" value="<?php echo $city; ?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td>:</td>
      <td><textarea name="address" id="address"><?php echo $address; ?></textarea></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td>:</td>
      <td><input name="phone" type="text" id="phone" value="<?php echo $phone; ?>" /></td>
    </tr>
    <tr>
      <td>Gelar</td>
      <td>:</td>
      <td><label>
        <select name="gelar" id="gelar">
          <option value="SA">SA</option>
          <option value="SI">SI</option>
          <option value="SE">SE</option>
          <option value="D3">D3</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Description</td>
      <td>:</td>
      <td><textarea name="description" id="description"><?php echo $description; ?></textarea></td>
    </tr>
    <tr>
      <td>Foto</td>
      <td>:</td>
      <td><label>
        <input name="filefoto" type="file" id="filefoto" />
      </label></td>
    </tr>
    <tr>
      <td>Username</td>
      <td>:</td>
      <td><label>
        <input name="username" type="text" id="username" value="<?php echo $username; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input name="password" type="password" id="password" /></td>
    </tr>

    <tr>
      <td colspan="3"><input name="tambah" type="submit" id="tambah" value="Tambahkan" /></td>
    </tr>
  </table>
  <label></label>
</form>
</body>
</html>
<?php } ?>