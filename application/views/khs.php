<?php 
$this->load->view('main/header');
$this->load->view('main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Mahasiswa KHS</h1>
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
            <!-- <h1 class="page-header" id="demo">Data Matakuliah</h1> -->
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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="mydata">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
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
                        <label class="control-label col-xs-3" >Kode</label>
                        <div class="col-xs-9">
                            <input name="kode_add" id="kode1" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_add" id="nama1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >SKS</label>
                        <div class="col-xs-9">
                            <input name="sks_add" id="sks1" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Semester</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_semester_add" id="kode_semester1">
                                <?php foreach ($semester as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jurusan</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_jurusan_add" id="kode_jurusan1">
                                <?php foreach ($jurusan as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-success" id="btn_simpan">Simpan</button>
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
                        <label class="control-label col-xs-3" >Kode</label>
                        <div class="col-xs-9">
                            <input name="kode_edit" id="kode2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_edit" id="nama2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >SKS</label>
                        <div class="col-xs-9">
                            <input name="sks_edit" id="sks2" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Semester</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_semester_edit" id="kode_semester2">
                                <?php foreach ($semester as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jurusan</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_jurusan_edit" id="kode_jurusan2">
                                <?php foreach ($jurusan as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
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

                    <input type="hidden" name="kode" id="textkode" value="">
                    <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" id="btn_hapus">Hapus</button>
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
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#mydata').DataTable({
            ajax: '<?php echo base_url("C_krs/getAjax") ?>',
            columns: [
            { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
            { data: 'nim'},
            { data: 'nama' },
            { data: 'kode_jurusan' },
            {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="<?php echo base_url("C_khs/detailkhs/'+row.nim+'"); ?>" class="btn btn-primary btn-sm item_detail">Detail</a>';
                return ret;
            }
            }            ]
        });

        $('#btn_lihat').on('click',function(){
            var x = document.getElementById("mySelect");
            var z = x.selectedIndex;
            
            var selected = $('#mySelect :selected').val();
            rownumber=0;
            tableajax.ajax.url("<?php echo base_url('C_krs/getAjax/') ?>"+selected).load();
        });

        // $('#btn_lihat').on('click',function(){
        //     var x = document.getElementById("mySelect");
        //     var z = x.selectedIndex;
        //     //document.getElementById("demo").innerHTML = x.options[i].text;
        
        //     var id = x.options[z].value;
        //     $.ajax({
        //         type : "GET",
        //         url  : "<echo base_url('C_ruang/whereRuangJurusan')?>",
        //         dataType : "JSON",
        //         data : {id:id},
        //         success: function(data){
        //             var html = '';
        //             var i, n=1;
        //             for(i=0; i<data.length; i++){
        //                 html += '<tr>'+
        //                 '<td>'+n+++'</td>'+
        //                 '<td>'+data[i].kode+'</td>'+
        //                 '<td>'+data[i].nama+'</td>'+
        //                 '<td>'+data[i].kuota+'</td>'+
        //                 '<td>'+data[i].kode_jurusan+'</td>'+
        //                 '<td style="text-align:left;">'+
        //                 '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+data[i].kode+'">Edit</a>'+' '+
        //                 '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+data[i].kode+'">Hapus</a>'+
        //                 '</td>'+
        //                 '</tr>';
        //             }
        //             $('#show_data').html(html);
        //         }
        //     });
        // });

        //fungsi tampil data
        // function tampil_data(){
        //     $.ajax({
        //         type  : 'ajax',
        //         url   : '<echo base_url("C_ruang/read") ?>',
        //         async : false,
        //         dataType : 'json',
        //         success : function(data){
        //             var html = '';
        //             var i, n=1;
        //             for(i=0; i<data.length; i++){
        //                 html += '<tr>'+
        //                 '<td>'+n+++'</td>'+
        //                 '<td>'+data[i].kode+'</td>'+
        //                 '<td>'+data[i].nama+'</td>'+
        //                 '<td>'+data[i].kuota+'</td>'+
        //                 '<td>'+data[i].jn+'</td>'+
        //                 '<td style="text-align:left;">'+
        //                 '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+data[i].kode+'">Edit</a>'+' '+
        //                 '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+data[i].kode+'">Hapus</a>'+
        //                 '</td>'+
        //                 '</tr>';
        //             }
        //             $('#show_data').html(html);
        //         }

        //     });
        // }

        //Add Barang
        $('#btn_simpan').on('click',function(){
            var kode=$('#kode1').val();
            var nama=$('#nama1').val();
            var sks=$('#sks1').val();
            var kode_semester=$('#kode_semester1').val();
            var kode_jurusan=$('#kode_jurusan1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_matakuliah/add')?>",
                dataType : "JSON",
                data : {kode:kode , nama:nama, sks:sks, kode_semester:kode_semester, kode_jurusan:kode_jurusan},
                success: function(data){
                    $('[name="kode_add"]').val("");
                    $('[name="nama_add"]').val("");
                    $('[name="sks_add"]').val("");
                    $('[name="kode_semester_add"]').val("");
                    $('[name="kode_jurusan_add"]').val("");
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
                url  : "<?php echo base_url('C_matakuliah/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(kode, nama, sks, kode_semester, kode_jurusan){
                        $('#ModalUpdate').modal('show');
                        $('[name="kode_edit"]').val(data.kode);
                        $('[name="nama_edit"]').val(data.nama);
                        $('[name="sks_edit"]').val(data.sks);
                        $('[name="kode_semester_edit"]').val(data.kode_semester);
                        $('[name="kode_jurusan_edit"]').val(data.kode_jurusan);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var kode=$('#kode2').val();
            var nama=$('#nama2').val();
            var sks=$('#sks2').val();
            var kode_semester=$('#kode_semester2').val();
            var kode_jurusan=$('#kode_jurusan2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_matakuliah/update')?>",
                dataType : "JSON",
                data : {kode:kode, nama:nama, sks:sks, kode_semester:kode_semester, kode_jurusan:kode_jurusan},
                success: function(data){
                    $('[name="kode_edit"]').val("");
                    $('[name="nama_edit"]').val("");
                    $('[name="sks_edit"]').val("");
                    $('[name="kode_semester_edit"]').val("");
                    $('[name="kode_jurusan_edit"]').val("");
                    $('#ModalUpdate').modal('hide');
                    // tampil_data();
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
            $('[name="kode"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_matakuliah/delete')?>",
                dataType : "JSON",
                data : {kode: kode},
                success: function(data){
                    $('#ModalDelete').modal('hide');
                    // tampil_data();
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
