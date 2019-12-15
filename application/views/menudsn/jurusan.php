<?php 
$this->load->view('main12/header');
$this->load->view('main12/navbardsn');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Data Jurusan</h1>
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
          <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Nama</th>
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
        //pemanggilan fungsi tampil data
        tampil_data(); 

        $('#myTable').DataTable( {
          responsive: true
        } );

        //fungsi tampil data
        function tampil_data(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url("C_jurusan/read") ?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i, n=1;
              for(i=0; i<data.length; i++){
                html += '<tr>'+
                '<td>'+n+++'</td>'+
                '<td>'+data[i].kode+'</td>'+
                '<td>'+data[i].nama+'</td>'+
                '</tr>';
              }
              $('#show_data').html(html);
            }

          });
        }

      });

    </script>

  </div>
</body>

</html>
