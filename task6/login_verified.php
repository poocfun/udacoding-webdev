<?php
require 'koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['nis'] = $user['nis'];
            $_SESSION['nama'] = $user["nama"];
            $_SESSION['level'] = $user['level'];

            // Mengarahkan pengguna ke halaman dashboard atau home sesuai dengan level pengguna
            if ($user['level'] == 'admin') {
                header('Location: halaman.php?halaman=dashboard');
            } elseif ($user['level'] == 'siswa') {
                header('Location: halaman.php?halaman=home');
            }
            exit();
        } else{
    ?>
    <script type="text/javascript">
    alert('email atau Password tidak ditemukan!');
    window.location="index.php";
    </script>
    <?php
  }
 ?>
