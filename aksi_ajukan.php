<?php
include 'admin/config/koneksi.php';
if($_GET['submit'] == 'ajukan'){
    $nama = $_FILES['foto']['name'];
    $file = $_FILES['foto']['tmp_name'];
    $waktu  = gmdate("Y-m-d H:i:s", time()+60*60*7);

    $db->query("INSERT INTO pinjaman VALUES('','$_POST[jml_pnj]', '$_POST[tenor]', '$_POST[jns_agunan]', '$_POST[tipe_pek]', '$_POST[thn_bek]', '$_POST[stts_pek]', '$_POST[penghasilan]', '$waktu')");
    move_uploaded_file($file, 'img/'.$nama);

}

header('location:ajukan.php');
