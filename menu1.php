<?php if($_SESSION['login'] == 1){ ?>
<ul id="main-menu">
    <li><a href="http://localhost/pinjamanku/index1.php">Beranda</a></li>
    <li><a href="http://localhost/pinjamanku/panduan.php">Panduan</a></li>
    <li><a href="http://localhost/pinjamanku/about.php"> Tentang Kami </a></li>
    <!-- <li><a href="http://localhost/pinjamanku/trans_pinjaman.php"> Data Anggota </a></li> -->
    <li><a href="http://localhost/pinjamanku/profile.php"> Profile </a></li>
</ul>
<?php 
	}else{
		include "menu.php";
		//header("location:index.php");
	} 
?>
