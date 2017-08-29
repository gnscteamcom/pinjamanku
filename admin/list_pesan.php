<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pesan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Isi Pesan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $qu=mysqli_query($con,"SELECT * FROM pesan");
                            while($has=mysqli_fetch_assoc($qu))
                            {
                                echo "
                                <tr>
                                    <td>$has[nama]</td>
                                    <td>$has[email]</td>
                                    <td>$has[isi_pesan]</td>
                                    <td style='text-align:center'>

                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel($has[id_pesan],&#39;deleteData&#39;,&#39;pesan&#39;,&#39;pesan&#39;,&#39;id_pesan&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#modalDel' ><span class='glyphicon glyphicon-trash'></span></button><span>
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