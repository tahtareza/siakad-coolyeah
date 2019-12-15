<?php 
$this->load->view('main12/header');
$this->load->view('main12/navbarmhs');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">KRS</h1>
        <hr>
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
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>Ruang</th>
                    <th>Tahun Ajaran</th>
                    <th>Hari</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Akhir</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($krs as $key) : ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                     <td><?php echo $key->mk; ?></td>
                    <td><?php echo $key->nd; ?></td>
                    <td><?php echo $key->nr; ?></td>
                    <td><?php echo $key->nt; ?></td>
                    <td><?php echo $key->jh; ?></td>
                    <td><?php echo $key->aw; ?></td>
                    <td><?php echo $key->ak; ?></td>
                    <td><?php echo $key->status; ?></td>

                  </tr>
                  <?php $i++; endforeach; ?>
                  </tr>
                </tbody>
              </table>
              <!-- /.table-responsive -->
          </form>

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
<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      responsive: true
    });

  });
</script>
</body>

</html>
