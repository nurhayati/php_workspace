<?php
if($access!="masuk") die('invalid access');
if($_GET['act']=='del'){
$id=$_GET[id];
$del=mysql_query("delete from author where id='$id'");
if(!$del){ echo "Data gagal hapus"; }
}
if($_SESSION['loginas']!=9){
main::invalid("Document NoT fOUND");
}else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<label>
<input type="submit" name="Submit" value="ADD NEW AUTHOR" onclick="window.location='index.php?p=addauthor'" />
</label>
<br />
<br />
<table width="100%" border="0" id="t">
  <tr bgcolor="#996633">
    <td>No</td>
    <td>author Name </td>
    <td>Tools</td>
  </tr>
  <?php
  $no=0;
  $query=mysql_query("select * from author order by id desc");
  while($data=mysql_fetch_array($query)){
  $no++;
  ?>
  <tr <?php if($no%2==0) echo 'bgcolor="#aa7f00"'; ?>>
    <td><?php echo $no; ?></td>
    <td><?php echo "$data[fname] $data[lname]"; ?></td>
    <td><a href="index.php?p=detailauthor&id=<?php echo $data[0]; ?>">[V]</a> | <a href="index.php?p=editauthor&id=<?php echo $data[0]; ?>">[E]</a> | <a href="javascript:void(0);" onclick="var agree=confirm('Are You Sure Delete?'); if(agree){ window.location='index.php?p=adminauthor&act=del&id=<?php echo $data[0];?>'; } return false;">[D]</a></td>
  </tr><?php } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php } ?>