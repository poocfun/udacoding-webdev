<?php
require 'koneksi.php';

$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$email = $_POST['email'];
$tlp = $_POST['tlp'];
$level = $_POST['level'];
$alamat = $_POST['alamat'];

$sql = mysqli_query($koneksi, "update users set nis = '$nis',
nama = '$nama', email = '$email', password = '$password', tlp = '$tlp', alamat = '$alamat', level = '$level' where id = '$id' ");

if ($sql) {
 ?>
 <script type="text/javascript">
   alert ('Data Berhasil Diubah');
   window.location = 'halaman.php?halaman=siswa';
 </script>
 <?php
}
?>
