<?php 
$this->load->view('main12/header');
$this->load->view('main12/navbardsn');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Ruang</h1>
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
            <!-- <h1 class="page-header" id="demo">Data Ruang</h1> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <!-- /.panel-heading -->
                <br><br>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kuota</th>
                                <th>Jurusan</th>
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

<?php 
$this->load->view('main12/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){  

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_ruang/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data : 'kode'},
             { data: 'nama' },
             { data: 'kuota' },
             { data: 'kode_jurusan' }
             ]
        });

        $('#btn_lihat').on('click',function(){
            var selected = $('#mySelect :selected').val();
            rownumber=0;
            tableajax.ajax.url("<?php echo base_url('C_ruang/getAjax/') ?>"+selected).load();
        });

    });

</script>

  </div>
</body>

</html>
