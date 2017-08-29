<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body,td,th {
font-family: Geneva, Arial, Helvetica, sans-serif;
font-size: 12px;
color: #333333;
}
-->
</style></head>
<?php
$harga=$_GET['harga'];
$dp=$harga*0.2;
?>
<body>
<H2>FORM SIMULASI KREDIT </H2> <br />
<form id="form1" name="form1" method="post" action="simulasi_proses1.php">
<table width="580" border="0" cellspacing="2" cellpadding="2">
<tr>
<td>Harga Kendaraan </td>
<td><input name="harga" type="text" id="harga" value="<?php echo $harga ; ?>" size="50" /></td>
</tr>
<tr>
<td>DP Murni </td>
<td><input name="dp" type="text" id="dp" value="<?php echo $dp; ?>" size="50" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>DP di atas adalah 20%, Anda bisa mengganti sesuai budget </td>
</tr>
<tr>
<td>Lama Kredit </td>
<td>
<select name="tahun" id="tahun">
<option value="0">-- Pilih Tahun --</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select> </td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Kalkulasi" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</body>
</html>


Program perhitungan disini:

<html>
<head>
<title>Hasil Simulasi Kredit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="images/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
$harga=$_POST['harga'];
$uang_muka=$_POST['dp'];
$tahun=$_POST['tahun'];
?>

Simulasi Kredit Kendaraan<br>
<br>
<table border="0" cellpadding="2" cellspacing="2">
<tr>
<td width="200">Harga Kendaraan</td>
<!-- <?php $hargakoma=number_format($harga); ?> -->
<td width="142" align="right"><?php echo "$hargakoma" ;?></td>
</tr>
<tr>
<td>Uang Muka</td>
<!-- <?php $uang_mukakoma=number_format($uang_muka); ?> -->
<td align="right"><? echo "$uang_mukakoma" ; ?></td>
</tr>
<tr>
<td>Pokok Pinjaman</td>
<?php $pokok_pinjaman=$harga-$uang_muka ;
if ($tahun==1) {
$bunga=$tahun*0.0818 ; }
if ($tahun==2) {
$bunga=$tahun*0.0938 ; }
if ($tahun==3) {
$bunga=$tahun*0.1068 ; }
if ($tahun==1) {
$asuransi=0.0125*$harga; }
if ($tahun==2) {
$asuransi=0.0238*$harga; }
if ($tahun==3) {
$asuransi=0.0238*$harga; }
$asuransikoma=number_format($asuransi);
$jumlah_bunga=$bunga*$pokok_pinjaman ;
$total_pinjaman=$pokok_pinjaman+$jumlah_bunga;
$total_pinjamankoma=number_format($total_pinjaman);
$jangka_kredit=$tahun*12;
$cicilan=$total_pinjaman/$jangka_kredit;
$cicilanbunga=number_format($cicilan);
$pokok_pinjamankoma=number_format($pokok_pinjaman);
if ($tahun==1) {
$biaya_adm=500000; }
if ($tahun==2) {
$biaya_adm=550000; }
if ($tahun==3) {
$biaya_adm=600000; }
$biaya_admkoma=number_format($biaya_adm);
$total_pembayaran_pertama=$uang_muka+$cicilan+$biaya_adm+$asuransi;
$total_pembayaran_pertamakoma=number_format($total_pembayaran_pertama);
?>
<td align="right"><?php echo "$pokok_pinjamankoma"; ?></td>
</tr>
<tr>
<td>Lama Pinjaman</td>
<td align="right"><?php echo "$jangka_kredit bulan"; ?></td>
</tr>
<tr>
<td>Angsuran Pembayaran</td>
<td align="right"><?php echo "$cicilanbunga"; ?></td>
</tr>
<tr>
<td>Asuransi Kendaraan TLO</td>
<td align="right"><?php echo "$asuransikoma"; ?></td>
</tr>
<tr>
<td>Biaya Administrasi</td>
<td align="right"><?php echo "$biaya_admkoma" ; ?></td>
</tr>
<tr>
<td>Total Pembayaran Pertama</td>
<td align="right"><?php echo "$total_pembayaran_pertamakoma"; ?></td>
</tr>
</table>
<br>| <a href="simulasi_form.php">COBA LAGI</a> | PRINT |
</body>
</html> 






























<?php
	include "admin/config/koneksi.php";


                     $pnjm = $db->query("SELECT * FROM pinjaman") or die (mysql_error());
                      $p = $pnjm->fetch_array();
                    ?>











<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" bgcolor="#F7FCFF">

<title>Detail Pinjaman</title>
<link rel="stylesheet" href="styles/stylesheet.css" type="text/css">

<form>
<table width="500" border="0" cellpadding="0" cellspacing="0">
   <tbody>
   <tr height="1">
		<td colspan="3"><span class="catatantext">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
