<?php
if($access!="masuk") die('invalid access');
if($_SESSION['loginas']!=9){
main::invalid('Document Not Found');
}else{
$update=mysql_query("update transaksi set status='FREE' where id='$id'");
if($update){
echo "<center><font color=\"green\">*) Berhasil Update Status</center></font>";
echo "<meta http-equiv='refresh' content='2; url=index.php?p=admintransaksi'; />";
}else{
echo mysql_error();
}
}
?>