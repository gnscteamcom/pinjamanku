<?php 
  include 'header1.php'; 
  //echo $_SESSION['nm_depan'];
?>

<div id="main">
  <div id="container">
  <div id="slideshow" class="cycle-slideshow"
        data-cycle-fx = "fade"
        data-cycle-speed = "600"
        data-cycle-timeout = "3000"
        data-cycle-pager-template = "<a href='#'><img src='{{src}}' height=100 width=150/>"
        data-cycle-next = "#next"
        data-cycle-prev = "#prev"
        data-cycle-manual-fx = "scrollHorz"
        data-cycle-manual-speed = "400"
        data-cycle-pager-fx = "fade">
        <img src="admin/image/customer_service_large.jpg" alt="" />
    <img src="admin/image/gram.png" alt="" />
    <img src="admin/image/4.jpg" alt="" />
  </div>
  <img id="prev" src="admin/image/left-128.png" alt="" />
  <img id="next" src="admin/image/left-129.png" alt="" />
</div>

<div class="kol-1">
<br>
<p style="color:#267DF0;">Temukan Produk Pinjaman Multiguna Terbaik di Indonesia</p>
<br/><br/>
<table border=0px cellpadding='10'>

    <?php
    $agunan = $db->query("SELECT * FROM agunan LIMIT 6");
    $jml_kolom = 3;
    $cnt = 0;
    while ($agn = $agunan->fetch_array()) {
      if ($cnt >= $jml_kolom){
          echo "</tr><tr>";
          $cnt = 0;
    }$cnt++;
    ?>

    <td align=center>
    <div>
        <a href="single.php?id=<?php echo $agn['jenis']; ?>">

        <img style="margin-left:67%;" width='120px' height='120px' src="admin/image/<?php echo $agn['gambar']; ?>">

        <div style="margin-left:67%; margin-bottom:5%;">
            <?php echo $agn['jenis'];?></a>
        </div>
        </a>
      <?php { ?>
		  <?php } ?>
    </div>
  </td>
    <?php } ?>
</tr>
</table>

</div>



<!-- Ini adalah parallax -->

<div style="" id="third">
</div> <!--#third-->



<div class="kol-2">
  <br>
  <p style="color:#267DF0;">Baca Artikel</p>
  <br/>
  <div class="artikels">
    <table border=0px cellpadding='10'>


        <?php
        $artikel = $db->query("SELECT * FROM artikel LIMIT 3");
        $jml_kolom = 3;
        $cnt = 0;
        while ($a = $artikel->fetch_array()) {
          if ($cnt >= $jml_kolom){
              echo "</tr><tr>";
              $cnt = 0;
        }$cnt++;
        ?>

        <td align=center>
        <div>
            <a href="single_artikel.php?id=<?php echo $a['judul'] ?>">

            <img width='250px' height='250px' src="admin/image/<?php echo $a['gambar']; ?>">

            <div style="margin-bottom:5%;">
                <?php echo $a['judul']; ?></a>
            </div>
            </a>
          <?php { ?>
    		  <?php } ?>
        </div>
      </td>
        <?php } ?>
    </tr>
    </table>
  </div>
</div>





<!-- Ini adalah parallax -->
<div style="" id="third-2">
</div> <!--#third-->


<div class="kol-3">
  <br>
  <p style="color:#267DF0;"><a href="http://localhost/pinjamanku/contact.php">Kontak Kami</a></p>
  <br/>

  <div class="kon-1">
  <form method="post" action="" enctype="multipart/form-data">
  <input type="text" name="nama" placeholder="Nama" class="btnkuu">
  <input type="email" name="email" placeholder="Email" class="btnkuu">
  <textarea name="isi_pesan" placeholder="Isi Pesan" rows="6" cols="80" class="btnkuu"></textarea>
  <input type="submit" name="kirim" value="Kirim" class="btnkuu">
  </form>




  <?php
  include "admin/config/koneksi.php";
    if (@$_POST['kirim']) {
       $nama = @$_POST['nama'];
       $email = @$_POST['email'];
       $isi_pesan = @$_POST['isi_pesan'];
       $waktu  = gmdate("Y-m-d H:i:s", time()+60*60*7);

       if ($nama == '' || $email == '' || $isi_pesan == '' || $waktu == '') {
         ?> <script type=text/javascript>alert('Inputan Tidak Boleh Ada Kosong');</script> <?php
       } else {
         $sql_insert = mysqli_query($db, "INSERT INTO pesan VALUES ('', '$nama', '$email', '$isi_pesan', '$waktu')") or die (mysql_error());
         if($sql_insert){
           ?> <script type=text/javascript>alert('Terimakasih Telah Mengirim Pesan');</script> <?php
         }
         header('location: index1.php');
       }
    }

   ?>
  </div>

  <div class="kon-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d213453.96833499198!2d106.8283162746339!3d-6.228714774045471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sJakarta+Pusat%2C+Kota+Jakarta+Pusat%2C+Daerah+Khusus+Ibukota+Jakarta!5e0!3m2!1sid!2sid!4v1498239621809" width="100%" height="240" frameborder="0" style="border:0" allowfullscreen></iframe>
    <!-- <iframe src="" width="100%" height="300"></iframe> -->
  </div>
</div>








<?php include 'footer.php';?>
</div>