<!--					<td>&nbsp;<span class="catatantext"><?php if(isset($message)) { echo $message; } ?></span></td>-->
				</tr></table>
		</span></td>
    </tr>
        <td width="1"><img src="styles/spacer.gif" height="1" width="1" border="0"></td>
        <td valign="top" width="490">
            <div align="center">
                <table width="600" border="0" cellpadding="2" cellspacing="1">
                    <tbody><tr height="8"><td colspan="3" height="8"><img src="styles/spacer.gif" height="1" width="1" border="0"></td></tr>
                    <tr><td colspan="2"><span class="header">DETAIL PINJAMAN</span></td>
					<td width="100"><div align="right"><img src="styles/mandiri_resultlogo.gif" border="0"></div></td></tr>
                    <tr height="1"><td colspan="3" height="1"><img src="styles/spacer.gif" height="1" width="1" border="0"></td></tr>
                    <tr><td colspan="3"><img src="styles/spacer.gif" height="1" width="1" border="0"></td></tr>
					<? if ($row['no_pinjaman'] == "") { ?>
					<tr height="30" bgcolor="#009933">
						<td colspan="3" height="30">
						<div class="errorMessage" align="center"> <b>
							<font color="#99FF00">Belum ada transaksi yang dilakukan</font></b><font size="4">
						</font></div>
						</td>
					</tr>
					<tr height="30">
						<td colspan="3" height="30">&nbsp;</td>
					</tr>
					
					<tr><td colspan="3">&nbsp;</td></tr>
                    <tr bgcolor="#00FF99">
                        <td width="210"><span class="text-bold">No Pinjaman</span><br></td>
                        <td width="6" align="center"><span class="text-bold">:</span></td>
                        <td width="269" class="text"><?php echo $p['id_pinjaman'];?></td>
                    </tr>
					<tr>
					<?	$sql = "SELECT anggota.id_anggota FROM simpanan
								INNER JOIN anggota ON simpanan.user=anggota.user
								WHERE simpanan.no_rekening = '{$row[no_rekening]}'";
						$result = mysql_fetch_array(mysql_query($sql));
					?>
                        <td width="210"><span class="text-bold">Nama Anggota</span><br></td>
                        <td width="6" align="center"><span class="text-bold">:</span></td>
                        <td width="269" class="text"><?echo $result['nama_anggota'];?></td>
                    </tr>
					<tr bgcolor="#00FF99">
                        <td width="210"><span class="text-bold">No Rekening Simpanan</span><br></td>
                        <td width="6" align="center"><span class="text-bold">:</span></td>
                        <td width="269" class="text"><?echo $row['no_rekening'];?></td>
                    </tr>
					<tr>
                        <td width="210"><span class="text-bold">Tanggal Pinjam</span><br></td>
                        <td width="6" align="center"><span class="text-bold">:</span></td>
                        <td width="269" class="text"><?echo $row['tgl_pinjam'];?></td>
                    </tr>
                    <tr bgcolor="#00FF99">
                        <td width="210" rowspan="1"><span class="text-bold">Jangka Waktu</span><br></td>
                        <td width="6" align="center" rowspan="1"><span class="text-bold">:</span></td>
                        <td width="269" class="text"><?=$row['jangka_waktu'];?></td>
                    </tr>
					<tr>
                        <td width="210" rowspan="1"><span class="text-bold">Jumlah Pinjaman</span><br></td>
                        <td width="6" align="center" rowspan="1"><span class="text-bold">:</span></td>
                        <td width="269" class="text">Rp. <?echo number_format($row['jumlah_pinjam']);?>, -</td>
                    </tr>
                    <tr bgcolor="#00FF99">
                        <td width="210" rowspan="1"><span class="text-bold">Sisa Pinjaman</span><br></td>
                        <td width="6" align="center" rowspan="1"><span class="text-bold">:</span></td>
                        <td width="269" class="text">Rp. <?echo number_format($row['sisa_bayar']);?>, -</td>
                    </tr>
                    </tbody></table>
					<br>

				<table width="100%" border="0" cellpadding="2" cellspacing="1" class="tabledata">
					<tbody>
					<tr bgcolor="#009933">
						<td class="menu1" align="center">Bulan Ke</td>
					    	<td class="menu1" align="center">Tanggal</td>
					    	<td class="menu1" align="center">Jumlah</td>
					    	<td class="menu1" align="center">Sisa</td>
					</tr>
		<? $baris=1;
			$sql = "select * from trans_pinjam where id_pinjaman = $row[id_pinjaman]";
			// echo $sql;
			$query = mysql_query($sql);

			$sisa_bayar = $row['jumlah_pinjam'];
			while ($row = mysql_fetch_array($query)) {

				$sisa_bayar -= $row['jumlah'];
				if ($baris%2==0) {
					echo '<tr height="25">';
				} else {
					echo '<tr height="25" bgcolor="#00FF99">';}
					echo '<td height="25" width="20%" align="center">'. $row['bulan_ke'] .'</span></td>';
				    	echo '<td height="25" width="20%" align="center">'. $row['tanggal'] .'</span></td>';
				    	echo '<td height="25" width="20%" align="center">'. number_format($row['jumlah']) .'</span></td>';
				    	echo '<td height="25" width="20%" align="center">'. number_format($sisa_bayar) .'</span></td>';
					echo "</tr>";

					$baris ++;
				}
		?>
                    <tr><td>&nbsp;</td></tr>
                </tbody></table>

				<table width="100%" border="0" cellpadding="2" cellspacing="0"><tbody>
				<tr align="center">
                <td valign="middle" align="center"><span class="text-bold">
                <a href="javascript:window.print();"><img src="styles/button-cetak.gif" border="0"></a>
                </span></td>
                </tr>
				<? } ?>
				</tbody></table>
            </div>
        </td>
        <td width="1"><img src="styles/spacer.gif" height="1" width="1" border="0"></td>
    </tr>
    <tr height="1"><td colspan="3" height="1"><img src="styles/spacer.gif" height="1" width="1" border="0"></td></tr>
</tbody></table>

 </form>
 </body></html>


