<?php
require 'koneksi.php';

$nis=$_POST['nis'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$password = md5($_POST ['password']);
$tlp = $_POST['tlp'];
$alamat=$_POST['alamat'];
$level=$_POST['level'];
$entry=$_POST['entry'];


// $sql=mysqli_query($koneksi, "insert into users values('$nim', '$nama', '$email', '$password', '$telp', 'user', '')");

$sql = mysqli_query($koneksi, "INSERT INTO users (nama, email, password, nis, alamat, tlp, level, entry) VALUES ('$nama', '$email', '$password', '$nis', '$alamat', '$tlp', '$level', '$entry')");
if ($sql)
{
  ?>
  <script type="text/javascript">
  alert('Data berhasil disimpan ');   
  window.location="halaman.php?halaman=siswa";
  </script>
  <?php
}
?>
