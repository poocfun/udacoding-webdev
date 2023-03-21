<?php
  require 'koneksi.php';
  $id = $_GET ['id'];

  $sql = mysqli_query ($koneksi, "DELETE FROM users WHERE id = '$id' ");

  if ($sql) {
    ?>
    <script type="text/javascript">
    alert ('Data Berhasil Dihapus');
    window.location = 'halaman.php?halaman=siswa';
    </script>
    <?php
  }
 ?>
