<?php
include 'admin/config/koneksi.php';
if($_GET['aksi'] == 'submit'){
    $db->query("INSERT INTO pesan VALUES('', '$_POST[judul]', '$_POST[isi]', '$_POST[deskripsi]', '$_POST[gambar]')");
    move_uploaded_file($file, 'image/'.$nama);
}elseif($_GET['aksi'] == 'edit'){
    $nama = $_FILES['foto']['name'];
    $file = $_FILES['foto']['tmp_name'];

    if($nama != NULL){
        $db->query("UPDATE pesan SET judul='$_POST[judul]', isi='$_POST[isi]', deskripsi='$_POST[deskripsi]', gambar='$_POST[gambar]' WHERE id_halaman='$_POST[id]'");
        move_uploaded_file($file, 'image/'.$nama);

    }else{
        $db->query("UPDATE pesan SET judul='$_POST[judul]', isi='$_POST[isi]', deskripsi='$_POST[deskripsi]', gambar='$_POST[gambar]' WHERE id_halaman='$_POST[id]'");
    }


}elseif($_GET['aksi'] == 'hapus'){
    $db->query("DELETE FROM pesan WHERE id_halaman ='$_GET[id]'");

}
header('location: halaman.php');
