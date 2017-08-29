<?php include 'header.php';?>

<div class="single-produk">
  <center>
  <table border=0px cellpadding='10'>
      <?php
      $agunan = $db->query("SELECT * FROM agunan LIMIT 8");
      $jml_kolom=3;
      $cnt = 0;
      while ($agn = $agunan->fetch_array()) {
        if ($cnt >= $jml_kolom){
            $cnt = 0;
      }$cnt++;
      ?>

      <td align=center>
      <div>
          <a href="single.php?id=<?php echo $agn['jenis'] ?>">

          <img style="margin-left:67%;" width='40px' height='40px' src="admin/image/<?php echo $agn['gambar'] ?>">

          <div style="margin-left:68%; margin-bottom:5%;">
              <?php echo $agn['jenis'] ?></a>
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



<?php
$detail = $db->query("SELECT * FROM agunan WHERE jenis='$_GET[id]'");
$d = $detail->fetch_array();
?>

<div class="single">
    <img src="admin/image/<?php echo $d['gambar'] ?>" height="150px" width="150px" align="left"/>
    <p><?php echo $d['judul'] ?></p>
    <div style= "font-size: 13px; text-align: justify;">
      <?php echo $d['deskripsi'] ?>
    </div>
</div>




<div class="simulasi">

<?php
function buatrp($angka){
  $jadi ="Rp. " .number_format($angka,2,',','.');
  return $jadi;
}
?>

</div>

<div class="container">
<h2 class="section-title"><span>Simulasi Kredit</span></h2>

<form action="" method="POST">
<b>Jumlah Pinjaman : </b>
<select name="jumlah" id="" class="form-control" required>
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

<br>

<b>Lama Peminjaman : </b>
<select name="lama" id="myPinjam" onchange="myFunction()" class="form-control" required>
  <option value="">-Pilih-</option>
  <option value="12">12 Bulan</option>
  <option value="24">24 Bulan</option>
  <option value="36">36 Bulan</option>
  <option value="48">48 Bulan</option>
  <option value="60">60 Bulan</option>
  <option value="72">72 Bulan</option>
  <option value="84">84 Bulan</option>
</select><br>

<input type="submit" name="btn-kalkulasi" class="btnku" value="Kalkulasi">
<a href="ajukan.php"><input type="button" name="btn-kalkulasi" class="btnku" value="Ajukan Sekarang"></a>
<a href="" onclick = print() ><input type="button" name="cetak" class="btnku" value="Cetak" style="float:right;"></a>
</form>
<hr>

<?php
if (isset($_POST['btn-kalkulasi'])){
  $jumlah_pinjaman = $_POST['jumlah'];
  $lama_pinjaman = $_POST['lama'];

  if($lama_pinjaman==12){
    $bunga_pertahun=10.56;
  }elseif ($lama_pinjaman==24){
    $bunga_pertahun=12;
  }elseif ($lama_pinjaman==36){
    $bunga_pertahun=14.40;
  }elseif ($lama_pinjaman==48){
    $bunga_pertahun=14.40;
  }elseif ($lama_pinjaman==60){
    $bunga_pertahun=15.36;
  }elseif ($lama_pinjaman==72){
    $bunga_pertahun=15.36;
  }elseif ($lama_pinjaman==84){
    $bunga_pertahun=15.36;
  }



  $bunga_perbulan = $bunga_pertahun/12;
  $bunga_rp       = $jumlah_pinjaman/$bunga_pertahun;
  $angsuran_bunga = $jumlah_pinjaman*$bunga_perbulan/100;
  $angsuran_pokok = $jumlah_pinjaman/$lama_pinjaman;
  $jumlah         = $angsuran_pokok+$angsuran_bunga;



  echo "<pre>";
  echo "Jumlah Pinjaman          = "."<b>".buatrp($jumlah_pinjaman)."</b>"."<br>";
  echo "Lama Pinjaman            = "."<b>".$lama_pinjaman." Bulan"."</b>"."<br>";
//  echo "Bunga per tahun          = "."<b>".$bunga_pertahun.' %'."</b>"."<br>";
  echo "Bunga per bulan          = "."<b>".$bunga_perbulan.' %'."</b>".'<br>';
  echo "<br>";
  echo "Angsuran Pokok Per Bulan = "."<b>".buatrp($angsuran_pokok)."</b>"."<br>";
  echo "Angsuran Bunga Per Bulan = "."<b>".buatrp($angsuran_bunga)."</b>"."<br>";
  echo "                           _____________________ ( + )<br>";
  echo "Total Angsuran Per Bulan = "."<b>".buatrp($jumlah)."</b>";
  echo "</pre>";



  $row = $jumlah_pinjaman;
  $no=1;

?>

<table class="table zebra-table">
  <tr>
    <th>Angsuran ke -</th>
    <th>Angsuran Pokok</th>
    <th>Angsuran Bunga</th>
    <th>Total Angsuran</th>
    <th>Baki Debet</th>
  </tr>

  <tr>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td><b><?php echo buatrp($jumlah_pinjaman);?></b></td>
  </tr>



<?php while ( $row > 1) { $row=$row-$angsuran_pokok; ?>

  <tr>
    <td><?php echo $no++;?></td>
    <td><?php echo buatrp($angsuran_pokok);?></td>
    <td><?php echo buatrp($angsuran_bunga);?></td>
    <td><?php echo buatrp($jumlah);?></td>
    <td><?php echo buatrp($row);?></td>
  </tr>



<?php }

  $tot_ang_pokok=$angsuran_pokok*$lama_pinjaman;
  $tot_ang_bunga=$angsuran_bunga*$lama_pinjaman;
  $tot_jumlah=$jumlah*$lama_pinjaman;

?>



  <tr>

    <td></td>

    <td><b><?php echo buatrp($tot_ang_pokok);?></b></td>

    <td><b><?php echo buatrp($tot_ang_bunga);?></b></td>

    <td><b><?php echo buatrp($tot_jumlah);?></b></td>

    <td></td>

  </tr>

</table>

</div>

<div class="container"><br></div>
<?php } ?>

</div>




<?php include 'footer.php';?>
