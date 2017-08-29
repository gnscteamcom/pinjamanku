    <?php
      session_start();
      include 'admin/config/koneksi.php';

      session_destroy();
      unset($_SESSION['Member']);
      unset($_SESSION['Anggota']);
      header('location: index.php');
      ?>
