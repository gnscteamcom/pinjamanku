var base_url = 'home.php?page=';

function getIdApprove(id,act){
	$("#id_pinjaman").val(id);
}

function getIdConfirm(id,act){
	$("#id_pinjaman_trx").val(id);
	$.ajax({
        type: 'post',
        url: 'process/execute.php?type=get_data&act='+act,
        data: { id_pinjaman:id },
        success:function(data){
            var obj_result = jQuery.parseJSON(data);
           
            var id = obj_result.id;
            var nama = obj_result.nama;
            var sisa_tenor = obj_result.sisa_tenor;
            var tenorKe = obj_result.tenorKe;
            /*$('#jumlah_bayar').html('');
            $('#tgl_bayar').html('');*/

            $('#id_pinjaman_trx').val(id);
            $('#no_pinjam').val(nama);
            $('#sisa_tenor').val(sisa_tenor);
            $('#tenorKe').val(tenorKe);
        }
    });
}

function act(){
    var id_pinjaman = $('#id_pinjaman').val();
    var approveOpt = $('#approveOpt').val();
    $.ajax({
        type: 'post',
        url: 'process/execute.php?type=update&act=approve',
        data: { id_pinjaman:id_pinjaman, approveOpt:approveOpt },
        success:function(data){
          
            window.location.href = base_url+'pinjaman';
        }
    });
    $('.modalDetail').modal('hide');
}

function saveConfirmTrx(){
	var id_trx = $('#id_pinjaman_trx').val();
	var jumlah_bayar = $('#jumlah_bayar').val();
	var tgl_bayar = $('#tgl_bayar').val();
	var sisa_tenor = $('#sisa_tenor').val();
	var tenorKe = $('#tenorKe').val();
	$.ajax({
        type: 'post',
        url: 'process/execute.php?type=save&act=trx_pinjaman',
        data: { id_trx:id_trx, jumlah_bayar:jumlah_bayar,tgl_bayar:tgl_bayar,sisa_tenor:sisa_tenor,tenorKe:tenorKe },
        success:function(data){
          
            window.location.href = base_url+'pinjaman';
        }
    });
    //$('.modalDetail').modal('hide');
}

function dataUpdateAgt(id,act){
    $.ajax({
        method: 'POST',
        url: 'process/execute.php?type=get_data&act='+act,
        data : {id:id},
        success:function(data){
          
            var obj_result = jQuery.parseJSON(data);
            var id = obj_result.id;
            var nm_depan = obj_result.nm_depan;
            var email = obj_result.email;
            var no_telp = obj_result.no_telp;
            var alamat = obj_result.alamat;
            var provinsi = obj_result.provinsi;
            var kota = obj_result.kota;
           

            $('input[name="getIdagt"]').val(id);
            $('input[name="nm_depan"]').val(nm_depan);
            $('input[name="email_agt"]').val(email);
            $('input[name="alamat_agt"]').val(alamat);
            $('input[name="provinsi_agt"]').val(provinsi);
            $('input[name="kota_agt"]').val(kota);
            $('input[name="no_telepon"]').val(no_telp);
        }
    });
}

function updateAnggota(){
	var getIdagt = $('input[name="getIdagt"]').val();
    var nm_depan = $('input[name="nm_depan"]').val();
    var email_agt = $('input[name="email_agt"]').val();
    var alamat_agt = $('input[name="alamat_agt"]').val();
    var provinsi_agt = $('input[name="provinsi_agt"]').val();
    var kota_agt = $('input[name="kota_agt"]').val();
    var no_telepon = $('input[name="no_telepon"]').val();

    $.ajax({
        type: 'post',
        url: 'process/execute.php?type=update&act=updateAgt',
        data: { getIdagt:getIdagt, nm_depan:nm_depan,email_agt:email_agt,alamat_agt:alamat_agt,provinsi_agt:provinsi_agt,kota_agt:kota_agt,no_telepon:no_telepon },
        success:function(data){
           window.location.href = base_url+'anggota';
        }
    });
}

function addAdmin(){
    var nama_admin = $('input[name="nama_admin"]').val();
    var username = $('input[name="username_admin"]').val();
    var email_admin = $('input[name="email_admin"]').val();
    var password_admin = $('input[name="password_admin"]').val();
    var jenis_kelamin = $('#jenis_kelamin').val();
    var alamat_admin = $('#alamat_admin').val();

    if (nama_admin == "" || email_admin == "" || password_admin == "") {
    	alert("Maaf Data Mohon di Lengkapi");
    	return false;
    }

    $.ajax({
        type: 'post',
        url: 'process/execute.php?type=save&act=admin',
        data: { nama_admin:nama_admin, username:username,email_admin:email_admin,password_admin:password_admin,jenis_kelamin:jenis_kelamin,alamat_admin:alamat_admin },
        success:function(data){
          
            window.location.href = base_url+'admin';
        }
    });
}

