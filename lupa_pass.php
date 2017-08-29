<?php
session_start();
error_reporting(0);
include 'admin/config/koneksi.php';
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
          <img src="admin/image/download.png" width="60" height="60" alt="logo" longdesc="http://localhost/pinjamanku">
        </div>
        <div id="situs">Pinjamanku</div>
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
      Persyaratan pengajuan produk keuangan yang ringan dan sesuai dengan kondisi keuangan nasabah</p></br></br><br>
      </div>
    </div>





    <div id="kanan">
      <div id="sidebar-login">
          <h3 style="margin-left: 8px; margin-top: 8px;">Reset Password</h3><br>

          <?php
          include "config/koneksi.php";
          if(isset($_POST['submit'])){
            //membuat variabel untuk menyimpan data inputan yang di isikan di form
            $password_lama			  = $_POST['password_lama'];
            $password_baru			  = $_POST['password_baru'];
            $konfirmasi_password	= $_POST['konfirmasi_password'];
            die();

            //cek dahulu ke database dengan query SELECT
            //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
            //encrypt -> md5($password_lama)
            $password_lama	= md5($password_lama);
            $cek = $db->query("SELECT pass FROM anggota WHERE pass = '$password_lama'");

            if($cek->num_rows){
              //kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
              //membuat kondisi minimal password adalah 5 karakter
              if(strlen($password_baru) >= 5){
                //jika password baru sudah 5 atau lebih, maka lanjut ke bawah
                //membuat kondisi jika password baru harus sama dengan konfirmasi password
                if($password_baru == $konfirmasi_password){
                  //jika semua kondisi sudah benar, maka melakukan update kedatabase
                  //query UPDATE SET password = encrypt md5 password_baru
                  //kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
                  $password_baru 	= md5($password_baru);
                  $id_anggota 		= $_SESSION['login']; //ini dari session saat login
                  $update = $db->query("UPDATE anggota SET pass = '$password_baru' WHERE id_anggota = '$id_anggota'");

                  if($update){
                    //kondisi jika proses query UPDATE berhasil
                    echo '<p style="margin-left:8px; color:#FE0101;">Password berhasil di rubah, Silahkan <a href="http://localhost/koperasionline.com/login.php">Masuk</a></p>';
                  }else{
                    //kondisi jika proses query gagal
                    echo '<p style="margin-left:8px; color:#FE0101;">Gagal merubah password</p>';
                  }

                  }else{
                    //kondisi jika password baru beda dengan konfirmasi password
                    echo '<p style="margin-left:8px; color:#FE0101;">Konfirmasi password tidak cocok</p>';
                  }

                  }else{
                    //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
                    echo '<p style="margin-left:8px; color:#FE0101;">Minimal password baru adalah 5 karakter</p>';
                  }

                  }else{
                    //kondisi jika password lama tidak cocok dengan data yang ada di database
                    echo '<p style="margin-left:8px; color:#FE0101;">Password lama tidak cocok</p>';
                  }

                }
                ?>

        <br>
        <?php 
          if ($_GET['act'] == 'lupa_pass') { ?>
          <div id="notice"></div>
          <div style="margin-top: 10px;">
            <input type="email" name="getEmail" id="getEmail" required placeholder="Email">
          </div>

          <div style="margin-top: 10px;">
            <input type="submit" name="sendMailToForgotPass" value="Proses" onclick="resetPass('proses1')" class="btn">
            <span style="margin-left: 120px;"></span>
          </div>
        <?php  } else {
        ?>
        <!-- <form method="post" action="reset_password.php"> -->

          <!-- <div>
           <input type="password" name="password_lama" placeholder="Password Lama">
          </div>
          
          <div style="margin-top: 10px;">
            <input type="password" name="password_baru" placeholder="Password Baru">
          </div>
          
          <div style="margin-top: 10px;">
            <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password">
          </div> -->
          <div id="notice"></div>
          <div style="margin-top: 10px;">
            <input type="email" name="getEmail" id="getEmail" value="<?php echo $_GET['email']; ?>" readonly required placeholder="Email">
          </div>

          <div style="margin-top: 10px;">
            <input type="password" name="password_baru" id="password_baru" required placeholder="Password">
          </div>

          <div style="margin-top: 10px;">
            <input type="password" name="konfirmasi_password_baru" id="konfirmasi_password_baru" required placeholder="Ulangi Password">
          </div>

          <div style="margin-top: 10px;">
            <input type="submit" name="resetPass" value="Proses" onclick="resetPass('proses2')" class="btn">
            <span style="margin-left: 120px;"></span>
          </div>
        <?php } ?>
        <!-- </form> -->
        <script>
            function resetPass(param){
              var email = $('#getEmail').val();
              var newPass = $('#password_baru').val();
              var confirmPass = $('#konfirmasi_password_baru').val();

              if (param == 'proses1') {
                $.ajax({
                  type: 'post',
                  url: 'reset_password.php?act='+param,
                  data: { email:email, },
                  success:function(data){
                    console.log(data);
                    $('#notice').html('');
                    $('#notice').html(data);
                  }
                });
              }else{
                $.ajax({
                  type: 'post',
                  url: 'reset_password.php?act='+param,
                  data: { email:email, newPass:newPass,confirmPass:confirmPass },
                  success:function(data){
                    console.log(data);
                    $('#notice').html('');
                    $('#notice').html(data);
                  }
                });
              }
              
            }
      </script>
    </div>
    </div>
</div>

<?php include 'footer.php';?>


