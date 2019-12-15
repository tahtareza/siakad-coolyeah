<?php 
$this->load->view('main12/header');
$this->load->view('main12/navbardsn');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Nilai Mahasiswa</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <hr>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Pilih Jadwal</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <select name="kode_jurusan" id="mySelect" class="form-control">
                                <?php foreach($jadwal as $j) : ?>
                                    <option value="<?php echo $j->kode; ?>">(<?php echo $j->nt; ?>) - <?php echo $j->kode; ?> / <?php echo $j->hari; ?> (<?php echo $j->waktu_mulai; echo "-"; echo $j->waktu_akhir; ?>)</option>
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

    <hr>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <!-- /.panel-heading -->
                <br><br>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="mydata">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jadwal</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tahun Ajar</th>
                                <th>Nilai</th>
                                <th>Update</th>
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
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- MODAL EDIT -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info">
              <h3 class="modal-title" id="myModalLabel">Update Nilai</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
          <div class="form-group">
                        <label class="control-label col-xs-3" >NIM</label>
                        <div class="col-xs-9">
                            <input name="nim_edit" id="nim2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_edit" id="nama2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nilai</label>
                        <div class="col-xs-9">
                            <input name="nilai_edit" id="nilai2" class="form-control" type="number">
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


<?php 
$this->load->view('main12/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){
        var rownumber = 0;
        var tableajax = $('#mydata').DataTable({
            responsive: true,
            ajax: '<?php echo base_url("C_khs/getAjax") ?>',
            columns: [
            { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data : 'jd'},
             { data : 'nim'},
            { data: 'nm' },
            { data: 'nt' },
            { data: 'nilai' },
            {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.nim+'">Update</a>';
                return ret;
               }
             }
            ]
        });

        $('#btn_lihat').on('click',function(){
            var selected = $('#mySelect :selected').val();
            rownumber=0;
            tableajax.ajax.url("<?php echo base_url('C_khs/getAjax/') ?>"+selected).load();
        });

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_khs/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(nim, nama, nilai){
                        $('#ModalUpdate').modal('show');
                        $('[name="nim_edit"]').val(data.nim);
                        $('[name="nama_edit"]').val(data.nama);
                        $('[name="nilai_edit"]').val(data.nilai);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var nim=$('#nim2').val();
            var nilai=$('#nilai2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_khs/update')?>",
                dataType : "JSON",
                data : {nim:nim , nilai:nilai},
                success: function(data){
                    $('[name="nim_edit"]').val("");
                    $('[name="nilai_edit"]').val("");
                    $('#ModalUpdate').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });


    });

</script>

  </div>
</body>

</html>
