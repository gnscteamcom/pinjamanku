<?php
function tampilkan_per_id($id){
    $query  = "SELECT * FROM produk WHERE id_prod=$id";
}

function tambah_data($nama, $email, $isi_pesan){
  $query = "INSERT INTO pesan (nama, email, isi_pesan) VALUES ('$nama', '$email', '$isi_pesan')";
  return run($query);
}
 ?>
