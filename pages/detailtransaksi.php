<?php
if ($access != "masuk") die ('invalid access');
if(!($_SESSION['loginas']==1 or $_SESSION['loginas']==9)){
main::invalid("Document Not Found");
}else{
$rrr=mysql_fetch_array(mysql_query("select * from transaksi where id='$id'"));
$rr=mysql_fetch_array(mysql_query("select * from member where id='$_SESSION[user_id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 36px}
-->
</style>
</head>

<body>
<table width="100%" border="0">
  <tr valign="bottom">
    <td width="16%"><img src="images/cart.png" width="80" height="40" /></td>
    <td colspan="2"><span class="style2"><a href="#">Detail Transaksi </a></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="22%">Member Name </td>
    <td width="62%"><?php echo $rr['fname']."".$rr['lname']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Address </td>
    <td><?php echo $rr['address']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode Transaksi </td>
    <td><?php echo $rrr['kode_transaksi']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Status</td>
    <td><?php echo $rrr['status']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal</td>
    <td><?php echo $rrr['tanggal']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" id="t">
  <tr bgcolor="#996633">
    <td>No</td>
    <td>Jurnal Description </td>
    <td>Harga</td>
    <td>File</td>
  </tr>
  <?php
  $no=0; 
  $d=mysql_query("select * from transaksi_detail where id_member='$_SESSION[user_id]'");
  while($data=mysql_fetch_array($d)){
  $jurnal=mysql_fetch_array(mysql_query("select * from jurnal where id='$data[id_jurnal]'"));
  $author=mysql_fetch_array(mysql_query("select * from author where id='$_SESSION[user_id]'"));
  $no++;
  ?>
  <tr <?php if($no%2==0) echo 'bgcolor="#aa7f00"'; ?>>
    <td><?php echo $no; ?></td>
    <td><?php echo "Judul : $jurnal[judul] <br> Category : $jurnal[category] <br> Author  : $author[fname] $author[lname]"; ?></td>
    <td><?php echo "Rp".number_format($jurnal[harga]); $total=$total+$jurnal[harga]; ?></td>
    <td>
	<?php
	echo "<input type='button' value='Download This Materi'";
	if($rrr[status]=="FREE") echo "onclick=\"window.location='file/jurnal/$jurnal[file]'\""; else echo "onclick=\"alert('Anda Belum Melakukan Transaksi Via Rekening')\""; echo ">";
	?>
	
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right">Total Harga </div></td>
    <td><?php echo $total; ?></td>
    <td>&nbsp;</td>
  </tr><?php } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php } ?>
