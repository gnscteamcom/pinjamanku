<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> -->
<script>
    

    /*function actUpNetwork(){
        var network_id = $('#network_id_update').val();
        var network_name = $('#network_name_update').val();
        var postbackurl = $('#postbackurl_update').val();
        $.ajax({
            type: 'post',
            url: 'process/update_network.php?data=update_network',
            data: { network_id:network_id, network_name:network_name, postbackurl:postbackurl },
            success:function(data){
                console.log(data);
                window.location.href = 'home.php?page=list_network';
            }
        });
        $('.modalDetail').modal('hide');
    }*/

    function refresh(){
        window.location.reload(true);
    }
</script>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pinjaman</h3>
            </div>
            <div align="right" class="panel-body">
                <!-- <a href="#" id="addNetwork" class="btn btn-primary" data-toggle="modal" data-target="#modal">Add Network</a> glyphicon-refresh-->
                <!-- <button class="btn btn-primary btn-sm" onclick="refresh()">
                    <span class='glyphicon glyphicon-refresh'></span>
                </button> -->
                <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalConfirm">
                    Konfirmas Pembayaran&nbsp;<span class='glyphicon glyphicon-plus'></span>
                </button>  -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Penghasilan Per Bulan</th>
                            <th>Pekerjaan</th>
                            <th>Agunan</th>
                            <th>Tenor</th>
                            <th>Angsuran Per Bulan</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $SQL = "SELECT A.*, CONCAT(B.nm_depan,' ',B.nm_blkg) AS NAMA_ANGGOTA, C.keterangan
                                    FROM pinjaman A
                                    LEFT JOIN anggota B ON A.id_agt = B.id_anggota
                                    LEFT JOIN reff_status C ON A.`status` = C.id";
                            $qu=mysqli_query($con,$SQL);
                            while($has=mysqli_fetch_assoc($qu))
                            {
                                $penghasilan = 'Rp. '.number_format($has['penghasilan'], 2, '.', ',');
                                $jml_pinjaman = 'Rp. '.number_format($has['jml_pinjaman'], 2, '.', ',');

                                $hitungangsuranperbulan = $has['jml_pinjaman'] / $has['tenor'];
                                $angsuranperbulan = 'Rp. '.number_format($hitungangsuranperbulan, 2, '.', ',');

                                if (!empty($has['keterangan'])) {
                                    if ($has['status'] == 1) {
                                        $statusApprove = "<span class='label label-success'>".$has['keterangan']."</span>";
                                    }elseif($has['status'] == 2){
                                        $statusApprove = "<span class='label label-warning'>".$has['keterangan']."</span>";
                                    }elseif($has['status'] == 3){
                                        $statusApprove = "<span class='label label-danger'>".$has['keterangan']."</span>";
                                    }else{
                                        $statusApprove = "<span class='label label-primary'>".$has['keterangan']."</span>";
                                    }
                                    //$statusApprove = $has['keterangan'];
                                }else{
                                    //$statusApprove = "<span class='label label-danger'>".$has['keterangan']."</span>";
                                }

                                if ($has['status'] == 1) {
                                    $btnConfrmPembayaran = "
                                        <a href='#' onclick='getIdConfirm(&#39;$has[id_pinjaman]&#39;,&#39;getIdConfirm&#39;)' class='btn btn-danger btn-xs' data-title='Konfirmasi Pemabayaran' data-toggle='modal' data-target='#modalConfirm'><span data-placement='top' data-toggle='tooltip' title='Konfirmasi Pemabayaran'><span class='glyphicon glyphicon-plus'></span><span>
                                        </a>";
                                } else {
                                    $btnConfrmPembayaran = "";
                                }

                                echo "
                                <tr>
                                    <td>
                                        <a href='home.php?page=detail_pinjaman&id_pinjaman=$has[id_agt]'>
                                            $has[NAMA_ANGGOTA]
                                        </a>
                                    </td>
                                    <td>$jml_pinjaman</td>
                                    <td>$penghasilan</td>
                                    <td>$has[thn_bek], $has[tipe_pek], $has[stts_pek]</td>
                                    <td>$has[agunan]</td>
                                    <td>$has[tenor] Bulan</td>
                                    <td>$angsuranperbulan</td>
                                    <td>".date('d-m-Y',strtotime($has['waktu']))."</td>
                                    <td>$statusApprove</td>
                                    <td style='text-align:center'>

                                        <a href='#' onclick='getIdApprove(&#39;$has[id_pinjaman]&#39;,&#39;getIdApprove&#39;)' class='btn btn-success btn-xs' data-title='Approvel' data-toggle='modal' data-target='#modalApprove'><span data-placement='top' data-toggle='tooltip' title='Approvel'><span class='fa fa-info-circle'></span><span>
                                        </a>
                                        $btnConfrmPembayaran

                                    </td>
                                </tr>
                                ";
                            }
                       ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
<div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="mylink" href=""><button type="button" class="btn btn-primary">Delete Data</button></a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.row -->
<!-- Modal -->
<div class="modal fade modalDetail" id="modalApprove" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Approve
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                  <div class="form-group">
                   <!--  <label for="id_agt">Network ID</label> -->
                    <input type="hidden" class="form-control" id="id_pinjaman" value="" readonly placeholder="ID"/>
                  </div>
                  <div class="form-group">
                        <label for="approve">Aksi</label>
                        <select class="form-control" name="approveOpt" id="approveOpt">
                            <option value="">--PILIH--</option>
                            <?php 
                                $SQL = "SELECT * FROM reff_status";
                                $result = mysqli_query($con, $SQL);
                                while ($data = mysqli_fetch_assoc($result)) {
                                    echo "<option value=\"$data[id]\">$data[keterangan]</option>";
                                }
                            ?>
                        </select>
                  </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" id="saveNetwork" onclick="act()" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalUpdate" id="modalConfirm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Konfirmasi Pembayaran
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                  <div class="form-group">
                   <!--  <label for="network_id">Network ID</label> -->
                      <input type="hidden" class="form-control"
                          id="id_pinjaman_trx" name="id_pinjaman_trx" value="<?php //echo $networkid; ?>" readonly placeholder="ID"/>
                        <input type="hidden" class="form-control"
                          id="tenorKe" name="tenorKe" value="<?php //echo $networkid; ?>" readonly placeholder="ID"/>
                  </div>
                  <div class="form-group">
                    <label for="network_name">No. Pinjaman/Nama</label>
                    <input type="text" name="no_pinjam" class="form-control" readonly="readonly" id="no_pinjam" value="<?php  ?>" placeholder=""/>
                  </div>
                  <div class="form-group">
                        <label for="jumlah_bayar">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" value="<?php //echo generateRandomString(); ?>" placeholder=""/>
                  </div>
                  <div class="form-group">
                        <label for="tgl_bayar">Tanggal Bayar</label>
                        <input type="text" class="form-control datepicker2" name="tgl_bayar" id="tgl_bayar" value="<?php //echo generateRandomString(); ?>" placeholder=""/>
                  </div>
                  <div class="form-group">
                        <label for="sisa_tenor">Sisa Tenor</label>
                        <input type="text" class="form-control" name="sisa_tenor" readonly="readonly" id="sisa_tenor" value="<?php //echo generateRandomString(); ?>" placeholder=""/>
                  </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" onclick="saveConfirmTrx()" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    $('.datepicker2').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true,
    });

    $(".modal").on("hidden.bs.modal", function(){
        $('#jumlah_bayar').html('');
        $('#tgl_bayar').html('');
    });
</script>

