<?php
if($access!="masuk") die('invalid access');
if(!($_SESSION['loginas']==9 or $_SESSION['loginas']==2)){
main::invalid("Document Not Found");
}else{
if($_SESSION['loginas']==2)
$id=$_SESSION['user_id'];
$query=mysql_fetch_array(mysql_query("select * from author where id='$id'"));
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
      <td width="36%"><img src="file/foto/<?php echo $query['photo']; ?>" width="190" align="left" /></td>
      <td width="64%"><table width="100%" border="0">
        <tr>
          <td colspan="3">Detail Account Author </td>
        </tr>
        <tr>
          <td width="25%">First Name </td>
          <td width="1%">:</td>
          <td width="74%"><label><?php echo $query['fname']; ?></label></td>
        </tr>
        <tr>
          <td>Last Name </td>
          <td>:</td>
          <td><?php echo $query['lname']; ?></td>
        </tr>
        <tr>
          <td>Province</td>
          <td>:</td>
          <td><label><?php echo $query['province']; ?></label></td>
        </tr>
        <tr>
          <td>City</td>
          <td>:</td>
          <td><?php echo $query['city']; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td>:</td>
          <td><?php echo $query['address']; ?></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td>:</td>
          <td><?php echo $query['phone']; ?></td>
        </tr>
        <tr>
          <td>Gelar</td>
          <td>:</td>
          <td><label><?php echo $query['gelar']; ?></label></td>
        </tr>
        <tr>
          <td>Description</td>
          <td>:</td>
          <td><?php echo $query['description']; ?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td>:</td>
          <td><label><?php echo $query['username']; ?></label></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td>***********</td>
        </tr>
      </table></td>
    </tr>
  </table>
  <label></label>
</form>
</body>
</html>
<?php } ?>