<?php
session_start();
error_reporting(0);
include "admin/config/koneksi.php";
if ($_SESSION['member'] || $_SESSION['user']);

//if ($_SESSION['login']);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>pinjamanku</title>
    <link rel="stylesheet" href="admin/css/style.css" type="text/css">
    <link rel="stylesheet" href="admin/css/main.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="admin/js/parallax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="admin/js/jquery.cycle2.min.js"></script>

    <script type="text/javascript">
  	$(document).ready(function(){
  		$('#third').parallax("75%",0.6);
  	})
  	</script>

    <script type="text/javascript">
          $('.parallax-window').parallax({imageSrc: 'img/angsuran-pinjaman.jpg'});
    </script>

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
    <div id="top">
      <div id="top-menu">
        <?php include 'top_menu.php';?>
      </div>
    </div>

    <div id="header">
      <a href="http://localhost/pinjamanku/">
        <div id="logo">
          <img src="admin/image/download.png" width="60" height="60" alt="logo" longdesc="http://localhost/pinjamanku/">
        </div>
        <div id="situs">pinjamanku</div>
      </a>
    </div>

    <div id="menu">
      <?php include 'menu.php';?>
    </div>
