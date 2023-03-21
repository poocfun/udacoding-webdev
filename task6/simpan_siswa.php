<?php
require 'koneksi.php';

$nis=$_POST['nis'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$password = md5($_POST ['password']);
$tlp = $_POST['tlp'];
$alamat=$_POST['alamat'];


// $sql=mysqli_query($koneksi, "insert into users values('$nim', '$nama', '$email', '$password', '$telp', 'user', '')");

$sql = mysqli_query($koneksi, "INSERT INTO users (nama, email, password, nis, alamat, tlp, level, entry) VALUES ('$nama', '$email', '$password', '$nis', '$alamat', '$tlp', 'siswa', '')");
if ($sql)
{
  ?>
  <script type="text/javascript">
  alert('Data berhasil disimpan silahkan login');
  window.location="index.php";
  </script>
  <?php
}
?>
