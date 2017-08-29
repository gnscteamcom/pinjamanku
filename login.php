<?php
session_start();
error_reporting(0);
include 'admin/config/koneksi.php';
//if ($_SESSION['member']);
if ($_SESSION['login']);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>pinjamanku</title>
    <link rel="stylesheet" href="admin/css/style.css" type="text/css">
    <link rel="stylesheet" href="admin/css/main.css" type="text/css">
    <script type="text/javascript" src="admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="admin/js/jquery.cycle2.min.js"></script>
    <script type="text/javascript" src="admin/js/parallax.js"></script>
    <script type="text/javascript" src="admin/js/parallax.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
    function logout(){
      tanya = confirm("Are You Sure For Logout ?")
      if (tanya != "0"){
        top.location = "logout.php"}
    };
  </script>
  </head>

<body>
  <div id="utama">
    <div id="header">
      <a href="http://localhost/pinjamanku/">
        <div id="logo">
          <img src="admin/image/download.png" width="60" height="60" alt="logo" longdesc="http://localhost/pinjamanku/">
        </div>
        <div id="situs">pinjamanku</div>
      </a>
    </div>



    <div id="kiri">
      <div id="login">
      <center><h1>Daftar ke Pinjamanku</h1><br>
      <p style="font-size:13px;">Belum memiliki akun Pinjamanku? <a href="http://localhost/pinjamanku/register.php">Silakan Anda daftar sekarang</a></p></center><br><br>
      <h3>Keuntungan Menggunakan Pinjamanku</h3><br>

      <img src="admin/image/security_icon.png" width="50" height="50" style= "float:left; margin-right:10px;" alt="">
      <p><h5>Keamanan Terjamin</h5></p>
      <p style= "text-align:justify; margin-top:12px; font-size:13px;">
      Proses pengajuan dilakukan melalui sistem keamanan yang terintegrasi dengan data nasabah</p></br></br>


      <img src="admin/image/proses.png" width="50" height="50" style= "float:left; margin-right:10px;" alt="">
      <p><h5>Proses Cepat</h5></p>
      <p style= "text-align:justify; margin-top:12px; font-size:13px;">
      Data nasabah yang dikumpulkan secara online akan dikirimkan ke bank maksimal 3 hari setelah disetujui</p></br></br>


      <img src="admin/image/like.png" width="50" height="50" style= "float:left; margin-right:10px;" alt="">
      <p><h5>Status Aplikasi Terjamin</h5></p>
      <p style= "text-align:justify; margin-top:12px; font-size:13px;">
      Nasabah dapat memantau status aplikasi yang diajukan dengan cepat secara online kapan dan di mana saja</p></br></br>


      <img src="admin/image/syarat.png" width="50" height="50" style= "float:left; margin-right:10px;" alt="">
      <p><h5>Syarat mudah dipenuhi</h5></p>
      <p style= "text-align:justify; margin-top:12px; font-size:13px;">
      Persyaratan pengajuan produk keuangan yang ringan dan sesuai dengan kondisi keuangan nasabah</p></br></br><br>
      </div>
    </div>





    <div id="kanan">
      <div id="sidebar-login">
          <h3 style="margin-left: 8px; margin-top: 8px;">Masuk dengan Akun Anda</h3><br>

         <?php if (isset($_GET['er'])) { ?>
          <div class="error">
              <p style="margin-left: 8px;">Email atau password anda salah</p>
          </div>
          <?php } elseif (isset($_GET['db'])) { ?>
            <div class="error">
              <p style="margin-left: 8px;">Email anda sudah terdaftar</p>
            </div>
            <?php } ?>
        <br>
        <form method="post" action="cek_login.php">
          <div>
           <input type="text" name="email" placeholder="Email">
          </div>

          <div style="margin-top: 10px;">
            <input type="password" name="pass" placeholder="Password">
          </div>
          <p style="margin-left: 8px; font-size: 12px;"> <a style="color: #496975;" href="http://localhost/pinjamanku/lupa_pass.php?act=lupa_pass&email=0">Lupa kata sandi?</a></p>
          <div style="margin-top: 10px;">
            <input type="submit" name="submit" value="Masuk" class="btn">
            <span style="margin-left: 120px;"></span>
          </div>
        </form>
    </div>
    </div>


</div>

<?php include 'footer.php';?>
