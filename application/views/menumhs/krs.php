<?php 
$this->load->view('main12/header');
$this->load->view('main12/navbarmhs');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Keranjang KRS</h1>
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
              <?php if ($cart = $this->cart->contents()){ ?>
              <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>Ruang</th>
                    <th>Semester</th>
                    <th>Hari</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Akhir</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1; foreach ($cart as $item) : 
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['nd']; ?></td>
                    <td><?php echo $item['kode_ruang']; ?></td>
                    <td><?php echo $item['ns']; ?></td>
                    <td><?php echo $item['hari']; ?></td>
                    <td><?php echo $item['waktu_mulai']; ?></td>
                    <td><?php echo $item['waktu_akhir']; ?></td>
                    <td>
                      <a href="<?php echo base_url("C_menu2/hapus_cart/".$item['rowid']."/".$item['id']) ?>" class="btn btn-warning btn-sm">X Cancel</a></td>

                  </tr>
                  <?php $i++; endforeach; ?>
                  <tr>
                    <td colspan="10" align="right">
                      <!-- <a data-toggle="modal" data-target="#myModal"  class ='btn btn-sm btn-danger text-white'>Kosongkan Cart</a> -->
                      <a href="<?php echo base_url()?>C_menu2/check_out"  class ='btn btn-sm btn-primary'>Check Out</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- /.table-responsive -->
              <?php
            }
            else
            {
              echo "<h3>KRS masih kosong</h3>"; 
            } 
            ?>
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

<!-- Modal Penilai -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <!-- <form method="post" action="<echo base_url()?>C_menu2/hapus_cart/all"> -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
            Anda yakin ingin mengosongkan KRS Cart?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-sm btn-default">Ya</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--End Modal-->

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
