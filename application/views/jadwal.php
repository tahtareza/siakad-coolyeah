<?php 
    $this->load->view('main/header');
    $this->load->view('main/navbar');
 ?>

<div id="page-wrapper">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Penawaran Jadwal</h1>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Add</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="mydata">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nip</th>
                                <th>MatKul</th>
                                <th>Ruang</th>
                                <th>Kuota</th>
                                <th>Semester</th>
                                <th>Tahun Ajaran</th>
                                <th>Hari</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
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
                        <label class="control-label col-xs-3" >Nip</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="nip_add" id="nip1">
                                <?php foreach ($dosen as $key => $value): ?>
                                    <option value="<?php echo $value->nip ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ruang</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_ruang_add" id="kode_ruang1">
                                <?php foreach ($ruang as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-9">
                            <input name="kuota_add" id="kuota1" class="form-control" type="hidden" required>
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
                        <label class="control-label col-xs-3" >Tahun Ajaran</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_ta_add" id="kode_ta1">
                                <?php foreach ($tahun_ajar as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                     
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Hari</label>
                        <div class="col-xs-9">
                            <input name="hari_add" id="hari1" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Mulai</label>
                        <div class="col-xs-9">
                            <input name="waktu_mulai_add" id="waktu_mulai1" class="form-control" type="time" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Akhir</label>
                        <div class="col-xs-9">
                            <input name="waktu_akhir_add" id="waktu_akhir1" class="form-control" type="time" required>
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
                        <label class="control-label col-xs-3" >Nip</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="nip_edit" id="nip2">
                                <?php foreach ($dosen as $key => $value): ?>
                                    <option value="<?php echo $value->nip ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ruang</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_ruang_edit" id="kode_ruang2">
                                <?php foreach ($ruang as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
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
                        <label class="control-label col-xs-3" >Tahun Ajaran</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kode_ta_edit" id="kode_ta2">
                                <?php foreach ($tahun_ajar as $key => $value): ?>
                                    <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                     
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Hari</label>
                        <div class="col-xs-9">
                            <input name="hari_edit" id="hari2" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Mulai</label>
                        <div class="col-xs-9">
                            <input name="waktu_mulai_edit" id="waktu_mulai2" class="form-control" type="time" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Akhir</label>
                        <div class="col-xs-9">
                            <input name="waktu_akhir_edit" id="waktu_akhir2" class="form-control" type="time" required>
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
        //pemanggilan fungsi tampil data
        var rownumber = 0;
        var tableajax = $('#mydata').DataTable({
            ajax: '<?php echo base_url("C_jadwal/getAjax") ?>',
            columns: [
            { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
            { data : 'kode'},
            { data: 'nip' },
            { data: 'mk' },
            { data: 'kode_ruang' },
            { data: 'kuota' },
            { data: 'ns' },
            { data: 'nt' },
            { data: 'hari' },
            { data: 'waktu_mulai' },
            { data: 'waktu_akhir' },
            {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.kode+'">Edit</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.kode+'">Hapus</a>';
                return ret;
            }
            }            ]
        });

        $('#btn_lihat').on('click',function(){
            var x = document.getElementById("mySelect");
            var z = x.selectedIndex;
            
            var selected = $('#mySelect :selected').val();
            rownumber=0;
            tableajax.ajax.url("<?php echo base_url('C_jadwal/getAjax/') ?>"+selected).load();
        });

        //Add Barang
        $('#btn_simpan').on('click',function(){
            var kode=$('#kode1').val();
            var nip=$('#nip1').val();
            var kode_ruang=$('#kode_ruang1').val();
            var kuota=$('#kuota1').val();
            var kode_semester=$('#kode_semester1').val();
            var kode_ta=$('#kode_ta1').val();
            var hari=$('#hari1').val();
            var waktu_mulai=$('#waktu_mulai1').val();
            var waktu_akhir=$('#waktu_akhir1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_jadwal/add')?>",
                dataType : "JSON",
                data : {kode:kode , nip:nip, kode_ruang:kode_ruang, kuota:kuota, kode_semester:kode_semester, kode_ta:kode_ta , hari:hari, waktu_mulai:waktu_mulai, waktu_akhir:waktu_akhir},
                success: function(data){
                    $('[name="kode_add"]').val("");
                    $('[name="nip_add"]').val("");
                    $('[name="kode_ruang_add"]').val("");
                    $('[name="kuota_add"]').val("");
                    $('[name="kode_semester_add"]').val("");
                    $('[name="kode_ta_add"]').val("");
                    $('[name="hari_add"]').val("");
                    $('[name="waktu_mulai_add"]').val("");
                    $('[name="waktu_akhir_add"]').val("");
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
                url  : "<?php echo base_url('C_jadwal/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(kode, nip, kode_ruang, kode_semester, kode_ta, hari, waktu_mulai, waktu_akhir){
                        $('#ModalUpdate').modal('show');
                        $('[name="kode_edit"]').val(data.kode);
                        $('[name="nip_edit"]').val(data.nip);
                        $('[name="kode_ruang_edit"]').val(data.kode_ruang);
                        $('[name="kode_semester_edit"]').val(data.kode_semester);
                        $('[name="kode_ta_edit"]').val(data.kode_ta);
                        $('[name="hari_edit"]').val(data.hari);
                        $('[name="waktu_mulai_edit"]').val(data.waktu_mulai);
                        $('[name="waktu_akhir_edit"]').val(data.waktu_akhir);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var kode=$('#kode2').val();
            var nip=$('#nip2').val();
            var kode_ruang=$('#kode_ruang2').val();
            var kode_semester=$('#kode_semester2').val();
            var kode_ta=$('#kode_ta2').val();
            var hari=$('#hari2').val();
            var waktu_mulai=$('#waktu_mulai2').val();
            var waktu_akhir=$('#waktu_akhir2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_jadwal/update')?>",
                dataType : "JSON",
                data : {kode:kode , nip:nip, kode_ruang:kode_ruang , kode_semester:kode_semester, kode_ta:kode_ta , hari:hari, waktu_mulai:waktu_mulai , waktu_akhir:waktu_akhir},
                success: function(data){
                    $('[name="kode_edit"]').val("");
                    $('[name="nip_edit"]').val("");
                    $('[name="kode_ruang_edit"]').val("");
                    $('[name="kode_semester_edit"]').val("");
                    $('[name="kode_ta_edit"]').val("");
                    $('[name="hari_edit"]').val("");
                    $('[name="waktu_mulai_edit"]').val("");
                    $('[name="waktu_akhir_edit"]').val("");
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
            $('[name="kode"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_jadwal/delete')?>",
                dataType : "JSON",
                data : {kode: kode},
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

