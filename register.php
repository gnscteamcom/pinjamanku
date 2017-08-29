<?php
session_start();
error_reporting(0);
include 'admin/config/koneksi.php';
// if ($_SESSION['member'] || $_SESSION['user']);
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
    <script src="admin/assets/js/register.js"></script>
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
    <div id="top">
      <div id="top-menu">
        <?php include 'top_menu.php';?>
      </div>
    </div>

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
          <center><h1>Masuk ke Pinjamanku</h1><br>
          <p style="font-size:13px;">Sudah memiliki akun Pinjamanku? Silakan Anda masuk <a href="http://localhost/pinjamanku/login.php">di sini</a></p></center><br><br>
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
  Persyaratan pengajuan produk keuangan yang ringan dan sesuai dengan kondisi keuangan nasabah</p></br></br>
  </div>
  </div>

  <?php
  include "admin/config/koneksi.php";
  if (@$_POST['register']) {
    $nm_depan     = @$_POST['nm_depan'];
    $nm_blkg      = @$_POST['nm_blkg'];
    $email        = @$_POST['email'];
    $no_telp      = @$_POST['no_telp'];
    $no_telp_lain = @$_POST['no_telp_lain'];
    $provinsi     = @$_POST['provinsi'];
    $kota         = @$_POST['kota'];
    $alamat       = @$_POST['alamat'];
    $jenis_kel    = @$_POST['jenis_kel'];
    $pass         = @$_POST['pass'];
	
	

if ( $nm_depan == '' || $nm_blkg  == '' || $email == '' || $no_telp == '' || $no_telp_lain == '' || $provinsi == '' || $kota == '' || $alamat == '' || $jenis_kel == '' || $pass == '' ) {
      ?> <script type=text/javascript>alert('Inputan Tidak Boleh Ada Kosong');</script> <?php
    } else {
      $sql_insert = $db->query("INSERT INTO anggota VALUES ('', '$nm_depan', '$nm_blkg', '$email', '$no_telp', '$no_telp_lain', '$provinsi', '$kota', '$alamat', '$jenis_kel', md5('$pass'))") or die (mysql_error());
      if($sql_insert){
        ?> <script type=text/javascript>alert('Register Berhasil, Silahkan Masuk');window.location.href='login.php';</script> <?php
      }
    }
  }
  ?>


    <div id="kanan">
      <div id="sidebar-login">
        <h3 style="margin-left: 8px; margin-top: 8px;">Daftar Akun Anda Sekarang</h3><br>

        <form class="" name="registration" action="" method="post">
          <div>
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Nama Depan</p>
            <input type="text" name="nm_depan" placeholder="Nama Depan" onblur="nm_depan_validation(2,12)">
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validNama'></span>
          </div>

          <div style="margin-top: 10px;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Nama Belakang</p>
            <input type="text" name="nm_blkg" placeholder="Nama Belakang" onblur="nm_blkng_validation(2,12)">
          </div>

          <div style="margin-top: 10px;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Alamat Email</p>
            <input type="text" name="email" id="email" placeholder="Email" onblur="ValidateEmail()">
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validEmail'></span>
          </div>

          <div style="margin-top: 10px;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Nomor Telepon</p>
            <input type="text" name="no_telp" id="no_telp" placeholder="contoh: 081xxxxxxxxx" onblur="NoTelp()">
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validNo_telp'></span>
          </div>

          <div style="margin-top: 10px;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Nomor Telepon Lain yang Dapat Dihubungi dan Tidak Serumah</p>
            <input type="text" name="no_telp_lain" placeholder="contoh: 081xxxxxxxxx" onblur="NoTelpLain()">
          </div>

          <div style="margin-top: 10px; width: 100%;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Provinsi Tinggal</p>
            <select name="provinsi">
              <option value=""> -- Silahkan Pilih -- </option>
              <option value="Aceh">Aceh</option>
              <option value="Bali">Bali</option>
              <option value="Banten">Banten</option>
              <option value="Bengkulu">Bengkulu</option>
              <option value="DI Yogyakarta">DI Yogyakarta</option>
              <option value="DKI Jakarta">DKI Jakarta</option>
              <option value="Gorontalo">Gorontalo</option>
              <option value="Jambi">Jambi</option>
              <option value="Jawa Barat">Jawa Barat</option>
              <option value="Jawa Tengah">Jawa Tengah</option>
              <option value="Jawa Timur">Jawa Timur</option>
              <option value="Kalimantan Barat">Kalimantan Barat</option>
              <option value="Kalimantan Selatan">Kalimantan Selatan</option>
              <option value="Kalimantan Tengah">Kalimantan Selatan</option>
              <option value="Kalimantan Timur">Kalimantan Timur</option>
              <option value="Kalimantan Utara">Kalimantan Utara</option>
              <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
              <option value="Kepulauan Riau">Kepulauan Riau</option>
              <option value="Lampung">Lampung</option>
              <option value="Maluku">Maluku</option>
              <option value="Maluku Utara">Maluku Utara</option>
              <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
              <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
              <option value="Papua">Papua</option>
              <option value="Papua Barat">Papua Barat</option>
              <option value="Riau">Riau</option>
              <option value="Sulawesi Barat">Sulawesi Barat</option>
              <option value="Sulawesi Selatan">Sulawesi Selatan</option>
              <option value="Sulawesi Tengah">Sulawesi Tengah</option>
              <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
              <option value="Sulawesi Utara">Sulawesi Utara</option>
              <option value="Sumatera Barat">Sumatera Barat</option>
              <option value="Sumatera Selatan">Sumatera Selatan</option>
              <option value="Sumatera Utara">Sumatera Utara</option>
            </select>
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validProvinsi'></span>
          </div>
          <div style="margin-top: 10px;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Kabupaten/Kota</p>
            <input type="text" name="kota" placeholder="Kabupaten/Kota">
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validKota'></span>
          </div>

          <div style="margin-top: 10px;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Alamat Nama Jalan</p>
            <textarea name="alamat" rows="3" cols="80" placeholder="Contoh: Perumahan Griya Mandala, Jl. Kehormatan Blok A No.19 Rt.002 Rw.08, Duri Kepa, Kebon Jeruk, Jakarta Barat, Indonesia, 11510" onblur="alamat()"></textarea>
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validAlamat'></span>
          </div>

          <div style="margin-top: 10px; width: 100%;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Jenis Kelamin</p>
            <select name="jenis_kel">
              <option value=""> -- Silahkan Pilih -- </option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validJk'></span>
          </div>

          <div style="margin-top: 10px;">
            <p style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;">Kata Sandi</p>
            <input type="password" name="pass" placeholder="Kata Sandi" onblur="passid_validation(7,12)">
            <span style="margin-left: 8px; margin-bottom: 5px; font-size: 13px;" id='validPass'></span>
          </div>

          <div style="margin-top: 10px;">
            <!-- <button class="btn" onclick="execute()">Daftar Akun</button> -->
            <input type="submit" name="register" value="Daftar Akun" class="btn">
          </div>
        </form>
      </div>
    </div>

  </div>

  </div>

<?php include 'footer.php';?>
