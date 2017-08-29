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
$detail = $db->query("SELECT * FROM artikel WHERE judul='$_GET[id]'");
$d = $detail->fetch_array();
?>

<div class="single-artikel">
    <div class="artikel">
    <h1><?php echo $d['judul'] ?></h1>
        <?php echo $d['waktu'] ?>
       <img src="admin/image/<?php echo $d['gambar'] ?>" height="60%" width="100%" align="left"/>
      <p style= "margin-top: 13px;"><?php echo $d['isi'] ?></p><br>
    </div>
</div>



<?php include 'footer.php';?>
