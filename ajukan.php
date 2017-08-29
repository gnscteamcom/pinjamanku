<?php
 error_reporting(0);
session_start();
include 'admin/config/koneksi.php';

?>
<?php if($_SESSION['login'] == 1){ ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>pinjamanku</title>
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
          <img src="admin/image/download.png" width="60" height="60" alt="logo" longdesc="http://localhost/pinjamanku/">
        </div>
        <div id="situs">pinjamanku</div>
      </a>
    </div>

    <div id="menu">
      <?php include 'menu1.php';?>
    </div>


    <div class="single-produk">
      <center>
      <table border=0px cellpadding='10'>
          <?php
          $produk = $db->query("SELECT * FROM agunan LIMIT 8");
          $jml_kolom=3;
          $cnt = 0;
          while ($p = $produk->fetch_array()) {
            if ($cnt >= $jml_kolom){

                $cnt = 0;
          }$cnt++;
          ?>

          <td align=center>
          <div>
              <a href="single.php?id=<?php echo $p['jenis'] ?>">

              <img style="margin-left:67%;" width='40px' height='40px' src="admin/image/<?php echo $p['gambar'] ?>">

              <div style="margin-left:68%; margin-bottom:5%;">
                  <?php echo $p['jenis'] ?></a>
              </div>
              </a>
            <?php { ?>
      		  <?php } ?>
          </div>
        </td>
          <?php } ?>

      </table>
    </center>
    </div>


    <div class="single-ajukan1">
          <h3 style="margin-left: 8px; margin-top: 8px;">Pinjaman Multiguna</h3><br>
          <img src="admin/image/logo.png" width="200" height="200" alt="">
    </div>

    <?php
    include "admin/config/koneksi.php";

    if (@$_POST['ajukan']) {
      $id_agt      = $_SESSION['id_anggota'];//@$_POST['id_agt'];
      $jml_pnj     = @$_POST['jml_pnj'];
      $agunan      = @$_POST['agunan'];
      $tenor       = @$_POST['tenor'];
      $tipe_pek    = @$_POST['tipe_pek'];
      $thn_bek     = @$_POST['thn_bek'];
      $stts_pek    = @$_POST['stts_pek'];
      $penghasilan = @$_POST['penghasilan'];
      $waktu       = gmdate("Y-m-d H:i:s", time()+60*60*7);

    if ($id_agt == '' || $jml_pnj == '' || $agunan  == '' || $tenor  == '' || $tipe_pek == '' || $thn_bek == '' || $stts_pek == '' || $penghasilan == '') {
        ?> <script type=text/javascript>alert('Inputan Tidak Boleh Ada Kosong');</script> <?php
      } else {
        $sql_insert = $db->query("INSERT INTO pinjaman VALUES ('', '$id_agt', '$jml_pnj', '$agunan', '$tenor', '$tipe_pek', '$thn_bek', '$stts_pek', '$penghasilan', '$waktu')") or die (mysql_error());
        if($sql_insert){
          ?> <script type=text/javascript>alert('Pengajuan Terkirim, Anda akan segera kami konfirmasi');</script> <?php
        }
      }
    }
    ?>

    <div class="single-ajukan">
          <h3 style="margin-top: 8px;">Form Pengajuan Pinjaman</h3><br>

          <?php
          function buatrp($angka){
            $jadi ="Rp. " .number_format($angka,0,',','.');
            return $jadi;
          }
          ?>

          <form method="post" action="" enctype="multipart/form-data">
            <div style="margin-top: 10px;">
              <p style="font-size: 20px;">Pinjaman</p>
            </div>

              <?php
              if ($_SESSION['member']){
                $user = $_SESSION['member'];
                }

                $anggota= $db->query("SELECT id_anggota FROM anggota");
                $user = $anggota->fetch_array();
                ?>
            <div style="margin-top: 10px;">
              <input type="hidden" name="id_agt" value="<?php echo $user['id_anggota']; ?>">
            </div>


            <div style="margin-top: 10px;">
              <p style="margin-bottom: 5px; font-size: 13px;">Jumlah Pinjaman</p>

              <select name="jml_pnj">
                <option value="">-Pilih-</option>
                <option value="3000000"><?php echo buatrp(3000000);?></option>
                <option value="5000000"><?php echo buatrp(5000000);?></option>
                <option value="10000000"><?php echo buatrp(10000000);?></option>
                <option value="15000000"><?php echo buatrp(15000000);?></option>
                <option value="20000000"><?php echo buatrp(20000000);?></option>
                <option value="25000000"><?php echo buatrp(25000000);?></option>
                <option value="30000000"><?php echo buatrp(30000000);?></option>
                <option value="35000000"><?php echo buatrp(35000000);?></option>
                <option value="40000000"><?php echo buatrp(40000000);?></option>
                <option value="45000000"><?php echo buatrp(45000000);?></option>
                <option value="50000000"><?php echo buatrp(50000000);?></option>
                <option value="55000000"><?php echo buatrp(55000000);?></option>
                <option value="60000000"><?php echo buatrp(60000000);?></option>
                <option value="65000000"><?php echo buatrp(65000000);?></option>
                <option value="70000000"><?php echo buatrp(70000000);?></option>
                <option value="75000000"><?php echo buatrp(75000000);?></option>
                <option value="80000000"><?php echo buatrp(80000000);?></option>
                <option value="85000000"><?php echo buatrp(85000000);?></option>
                <option value="90000000"><?php echo buatrp(90000000);?></option>
                <option value="95000000"><?php echo buatrp(95000000);?></option>
                <option value="100000000"><?php echo buatrp(100000000);?></option>
              </select>
            </div>

            <div style="margin-top: 10px; width: 100%;">
              <p style="margin-bottom: 5px; font-size: 13px;">Agunan</p>
              <select name="agunan">
                <option value=""> -- Silahkan Pilih -- </option>
                <?php
                  $agunan = $db->query("SELECT * FROM agunan ORDER BY id_agunan");
                  while ($agn = $agunan->fetch_array()) {
                    if($agn['id_agunan']){
                      $pilih = "$agn[jenis]";
                    }else{
                      $pilih = "";
                    }
                    echo "<option value= $pilih>$agn[jenis]</option>";
                  }
                ?>
              </select>
            </div>

            <div style="margin-top: 10px; width: 100%;">
              <p style="margin-bottom: 5px; font-size: 13px;">Tenor</p>
              <select name="tenor">
                <option value=""> -- Silahkan Pilih -- </option>
                <option value="6">6 Bulan</option>
                <option value="12">12 Bulan</option>
                <option value="24">24 Bulan</option>
                <option value="36">36 Bulan</option>
                <option value="48">48 Bulan</option>
                <option value="60">60 Bulan</option>
                <option value="72">72 Bulan</option>
                <option value="84">84 Bulan</option>
              </select>
            </div>

            <div style="margin-top: 10px;">
              <p style="font-size: 20px;">Status Peminjam</p>
            </div>

            <div style="margin-top: 10px; width: 100%;">
              <p style="margin-bottom: 5px; font-size: 13px;">Tipe Pekerjaan</p>
              <select name="tipe_pek">
                <option value=""> -- Silahkan Pilih -- </option>
                <option value="Pegawai Swasta">Pegawai Swasta</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Profesional">Profesional</option>
                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                <option value="TNI atau POLRI">TNI atau POLRI</option>
              </select>
            </div>

            <div style="margin-top: 10px; width: 100%;">
              <p style="margin-bottom: 5px; font-size: 13px;">Bekerja Sejak</p>
              <select name="thn_bek">
                <option value=""> -- Silahkan Pilih -- </option>
                <?php
                  for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                  echo"<option value='$i'> $i </option>";
                }
                ?>
              </select>
            </div>

            <div style="margin-top: 10px; width: 100%;">
              <p style="margin-bottom: 5px; font-size: 13px;">Status Pekerjaan</p>
              <select name="stts_pek">
                <option value=""> -- Silahkan Pilih -- </option>
                <option value="Paruh Waktu">Paruh Waktu</option>
                <option value="Kontrak">Kontrak</option>
                <option value="Tetap/Permanen">Tetap/Permanen</option>
                <option value="Lain-lain">Lain-lain</option>
              </select>
            </div>

            <div style="margin-top: 10px;">
              <p style="margin-bottom: 5px; font-size: 13px;">Penghasilan</p>
              <input type="text" name="penghasilan" placeholder="Rp. 1.000.000">
            </div>


            <div style="margin-top: 10px;">
              <input type="submit" name="ajukan" class="btnku" value="Kirim" >
            </div>
          </form>
    </div>

<?php include 'footer.php';?>
<?php }else{ header("location:login.php"); } ?>
