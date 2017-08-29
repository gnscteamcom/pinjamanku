<?php include 'header.php';?>

  <!-- <div id="main"> -->
    <!-- <div id="konten"> -->
              <!-- <div class="content"> -->
                <h1>Data Anggota </h1><br/>
                <!-- <a href="tambah_anggota.php"><input value="Tambah Anggota" class="btn" style="text-align: center; color: #000E6E;"/></a><br/>
                <a href="tambah_anggota.php"><input value="Form Pengajuan" class="btn" style="text-align: center; color: #000E6E;"/></a><br/> -->
                <!-- <div class="tabel"> -->
                  <table width="90%" align="center">
                        <tr style="background-color: #878787" align="center">
                          <td align="left">No</td>
                          <td align="left">Nama</td>
                          <td align="left">Jumlah Pinjaman</td>
                          <td align="left">Agunan</td>
                          <td align="left">Tenor</td>
                          <td align="left">Tanggal Pinjam</td>
                          <td>Aksi</td>
                        </tr>

                      <?php
                      $no = 1;
                      $SQL = "SELECT A.*, CONCAT(B.nm_depan,' ',B.nm_blkg) AS NAMA_ANGGOTA
                              FROM pinjaman A
                              LEFT JOIN anggota B ON A.id_agt = B.id_anggota
                              WHERE A.id_agt = '".$_SESSION['id_anggota']."'";
                      $pinjaman = $db->query($SQL);
                      while($p = $pinjaman->fetch_array()){
                      ?>
                      <tr style="background-color: #DEDEDE">
                          <!-- <td> -->
                              <!-- <a href="detail_pinjaman.php?id=<?php //echo $p['id_pinjaman']?>"><?php //echo $p['id_pinjaman']?></a> -->
                          <!-- </td> -->
                          <td><?php echo $no; ?></td>
                          <td><?php echo $p['NAMA_ANGGOTA'] ?></td>
                          <td><?php echo $p['jml_pinjaman'] ?></td>
                          <td><?php echo $p['agunan'] ?></td>
                          <td><?php echo $p['tenor'] ?> Bulan</td>
                          <td><?php echo date("d-m-Y",strtotime($p['waktu'])) ?></td>
                          <td align="center">
                              <a href="aksi_pnj.php?aksi=hapus&id=<?php echo $p['id_pinjaman'] ?>"><img src="image/delete.png" width="20" height="20"></a>
                          </td>

                      </tr>
                      <?php
                      $no++;
                      } ?>
                  </table><br/><br/>

<br>
  </div>
  </div>

<?php include 'footer.php';?>
