<?php
if($access!="masuk") die('invalid access');
if($_GET['act']=='del'){
$id=$_GET['id'];
$del=mysql_query("delete * from cart where id='$id'");
if(!$del){ echo "data gagal hapus"; }
}
if($_SESSION['loginas']!=1){
main::invalid('Document Not Found');
}else{
//masukkan kedalam cart
if(!empty($_POST[id_jurnal])){
$id_jurnal=mysql_escape_string($_POST[id_jurnal]);
$random=main::coding(15);
$q1=mysql_query("insert into cart (id,id_member,id_jurnal) values ('$random','$_SESSION[user_id]','$id_jurnal')");
}
if($q1){
echo "<center>Berhasil Menambahkan Jurnal Kedalam Cart</center>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=cartmember'; />";
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" id="t">
  <tr valign="bottom">
    <td width="11%"><img src="images/cart.png" width="80" height="40" /></td>
    <td colspan="2">Cart Member (<?php $x=mysql_query("select * from cart where id_member='$_SESSION[user_id]'"); echo mysql_num_rows($x); ?> ) </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="14%">Member Name </td>
    <td width="75%"><?php $m=mysql_fetch_array(mysql_query("select * from member where id='$_SESSION[user_id]'")); echo "$m[fname] $m[lname]"; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Address</td>
    <td><?php echo "$m[address]"; ?></td>
  </tr>
</table>
<br />
<br />
<form id="form1" name="form1" method="post" action="index.php?p=transaksimember">
  <table width="100%" border="0" id="t">
    <tr bgcolor="#996633">
      <td>No</td>
      <td>Jurnal Description </td>
      <td>Harga</td>
      <td>Delete</td>
    </tr>
	<?php
	$no=0;
	 $cart=mysql_query("select * from cart where id_member='$_SESSION[user_id]'"); while($data=mysql_fetch_array($cart)){
	 $jurnal=mysql_fetch_array(mysql_query("select * from jurnal where id='$data[id_jurnal]'"));
	 $author=mysql_fetch_array(mysql_query("select * from author where id='$jurnal[author]'"));
	 $no++;
	?>
    <tr <?php if($no%2==0) echo 'bgcolor="#aa7f00"'; ?>>
      <td><?php echo $no; ?></td>
      <td><?php echo "Judul : $jurnal[judul] <br> Category : $data[category] <br> Author : $author[fname] $author[lname]"; ?><input type="hidden" name="id_jurnal[]" id="id_jurnal[]" value="<?php echo $jurnal[0]; ?>" /></td>
      <td><?php echo "Rp".number_format($jurnal[harga]); $total=$total+$jurnal[harga]; ?></td>
      <td><a href="javascript:void(0);" onclick="var agree=confirm('Are You SuRe Delete?'); if(agree){ window.location='index.php?p=cartmember&act=del&id=<?php echo $data[0];?>'; } return false;">[Delete]</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="right">Total Harga </div></td>
      <td><?php echo $total; ?><input type="hidden" name="total" value="<?php echo $total; ?>" /></td>
      <td>&nbsp;</td>
    </tr><?php } ?>
  </table>
  <br />
  <table width="100%" border="0">
    <tr>
      <td width="6%"><img src="images/cart.png" width="40" height="20" /></td>
      <td width="94%"><a href="index.php?p=help">Help&gt;&gt;Untuk Baca Peraturan Transaksi </a></td>
    </tr>
  </table>
  <br />
  <label>
  <input type="button" value="Edit Akun Saya" onclick="window.location='index.php?p=editmember&id=<?php echo $_SESSION['user_id'] ?>'" />
  </label>
  <label>
  <input type="submit" name="submit" value="Akun Saya Benar, Lakukan Transaksi" onclick="return confirm('Anda Ingin Melakukan Transaksi?')" />
  </label>
</form>

<p>&nbsp;</p>
</body>
</html>
<?php } } ?>