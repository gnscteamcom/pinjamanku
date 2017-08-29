<?php 
	//session_start();
	//if($_SESSION['login'] == 1){
		include 'header1.php';
?>

  <div id="main" class="container">
    <!-- <div id="konten"> -->
      <br>
      <br>
<h1><center>Data Profile</center></h1><br>
<?php
	$SQLCheckApparoval = "SELECT * FROM pinjaman WHERE id_agt = ".$_SESSION['id_anggota'];
	$resultApproval = mysqli_query($db,$SQLCheckApparoval);
	$dataApproval = mysqli_fetch_assoc($resultApproval);
	$status = empty($dataApproval['status']);
	//print_r($dataApproval['status']);
	if($status == 3){
		echo "<h1 align='center'>MASIH MENUNGGU KONFIRMASI</h1>";
	}else{

	$SQL1 = "SELECT A.*, B.*, CONCAT(C.nm_depan,' ',C.nm_blkg) AS NAMA_ANGGOTA
            FROM pinjaman A
            LEFT JOIN trans_pinjaman B ON B.id_pinjaman = A.id_agt
            LEFT JOIN anggota C ON A.id_agt = C.id_anggota
            WHERE B.id_pinjaman =".$_SESSION['id_anggota']."
            GROUP BY C.id_anggota";
    //echo $SQL1;
	$result1 = mysqli_query($db,$SQL1);
	$data1 = mysqli_fetch_assoc($result1);
	//print_r($data1);
?>
<table>
	<tr>
		<td>Nama</td>
		<td>&nbsp;&nbsp;&nbsp;:</td>
		<td>&nbsp;&nbsp;&nbsp;<b><?php echo strtoupper($data1['NAMA_ANGGOTA']) ?></b></td>
	</tr>
	<tr>
		<td>Jumlah Pinjaman</td>
		<td>&nbsp;&nbsp;&nbsp;:</td>
		<td>&nbsp;&nbsp;&nbsp;<?php echo 'Rp. '.number_format($data1['jml_pinjaman'] , 2, '.', ',')?></td>
	</tr>
	<tr>
		<td>Total Pinjaman</td>
		<td>&nbsp;&nbsp;&nbsp;:</td>
		<td>&nbsp;&nbsp;&nbsp;<?php //echo $data1['NAMA_ANGGOTA'] ?></td>
	</tr>
	<tr>
		<td>Total Tenor</td>
		<td>&nbsp;&nbsp;&nbsp;:</td>
		<td>&nbsp;&nbsp;&nbsp;<?php echo $data1['tenor'] ?> Bulan</td>
	</tr>
	<tr>
		<td>Tanggal Jatuh Tempo</td>
		<td>&nbsp;&nbsp;&nbsp;:</td>
		<td>&nbsp;&nbsp;&nbsp;
			Setiap Tgl 5 Per Bulannya
		</td>
	</tr>
</table>
<hr>
<p style="margin-left: 5%; margin-right: 5%;"><center>
	<table class="table" width="80">
		<tr>
			<th>No</th>
			<th>Jumlah Angsuran</th>
			<th>Tanggal Bayar</th>
			<th>Tenor</th>
			<th>Denda</th>
		</tr>
		<?php 
			$SQL = "SELECT A.*, B.*, CONCAT(C.nm_depan,' ',C.nm_blkg) AS NAMA_ANGGOTA
                    FROM pinjaman A
                    LEFT JOIN trans_pinjaman B ON B.id_pinjaman = A.id_agt
                    LEFT JOIN anggota C ON A.id_agt = C.id_anggota
                    WHERE B.id_pinjaman =".$_SESSION['id_anggota'];
            //echo $SQL;
			$result = mysqli_query($db,$SQL);
			$no = 0;
			while ($data = mysqli_fetch_assoc($result)) {
				$no++;
				$jumlah = 'Rp. '.number_format($data['jumlah'], 2, '.', ',');
                $denda = 'Rp. '.number_format($data['denda'], 2, '.', ',');
			//}
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $jumlah ?></td>
			<td><?php echo $data['tanggal'] ?></td>
			<td><?php echo $data['tenor_ke'] ?></td>
			<td><?php echo $denda ?></td>
		</tr>
		<?php } ?>
	</table>
</center></p>

    <!-- </div> -->

<br>
  </div>
  </div>
  </div>

<?php
	 include 'footer.php';
	/*}else{
		header("location:index.php");*/
	}
?>
