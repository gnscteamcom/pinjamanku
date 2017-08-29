<?php include 'header1.php';?>


<?php
$detail = $db->query("SELECT * FROM halaman WHERE id_halaman");
$d = $detail->fetch_array();
?>

<div class="single-artikel">
    <div class="artikel">
    <h1><?php echo $d['judul'] ?></h1>
        <?php echo $d['waktu'] ?>
       <img src="admin/img/<?php echo $d['gambar'] ?>" height="60%" width="100%" align="left"/>
      <p style= "margin-top: 13px;"><?php echo $d['isi'] ?></p><br>
    </div>
</div>



<?php include 'footer.php';?>
