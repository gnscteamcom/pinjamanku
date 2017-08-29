<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> -->

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Anggota</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $qu=mysqli_query($con,"SELECT * FROM anggota");
                            while($has=mysqli_fetch_assoc($qu))
                            {
                                echo "
                                <tr>
                                    <td>$has[nm_depan] $has[nm_blkg]</td>
                                    <td>$has[email]</td>
                                    <td>$has[no_telp] / $has[no_telp_lain]</td>
                                    <td style='text-align:center'>

                                    <span data-placement='top' data-toggle='tooltip' title='Update'><button onclick='dataUpdateAgt($has[id_anggota],&#39;dataUpdateAgt&#39;)' class='btn btn-primary btn-xs' data-title='Update' data-toggle='modal' data-target='#modalUpNetwork' ><span class='glyphicon glyphicon-pencil'></span></button><span>

                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel($has[id_anggota],&#39;deleteData&#39;,&#39;anggota&#39;,&#39;anggota&#39;,&#39;id_anggota&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#modalDel' ><span class='glyphicon glyphicon-trash'></span></button><span>
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
                <a id="deleteData" href=""><button type="button" class="btn btn-primary">Delete Data</button></a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.row -->
<!-- Modal -->

<div class="modal fade modalUpdate" id="modalUpNetwork" tabindex="-1" role="dialog" 
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
                    Update Anggota
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                  <div class="form-group">
                   <!--  <label for="network_id">Network ID</label> -->
                   <input type="hidden" name="id_net">
                      <input type="hidden" class="form-control"
                          id="getIdagt" name="getIdagt" value="<?php //echo $networkid; ?>" readonly placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="nm_depan">Nama</label>
                    <input type="text" name="nm_depan" class="form-control" id="deleteData" value="" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="email_agt">Email</label>
                    <input type="text" class="form-control" name="email_agt" id="email_agt" value="" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="no_telepon">No. Telepon</label>
                    <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="alamat_agt">Alamat</label>
                    <input type="text" class="form-control" name="alamat_agt" id="alamat_agt" value="" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="provinsi_agt">Provinsi</label>
                    <input type="text" class="form-control" name="provinsi_agt" id="provinsi_agt" value="" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="kota_agt">Kota</label>
                    <input type="text" class="form-control" name="kota_agt" id="kota_agt" value="" placeholder=""/>
                  </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" onclick="updateAnggota()" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