function dataUpdateAdmin(id,act){
	$.ajax({
        method: 'POST',
        url: 'process/execute.php?type=get_data&act='+act,
        data : {id:id},
        success:function(data){
          
            var obj_result = jQuery.parseJSON(data);
            var id = obj_result.id;
            var username = obj_result.username;
            var email = obj_result.email;
            var password = obj_result.password;
            var alamat = obj_result.alamat;
            var nama_lengkap = obj_result.nama_lengkap;
            var jns_kel = obj_result.jns_kel;
           
			$('input[name="id_adminUp"]').val(id);
			$('input[name="username_adminUp"]').val(username);
			$('input[name="nama_adminUp"]').val(nama_lengkap);
			$('input[name="email_adminUp"]').val(email);
			$('input[name="password_adminUp"]').val(password);
			$('#jenis_kelaminUp').val(jns_kel);
			$('#alamat_adminUp').val(alamat);
        }
    });
}

function updateAdmin(){
	var id = $('input[name="id_adminUp"]').val();
	var username = $('input[name="username_adminUp"]').val();
	var nama = $('input[name="nama_adminUp"]').val();
	var email = $('input[name="email_adminUp"]').val();
	var password = $('input[name="password_adminUp"]').val();
	var jenis_kel = $('#jenis_kelaminUp').val();
	var alamat = $('#alamat_adminUp').val();

	$.ajax({
        type: 'post',
        url: 'process/execute.php?type=update&act=admin',
        data: { id:id, username:username,nama:nama,email:email,password:password,jenis_kel:jenis_kel,alamat:alamat },
        success:function(data){
            window.location.href = base_url+'admin';
        }
    });
}

function dataUpdateAgunan(id,act){
	$.ajax({
        method: 'POST',
        url: 'process/execute.php?type=get_data&act='+act,
        data : {id:id},
        success:function(data){
          
            var obj_result = jQuery.parseJSON(data);
            var id = obj_result.id;
            var jenis = obj_result.jenis;
            var judul = obj_result.judul;
            var deskripsi = obj_result.deskripsi;
           
			$('input[name="id_agunanUp"]').val(id);
			$('input[name="jenisUp"]').val(jenis);
			$('input[name="judulUp"]').val(judul);
			$('#deskripsiUp').val(deskripsi);
        }
    });
}

function updateAgunan(){
	var id = $('input[name="id_agunanUp"]').val();
	var jenis = $('input[name="jenisUp"]').val();
	var judul = $('input[name="judulUp"]').val();
	var deskripsi = $('#deskripsiUp').val();
	//var gambar = $('input[name="gambarUp"]').val();
	$.ajax({
        type: 'post',
        url: 'process/execute.php?type=update&act=agunan',
        data: { id:id, jenis:jenis,judul:judul,deskripsi:deskripsi },
        success:function(data){
            
            window.location.href = base_url+'agunan';
        }
    });
}

function addAgunan(){

	var jenis = $('input[name="jenis"]').val();
	var judul = $('input[name="judul"]').val();
	var deskripsi = $('#deskripsi').val();
	var gambar = $('input[name="gambar"]').val();
	$.ajax({
        type: 'post',
        url: 'process/execute.php?type=save&act=agunan',
        data: new FormData(this),//{ jenis:jenis,judul:judul,deskripsi:deskripsi, gambar:gambar },
        success:function(data){
            
            //window.location.href = base_url+'agunan';
        }
    });
}

function dataUpdateArtikel(id,act){
	$.ajax({
        method: 'POST',
        url: 'process/execute.php?type=get_data&act='+act,
        data : {id:id},
        success:function(data){
            var obj_result = jQuery.parseJSON(data);
            var id = obj_result.id;
            var judul = obj_result.judul;
            var isi = obj_result.isi;
            var deskripsi = obj_result.deskripsi;
			$('input[name="id_artikelUp"]').val(id);
			$('input[name="judulArtikelUp"]').val(judul);
			$('#isiArtikelUp').val(isi);
			$('#deskripsiArtikelUp').val(deskripsi);
        }
    });
}

function updateArtikel(){
	var id = $('input[name="id_artikelUp"]').val();
	var judul = $('input[name="judulArtikelUp"]').val();
	var isi = $('#isiArtikelUp').val();
	var deskripsi = $('#deskripsiArtikelUp').val();
	//var gambar = $('input[name="gambarUp"]').val();
	$.ajax({
        type: 'post',
        url: 'process/execute.php?type=update&act=artikel',
        data: { id:id, isi:isi,judul:judul,deskripsi:deskripsi },
        success:function(data){
        	window.location.href = base_url+'artikel';
        }
    });
}

function datadel(id,act,redirect,nm_tabel,id_tabel){
   document.getElementById('deleteData').href="process/execute.php?type=delete&act="+act+"&id="+id+"&redirect="+redirect+"&nm_tabel="+nm_tabel+"&id_tabel="+id_tabel;
}

function refresh(){
    window.location.reload(true);
}