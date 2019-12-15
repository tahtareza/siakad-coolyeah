<?php 
$this->load->view('main/header');
$this->load->view('main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Dosen</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Pilih Jurusan</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="kode_jurusan" id="mySelect" class="form-control">
                                <?php foreach($jurusan as $jrs) : ?>
                                    <option value="<?php echo $jrs->kode; ?>"><?php echo $jrs->nama; ?></option>
                                <?php endforeach; ?>
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
            <!-- <h1 class="page-header" id="demo">Data dosen</h1> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="mydata">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Matakuliah</th>
                                <th>Jurusan</th>
                                <th>Foto</th>
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


<!-- <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div> -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<!-- MODAL ADD -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success text-white">
                <h3 class="modal-title" id="exampleModalLabel">Add Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart("C_dosen/add"); ?>
                <?php echo validation_errors(); ?>
                <div class="form-group row">
                    <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                    <div class="col-sm-8">
                        <input type="text" name="nip" class="form-control" required="" id="nip">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" required="" id="nama" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-xs-3">
                        <input name="jk" id="jk" type="radio" value="L" checked=""> Laki-laki
                    </div>
                    <div class="col-xs-3">
                        <input name="jk" id="jk" type="radio" value="P"> Perempuan
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required="" id="alamat" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_matkul" class="col-sm-4 col-form-label">Matakuliah</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="kode_matkul" id="kode_matkul">
                            <?php foreach ($matakuliah as $key => $value): ?>
                                <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="kode_jurusan" id="kode_jurusan">
                            <?php foreach ($jurusan as $key => $value): ?>
                                <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto" class="form-control" id="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" value="Add" class="btn btn-success">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



<?php 
$this->load->view('main/footer');
?>

<script type="text/javascript">
  $(document).ready(function(){

    var rownumber = 0;
    var tableajax = $('#mydata').DataTable({
        responsive: true,
        ajax: '<?php echo base_url("C_dosen/getAjax") ?>',
        columns: [
        { 
            data: null,
            render: function(data,type,row){
                rownumber++;
                return rownumber;
            }
        },
        { data: 'nip'},
        { data: 'nama' },
        { data: 'jk' },
        { data: 'alamat' },
        { data: 'kode_matkul' },
        { data: 'kode_jurusan' },
        {
            data: null,
            render: function (data, type, row) {
                return '<img src="<?php echo base_url() ?>foto/'+row.foto+'" height="100px" width="100px">';
            }
        },
        {
          data: null,
          render: function ( data, type, row ) {
            var ret = '<a href="<?php echo base_url()?>C_dosen/loadEdit/'+row.nip+'" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#ModalUpdate">Update</a>';
            ret+= '<a href="<?php echo base_url()?>C_dosen/loadDelete/'+row.nip+'" class="btn btn-danger btn-sm item_hapus" data-toggle="modal" data-target="#ModalDelete">Delete</a>';
            return ret;
            }
        }]
    });

    $('#btn_lihat').on('click',function(){
        var selected = $('#mySelect :selected').val();
        rownumber=0;
        tableajax.ajax.url("<?php echo base_url('C_dosen/getAjax/') ?>"+selected).load();
    });
    
    $('#ModalAdd').on('show.bs.modal', function (event) {
        var modal = $(this)
    });

    $('#show_data').on('click','.item_edit',function(){
        var url=$(this).attr('href');
        $.ajax({
            url  : url,
            success:function(response){
                $('#ModalUpdate').html(response);
            }
        });
    });

    $('#show_data').on('click','.item_hapus',function(){
        var url=$(this).attr('href');
        $.ajax({
            url  : url,
            success:function(response){
                $('#ModalDelete').html(response);
            }
        });
    });

});
</script>

</body>

</html>
