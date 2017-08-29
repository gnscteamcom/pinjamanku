<?php
  session_start();
  include 'admin/config/koneksi.php';
//  if ($_SESSION['member'] || $_SESSION['user']);

  $pass = md5($_POST['pass']);
  $baris = $db->query("SELECT * FROM anggota WHERE email='$_POST[email]' AND pass='$pass'");
  $data = $baris->fetch_array();
  //print_r($data);die();
  $jum   = $baris->num_rows;

  if($jum == 1){
      $_SESSION['login'] = 1;
      $_SESSION['id_anggota'] = $data['id_anggota'];
      $_SESSION['nm_depan'] = $data['nm_depan'];
      header('location: index1.php');
    }else{
      header('location: login.php?er');
    }
?>
