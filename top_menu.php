<?php
session_start();
//error_reporting(0);
include "admin/config/koneksi.php";
?>

<ul id="top-menu">
    <li>
        <?php
            if(@$_SESSION['login']){
                $user = @$_SESSION['login'];
            }

        $sql_user = $db->query("SELECT * FROM anggota WHERE id_anggota") or die (mysql_error());
        $data_user = $sql_user->fetch_array();
        ?>
    </li>

    <li>
      <?php
     if (isset($_SESSION['login'])) {
      if ($_SESSION['login'] == 1) {
        ?>
          <a href="logout.php">Keluar</a>          
        <?php
      }
    } else {
      ?>
      <a href="login.php">Masuk</a>
      <?php } ?>
    </li>
    <?php if ($_SESSION['login'] == 1) { ?>
    <li>
        <?php echo $_SESSION['nm_depan'] ?>
    </li>
    <?php } ?>

</ul>
