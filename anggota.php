<?php
error_reporting(0);
session_start();
include 'admin/config/koneksi.php';

if ($_SESSION['member']);

if ($_SESSION['login'] != 1) {
  header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>koperasionline.com</title>
    <link rel="stylesheet" href="admin/css/style.css" type="text/css">
    <link rel="stylesheet" href="admin/css/main.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script type="text/javascript" src="admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="admin/js/jquery.cycle2.min.js"></script>
  </head>

<body>
  <div id="utama">
    <div id="top">
      <div id="top-menu">
        <?php include 'top_menu.php';?>
      </div>
    </div>

    <div id="header">
      <a href="http://localhost/koperasionline.com/">
        <div id="logo">
          <img src="admin/image/logo_koperasi.png" width="60" height="60" alt="logo" longdesc="http://localhost/koperasionline.com/">
        </div>
        <div id="situs">Koperasionline.com</div>
      </a>
    </div>

    <div id="menu">
      <?php include 'menu1.php';?>
    </div>




    <div class="single-ajukan">

      <h1>Data Anda</h1><br/>
              <div class="tabel">
                <table>
                      <tr style="background-color: #878787">
                        <td>No</td>
                        <td>Nama Lengkap</td>
                        <td>Jumlah Pinjaman</td>
                        <td>Tenor</td>
                      </tr>

                    <?php

                    if (isset($_SESSION['member'])) {
                     if ($_SESSION['member'] !== 1) {
                       header('location: index.php');
                     }
                   }
                    if (@$_SESSION['member']) {
                       $member = @$_SESSION['member'];
                    }else if (@$_SESSION['user']) {
                       $member = @$_SESSION['user'];
                    }

                    $no = 1;
                    $pinjaman = $db->query("SELECT * FROM pinjaman ORDER BY id_member LIMIT 1");
                    while($p = $pinjaman->fetch_array()){
                    ?>
                    <tr style="background-color: #DEDEDE" >
                        <td><?php echo $no ?></td>
                        <td><?php echo $p['nm_depan']?>
                        <?php echo $p['nm_blkng']?></td>
                        <td><?php echo $p['jml_pnjm']?></td>
                        <td><?php echo $p['tenor']?></td>
                    </tr>
                    <?php
                    $no++;
                    } ?>
                </table><br/><br/>
              </div>

    </div>



<?php include 'footer.php';?>
