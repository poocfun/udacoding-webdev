<?php
if(!isset($_SESSION['level']))
 {
?>
<script type="text/javascript">
alert('Anda Belum Login');
window.location="index.php";
</script>
<?php
} if ($_SESSION['level']!="admin") {
  ?>
  <script type="text/javascript">
  alert('Anda Bukan Admin!');
  window.location="index.php";
  </script>
  <?php
}
 ?>

<h2>Hallo <?= $_SESSION['level'] ?></h2>