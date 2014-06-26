<?php
if ($access != "masuk") die ('invalid access');
if($_SESSION['loginas']!=1){
main::invalid("Document Not Found");
}else{
//masukaan transaksi
if($_POST[submit]){
if(!empty($_POST[total])){
$total=mysql_escape_string($_POST[total]);
$kode_transaksi="ORDER".strtoupper(main::coding(10));
$random=main::coding(15);
$q=mysql_query("insert into transaksi (id,kode_transaksi,id_member,tanggal,status,total) values ('$random','$kode_transaksi','$_SESSION[user_id]','$tanggal','ORDER','$total')");
//transaksi detail
for($i=0;$i<count($_POST[id_jurnal]);$i++){
$id_jurnal=mysql_escape_string($_POST[id_jurnal][$i]);
$q2=mysql_query("insert into transaksi_detail (kode_transaksi,id_member,id_jurnal) values('$kode_transaksi','$_SESSION[user_id]','$id_jurnal')");
}
//hapus cart
$q3=mysql_query("delete  from cart where id_member='$_SESSION[user_id]'");
$valid=true;
}
}
if($valid==true){
echo "<center><font color=\"green\">*) Berhasil Melakukan Transaksi Belanja</font></center>";
echo "<meta http-equiv='refresh'; content='2; url=index.php?p=transaksimember'; />";
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0">
  <tr valign="bottom">
    <td width="25%"><img src="images/cart.png" alt="s" width="92" height="50" /></td>
    <td width="75%">Daftar Belanja Anda      </td>
  </tr>
  <tr>
    <td>Member Name </td>
    <td><?php $m=mysql_fetch_array(mysql_query("select * from member where id='$_SESSION[user_id]'")); echo "$m[fname] $m[lname]"; ?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo "$m[address]"; ?></td>
  </tr>
</table>
<br />
Lihat Detail Jika Ingin Mendownload File&gt;&gt;Pastikan Anda Sudah Melakukan Pembayaran Via Rekening. <br />
<br />
<table width="100%" border="0" id="t">
  <tr bgcolor="#996633">
    <td>No</td>
    <td>Kode Transaksi </td>
    <td>Total Transaksi </td>
    <td>Tanggal</td>
    <td>Status</td>
    <td>File</td>
  </tr>
  <?php
  $no=0;
  $transaksi=mysql_query("select * from transaksi where id_member='$_SESSION[user_id]'");
  while($data=mysql_fetch_array($transaksi)){
  $no++;
  ?>
  <tr <?php if($no%2==0) echo 'bgcolor="#aa7f00"'; ?>>
    <td><?php echo $no; ?></td>
    <td><?php echo $data['kode_transaksi']; ?></td>
    <td><?php echo $data['total']; ?></td>
    <td><?php echo $data['tanggal']; ?></td>
    <td><?php echo $data['status']; ?></td>
    <td><a href="index.php?p=detailtransaksi&id=<?php echo $data[0]; ?>">[Detail]</a></td>
  </tr><?php } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php } } ?>