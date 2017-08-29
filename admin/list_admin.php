<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Admin</h3>
            </div>
            <div align="right" class="panel-body">
                <!-- <a href="#" id="addNetwork" class="btn btn-primary" data-toggle="modal" data-target="#modal">Add Network</a> glyphicon-refresh-->
                <button class="btn btn-primary btn-sm" onclick="refresh()">
                    <span class='glyphicon glyphicon-refresh'></span>
                </button> 
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalNetwork">
                    Add Admin&nbsp;<span class='glyphicon glyphicon-plus'></span>
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $qu=mysqli_query($con,"SELECT * FROM admin");
                            while($has=mysqli_fetch_assoc($qu))
                            {
                                echo "
                                <tr>
                                    <td>$has[username]</td>
                                    <td>$has[email]</td>
                                    <td>$has[jns_kel]</td>
                                    <td style='text-align:center'>

                                    <span data-placement='top' data-toggle='tooltip' title='Update'><button onclick='dataUpdateAdmin($has[id_admin],&#39;getAdmin&#39;)' class='btn btn-primary btn-xs' data-title='Update' data-toggle='modal' data-target='#modalUpAdmin' ><span class='glyphicon glyphicon-pencil'></span></button><span>

                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel($has[id_admin],&#39;deleteData&#39;,&#39;admin&#39;,&#39;admin&#39;,&#39;id_admin&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#modalDel' ><span class='glyphicon glyphicon-trash'></span></button><span>
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
<div class="modal fade modalDetail" id="modalNetwork" tabindex="-1" role="dialog" 
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
                    Add Admin
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                    <div class="form-group">
                        <label for="nama_admin">Nama</label>
                        <input type="text" class="form-control" name="nama_admin" id="nama_admin" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="username_admin">Username</label>
                        <input type="text" class="form-control" name="username_admin" id="username_admin" value="" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="email_admin">Email</label>
                        <input type="text" class="form-control" name="email_admin" id="email_admin" value="" placeholder="" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="password_admin">Password</label>
                        <input type="text" class="form-control" name="password_admin" id="password_admin" required="required" value="" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required">
                            <option value="">--PILIH--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_admin">Alamat</label>
                        <textarea class="form-control" name="alamat_admin" id="alamat_admin" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" id="saveNetwork" onclick="addAdmin()" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalUpdate" id="modalUpAdmin" tabindex="-1" role="dialog" 
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
                    Update Admin
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                    <input type="hidden" class="form-control" name="id_adminUp" id="id_adminUp" placeholder=""/>
                    <div class="form-group">
                        <label for="nama_adminUp">Nama</label>
                        <input type="text" class="form-control" name="nama_adminUp" id="nama_adminUp" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="username_adminUp">Username</label>
                        <input type="text" class="form-control" name="username_adminUp" id="username_adminUp" value="" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="email_adminUp">Email</label>
                        <input type="text" class="form-control" name="email_adminUp" id="email_adminUp" value="" placeholder="" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="password_adminUp">Password</label>
                        <input type="text" class="form-control" name="password_adminUp" id="password_adminUp" required="required" value="" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelaminUp">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelaminUp" id="jenis_kelaminUp" required="required">
                            <option value="">--PILIH--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_adminUp">Alamat</label>
                        <textarea class="form-control" name="alamat_adminUp" id="alamat_adminUp" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" onclick="updateAdmin()" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
