<?php 
$this->load->view('main/header');
$this->load->view('main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Akun</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Pilih Level</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="" id="mySelect" class="form-control">
                                <option>****** Select ******</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-sm btn-block btn-warning" id="btn_lihat">Lihat Data</button>
                            <!-- onclick="myFunction()" -->
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <!-- <h1 class="page-header" id="demo">Data Akun</h1> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Add</a> -->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!-- /#wrapper -->

<!-- MODAL ADD -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Add Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="uname_add" id="uname1" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="pwd_add" id="pwd1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="level_add" id="level1">
                                <?php foreach ($akun as $key => $value): ?>
                                    <option value="<?php echo $value->level ?>"><?php echo $value->level ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-success" id="btn_simpan">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Update Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="uname_edit" id="uname2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="pwd_edit" id="pwd2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="level_edit" id="level2">
                                <?php foreach ($akun as $key => $value): ?>
                                    <option value="<?php echo $value->level ?>"><?php echo $value->level ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL EDIT-->

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="uname" id="textuname" value="">
                    <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" id="btn_hapus">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL HAPUS-->

<?php 
$this->load->view('main/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){ 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
        	responsive: true,
            ajax: '<?php echo base_url("C_akun/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data : 'uname'},
             { data: 'pwd' },
             { data: 'level' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.uname+'">Update</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.uname+'">Delete</a>';
                return ret;
               }
             }
             ]
        });

        $('#btn_lihat').on('click',function(){
            var selected = $('#mySelect :selected').val();
            rownumber=0;
            tableajax.ajax.url("<?php echo base_url('C_akun/getAjax/') ?>"+selected).load();
        });

        //Add Barang
        $('#btn_simpan').on('click',function(){
            var uname=$('#uname1').val();
            var pwd=$('#pwd1').val();
            var level=$('#level1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_akun/add')?>",
                dataType : "JSON",
                data : {uname:uname , pwd:pwd, level:level},
                success: function(data){
                    $('[name="uname_add"]').val("");
                    $('[name="pwd_add"]').val("");
                    $('[name="level_add"]').val("");
                    $('#ModalAdd').modal('hide');
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_akun/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(uname, pwd, level){
                        $('#ModalUpdate').modal('show');
                        $('[name="uname_edit"]').val(data.uname);
                        $('[name="pwd_edit"]').val(data.pwd);
                        $('[name="level_edit"]').val(data.level);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var uname=$('#uname2').val();
            var pwd=$('#pwd2').val();
            var level=$('#level2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_akun/update')?>",
                dataType : "JSON",
                data : {uname:uname , pwd:pwd, level:level},
                success: function(data){
                    $('[name="uname_edit"]').val("");
                    $('[name="pwd_edit"]').val("");
                    $('[name="level_edit"]').val("");
                    $('#ModalUpdate').modal('hide');
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });


        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalDelete').modal('show');
            $('[name="uname"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var uname=$('#textuname').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_akun/delete')?>",
                dataType : "JSON",
                data : {uname: uname},
                success: function(data){
                    $('#ModalDelete').modal('hide');
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });

    });

</script>

</body>

</html>
