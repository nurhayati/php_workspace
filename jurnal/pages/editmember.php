<?php
if($access!="masuk") die('invalid access');
if(!($_SESSION['loginas']==9 or $_SESSION['loginas']==2)){
main::invalid("Document Not Found");
}else{
if($_SESSION['loginas']==2)
$id=$_SESSION['user_id'];
$query=mysql_fetch_array(mysql_query("select * from member where id='$id'"));
if($_POST[tambah]){
if(!empty($fname) and  !empty($lname) and  !empty($province) and !empty($city) and !empty($address) and  !empty($phone) and !empty($description)  and !empty($username)){
if(!empty($password) and !empty($filefoto)){
if(file_exists("file/foto/".$filefoto))
$filefoto=main::coding(5).$filefoto;
if(move_uploaded_file("$tmp_foto","file/foto/".$filefoto)){
$random=main::coding(15);
$password=md5($password);
$add=mysql_query("UPDATE `member` set `fname`='$fname', `lname`='$lname', `province`='$province', `city`='$city', `address`='$address', `phone`='$phone', `description`='$description', `photo`='$filefoto', `username`='$username', `password`='$password' where id='$id'");
}else{
echo "max upload 1mb";
}
}else{
$add=mysql_query("UPDATE `member` set `fname`='$fname', `lname`='$lname', `province`='$province', `city`='$city', `address`='$address', `phone`='$phone', `description`='$description', `username`='$username' where id='$id'");
}
if($add){
if($_SESSION['loginas']==9){
echo "<center><font color=\"green\">*) Berhasil Update Data member </center></font>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=adminmember'; />";
}else{
echo "<center><font color=\"green\">*) Anda Berhasil Mengupdate Account</center></font>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=detailmember'; />";
}
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
      <td colspan="3">Tambahkan member Baru </td>
    </tr>
    <tr>
      <td width="19%">First Name </td>
      <td width="1%">:</td>
      <td width="80%"><label>
        <input name="fname" type="text" id="fname" value="<?php echo $query['fname']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Last Name </td>
      <td>:</td>
      <td><input name="lname" type="text" id="lname" value="<?php echo $query['lname']; ?>" /></td>
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
      <td><input name="city" type="text" id="city" value="<?php echo $query['city']; ?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td>:</td>
      <td><textarea name="address" id="address"><?php echo $query['address']; ?></textarea></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td>:</td>
      <td><input name="phone" type="text" id="phone" value="<?php echo $query['phone']; ?>" /></td>
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
      <td><textarea name="description" id="description"><?php echo $query['description']; ?></textarea></td>
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
        <input name="username" type="text" id="username" value="<?php echo $query['username']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input name="password" type="password" id="password" value="<?php echo $query['password']; ?>" /></td>
    </tr>

    <tr>
      <td colspan="3"><input name="tambah" type="submit" id="tambah" value="Update Now" /></td>
    </tr>
  </table>
  <label></label>
</form>
</body>
</html>
<?php } ?>