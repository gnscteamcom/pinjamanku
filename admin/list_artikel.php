
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Artikel</h3>
            </div>
            <div align="right" class="panel-body">
                <!-- <a href="#" id="addNetwork" class="btn btn-primary" data-toggle="modal" data-target="#modal">Add Network</a> glyphicon-refresh-->
                <button class="btn btn-primary btn-sm" onclick="refresh()">
                    <span class='glyphicon glyphicon-refresh'></span>
                </button> 
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddArtikel">
                    Add Artikel&nbsp;<span class='glyphicon glyphicon-plus'></span>
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $qu=mysqli_query($con,"SELECT * FROM artikel");
                            while($has=mysqli_fetch_assoc($qu))
                            {
                                echo "
                                <tr>
                                    <td>$has[judul]</td>
                                    <td>$has[isi]</td>
                                    <td>$has[deskripsi]</td>
                                    <td style='text-align:center'>

                                    <span data-placement='top' data-toggle='tooltip' title='Update'><button onclick='dataUpdateArtikel($has[id_artikel],&#39;getArtikel&#39;)' class='btn btn-primary btn-xs' data-title='Update' data-toggle='modal' data-target='#modalUpArtikel' ><span class='glyphicon glyphicon-pencil'></span></button><span>

                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel($has[id_artikel],&#39deleteData&#39;,&#39;artikel&#39;,&#39;artikel&#39;,&#39;id_artikel&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#modalDel' ><span class='glyphicon glyphicon-trash'></span></button><span>
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
<div class="modal fade modalDetail" id="modalAddArtikel" tabindex="-1" role="dialog" 
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
                    Add Artikel
                </h4>
            </div>
            <!-- Modal Body -->
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_agunanUp" id="id_agunanUp" placeholder=""/>
                        <div class="form-group">
                        <div class="form-group">
                            <label for="judulArtikel">Judul</label>
                            <input type="text" name="judulArtikel" id="judulArtikel" class="form-control">
                            <!-- <textarea class="form-control" name="judulArtikel" id="judulArtikel" cols="10" rows="3"></textarea> -->
                        </div>
                            <label for="isiArtikel">Isi</label>
                            <textarea class="form-control" name="isiArtikel" id="isiArtikel" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deskripsiArtikel">Deskrispi</label>
                            <textarea class="form-control" name="deskripsiArtikel" id="deskripsiArtikel" cols="30" rows="10"></textarea>
                        </div>
                       <div class="form-group">
                           <label for="gambarArtikel">Gambar</label>
                           <input type="file" name="gambarArtikel" id="gambarArtikel" class="form-control">
                       </div>
                </div>
                
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <input type="submit" class="btn btn-primary" name="saveArtikel" value="Save">
                    <!-- <button type="button" id="saveNetwork" onclick="addArtikel()" class="btn btn-primary">
                        Save
                    </button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade modalUpdate" id="modalUpArtikel" tabindex="-1" role="dialog" 
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
                    Update Artikel
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                    <input type="hidden" class="form-control" name="id_artikelUp" id="id_artikelUp" placeholder=""/>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="judulArtikelUp">Judul</label>
                        <input type="text" name="judulArtikelUp" id="judulArtikelUp" class="form-control">
                        <!-- <textarea class="form-control" name="judulArtikelUp" id="judulArtikelUp" cols="10" rows="3"></textarea> -->
                    </div>
                        <label for="isiArtikelUp">Isi</label>
                        <textarea class="form-control" name="isiArtikelUp" id="isiArtikelUp" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deskripsiArtikelUp">Deskrispi</label>
                        <textarea class="form-control" name="deskripsiArtikelUp" id="deskripsiArtikelUp" cols="30" rows="10"></textarea>
                    </div>
                   <!--  <div class="form-group">
                       <label for="gambarUp">Gambar</label>
                       <input type="file" name="gambarUp" id="gambarUp" class="form-control">
                   </div> -->
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" onclick="updateArtikel()" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>

<?php 
    if (isset($_POST['saveArtikel'])) {
        $isi = $_POST['isiArtikel'];
        $judul = $_POST['judulArtikel'];
        $deskripsi = $_POST['deskripsiArtikel'];
        $file_name      = $_FILES["gambarArtikel"]["name"];
        $temp_name      = $_FILES["gambarArtikel"]["tmp_name"];
        $imgtype        = $_FILES["gambarArtikel"]["type"];
        $ext            = pathinfo($file_name, PATHINFO_EXTENSION); 

        $imagename      = date("d-m-Y") . "-" . time() . "." . $ext;
        $target_path    = "uploads/artikel/".$imagename;

        if(move_uploaded_file($temp_name, $target_path)) {  
            $SQL = "INSERT INTO artikel VALUES('','".$judul."','".$isi."','".$deskripsi."','".$target_path."','".date('Y-m-d H:i:d')."')";
            mysqli_query($con,$SQL) or die("error in $SQL == ----> ".mysqli_error());
            echo "<meta http-equiv='refresh' content='0'>";
            //header("location:../home.php?page=agunan");
        }else{      
            exit("Error While uploading image on the server");
        }
    }
?>