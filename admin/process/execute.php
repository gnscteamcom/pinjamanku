<?php 
	include '../config/database.php';
	$type = $_GET['type'];
	$act = $_GET['act'];

	if($type == 'get_data'){
		if ($act == 'getIdConfirm') {
			$SQL = "SELECT A.*, CONCAT(B.nm_depan,' ', B.nm_blkg) AS NAMA_ANGGOTA
					FROM pinjaman A
					INNER JOIN anggota B ON B.id_anggota = A.id_agt 
					WHERE id_pinjaman = ".$_POST['id_pinjaman'];
			$execute = mysqli_query($con,$SQL);
			$data = mysqli_fetch_assoc($execute);

			$JmlahTenor = "SELECT COUNT(A.id_agt) AS TOTAL
						FROM pinjaman A
						INNER JOIN trans_pinjaman B ON B.id_pinjaman = A.id_pinjaman
						WHERE A.id_pinjaman = ".$_POST['id_pinjaman'];
			$executeTenor = mysqli_query($con,$JmlahTenor);
			$dataTenor = mysqli_fetch_assoc($executeTenor);

			$selisihTenor = $data['tenor'] - $dataTenor['TOTAL'];
			
			$dataArr = array(
				'id' => $data['id_agt'],
				'nama' => $data['NAMA_ANGGOTA'],
				'sisa_tenor' => $selisihTenor,
				'tenorKe' => $dataTenor['TOTAL'] + 1
			);

			echo json_encode($dataArr);
		}elseif ($act == 'dataUpdateAgt') {
			$SQL = "SELECT * FROM anggota WHERE id_anggota = ".$_POST['id'];
			$result = mysqli_query($con,$SQL);
			$data = mysqli_fetch_assoc($result);
			$dataArr = array(
				'id' => $data['id_anggota'],
				'nm_depan' => $data['nm_depan'],
				'email' => $data['email'],
				'no_telp' => $data['no_telp'],
				'alamat' => $data['alamat'],
				'provinsi' => $data['provinsi'],
				'kota' => $data['kota']
			);

			echo json_encode($dataArr);
		}elseif ($act == 'getAdmin') {
			$SQL = "SELECT * FROM admin WHERE id_admin = ".$_POST['id'];
			$result = mysqli_query($con,$SQL);
			$data = mysqli_fetch_assoc($result);
			$dataArr = array(
				'id' => $data['id_admin'],
				'username' => $data['username'],
				'email' => $data['email'],
				'password' => $data['password'],
				'nama_lengkap' => $data['nama_lengkap'],
				'jns_kel' => $data['jns_kel'],
				'alamat' => $data['alamat']
			);

			echo json_encode($dataArr);
		}elseif ($act == 'getAgunan') {
			$SQL = "SELECT * FROM agunan WHERE id_agunan = ".$_POST['id'];
			$result = mysqli_query($con,$SQL);
			$data = mysqli_fetch_assoc($result);
			$dataArr = array(
				'id' => $data['id_agunan'],
				'jenis' => $data['jenis'],
				'judul' => $data['judul'],
				'deskripsi' => $data['deskripsi'],
				'gambar' => $data['gambar']
			);
			echo json_encode($dataArr);
		}elseif ($act == 'getArtikel') {
			$SQL = "SELECT * FROM artikel WHERE id_artikel = ".$_POST['id'];
			$result = mysqli_query($con,$SQL);
			$data = mysqli_fetch_assoc($result);
			$dataArr = array(
				'id' => $data['id_artikel'],
				'judul' => $data['judul'],
				'isi' => $data['isi'],
				'deskripsi' => $data['deskripsi']
			);
			echo json_encode($dataArr);
		}
	}elseif ($type == 'save') {
		if ($act == 'trx_pinjaman') {
			$tgl_bayar = $_POST['tgl_bayar'];
			$angsuran = $_POST['jumlah_bayar'];
			$cekTglBayar = date('d',strtotime($tgl_bayar));
			$tglJatuhTempo = "05";
			if ($cekTglBayar > $tglJatuhTempo) {
				$denda = $angsuran + ($angsuran * 0.005);
			} else {
				$denda = "0";
			}
			//Sprint_r($_POST);
			//echo "tgl bayar = ".$cekTglBayar." tgl jatuh tempo = ". $tglJatuhTempo. "Denda = ".$denda;die();
			$SQL = "INSERT INTO trans_pinjaman(id_pinjaman,tanggal,jumlah,tenor_ke,denda) VALUES ('".$_POST['id_trx']."','".$tgl_bayar."','".$angsuran."','".$_POST['tenorKe']."','".$denda."')";
			//Secho $SQL;die();
			mysqli_query($con,$SQL);
		}elseif ($act == 'admin') {
			$nama_admin = $_POST['nama_admin'];
		    $username = $_POST['username'];
		    $email_admin = $_POST['email_admin'];
		    $password_admin = $_POST['password_admin'];
		    $jenis_kelamin = $_POST['jenis_kelamin'];
		    $alamat_admin = $_POST['alamat_admin'];

		    $SQL = "INSERT INTO admin VALUES('','".$username."','".$email_admin."','".md5($password_admin)."','".$nama_admin."','".$jenis_kelamin."','".$alamat_admin."','Admin')";
		    mysqli_query($con,$SQL);

		}elseif ($act == 'agunan') {

		}
	}elseif ($type == 'update') {
		if ($act == 'approve') {
			$SQL = "UPDATE pinjaman SET status = '".$_POST['approveOpt']."' WHERE id_pinjaman = '".$_POST['id_pinjaman']."'";
			mysqli_query($con,$SQL);
		}elseif ($act == 'updateAgt') {
			$getIdagt = $_POST['getIdagt'];
		    $nm_depan = $_POST['nm_depan'];
		    $email_agt = $_POST['email_agt'];
		    $alamat_agt = $_POST['alamat_agt'];
		    $provinsi_agt = $_POST['provinsi_agt'];
		    $kota_agt = $_POST['kota_agt'];
		    $no_telepon = $_POST['no_telepon'];

		    $SQL = "UPDATE anggota SET nm_depan = '".$nm_depan."',email = '".$email_agt."',alamat = '".$alamat_agt."',provinsi = '".$provinsi_agt."',kota = '".$kota_agt."',no_telp = '".$no_telepon."' WHERE id_anggota = ".$getIdagt;
		    //echo $SQL;die();
		    mysqli_query($con,$SQL);
		}elseif ($act == 'admin') {
			$id = $_POST['id'];
			$username = $_POST['username'];
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$jenis_kel = $_POST['jenis_kel'];
			$alamat = $_POST['alamat'];

		    $SQL = "UPDATE admin SET username = '".$username."',nama_lengkap = '".$nama."',alamat = '".$alamat."',email = '".$email."',jns_kel = '".$jenis_kel."',password = '".md5($password)."' WHERE id_admin = ".$id;
		    //echo $SQL;die();
		    mysqli_query($con,$SQL);
		}elseif ($act == 'agunan') {
			$id = $_POST['id'];
			$jenis = $_POST['jenis'];
			$judul = $_POST['judul'];
			$deskripsi = $_POST['deskripsi'];

		    $SQL = "UPDATE agunan SET jenis = '".$jenis."',judul = '".$judul."',deskripsi = '".$deskripsi."' WHERE id_agunan = ".$id;
		    //echo $SQL;//die();
		    mysqli_query($con,$SQL);
		}elseif ($act == 'artikel') {
			$id = $_POST['id'];
			$judul = $_POST['judul'];
			$isi = $_POST['isi'];
			$deskripsi = $_POST['deskripsi'];

		    $SQL = "UPDATE artikel SET judul = '".$judul."',isi = '".$isi."',deskripsi = '".$deskripsi."' WHERE id_artikel = ".$id;
		    //echo $SQL;//die();
		    mysqli_query($con,$SQL);
		}
	}elseif ($type == 'delete') {
		if ($act == 'deleteData') {
			$redirect = $_GET['redirect'];
			$nm_tabel = $_GET['nm_tabel'];
			$id_tabel = $_GET['id_tabel'];
			if ($nm_tabel == 'anggota') {
				$SqlDelTrx = "DELETE FROM trans_pinjaman WHERE id_pinjaman = ".$_GET['id'];
				$executeTrx = mysqli_query($con,$SqlDelTrx);
				if ($executeTrx) {
					$SqlDelPinjaman = "DELETE FROM pinjaman WHERE id_agt = ".$_GET['id'];
					$executePinjaman = mysqli_query($con,$SqlDelPinjaman);
					if ($executePinjaman) {
						$SQL = "DELETE FROM $nm_tabel WHERE $id_tabel = '".$_GET['id']."'";
						mysqli_query($con,$SQL);
					}
				}
			}else {
				$SQL = "DELETE FROM $nm_tabel WHERE $id_tabel = '".$_GET['id']."'";
				mysqli_query($con,$SQL);
			}
			
			#delete folder path
			/*if(){
				unlink('path/to/file.jpg');
			}*/
			header("location:../home.php?page=".$redirect);
		}
	}
?>