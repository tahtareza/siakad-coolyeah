<?php 
$this->load->view('main12/header');
$this->load->view('main12/navbarmhs');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Penawaran Jadwal (<?php echo $jurusan; ?>)</h1>
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
                  <th>Kode</th>
                  <th>Matakuliah</th>
                  <th>Dosen</th>
                  <th>Ruang</th>
                  <th>Semester</th>
                  <th>Hari</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Akhir</th>
                  <th>Kuota</th>
                  <th>Sisa</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($jadwal as $j) : 
                ?>
                
                  <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $j['kode']; ?></td>
                  <td><?php echo $j['mk']; ?></td>
                  <td><?php echo $j['nd']; ?></td>
                  <td><?php echo $j['kode_ruang']; ?></td>
                  <td><?php echo $j['ns']; ?></td>
                  <td><?php echo $j['hari']; ?></td>
                  <td><?php echo $j['waktu_mulai']; ?></td>
                  <td><?php echo $j['waktu_akhir']; ?></td>
                  <td><?php echo $j['rk'] ?></td>
                  <td><?php echo $j['kuota']; ?></td>
                  <td>
                  	<?php if (count($this->cart->contents()) == 0): ?>
                  		<a href="<?php echo base_url("C_menu2/tambah_cart/".$j['kode']) ?>" class="btn btn-primary btn-sm">+ Add</a>
                  		<?php else: ?>
                  			<?php 
                  	$cart = $this->cart->contents();
                  	foreach ($cart as $item) :
                  	if($j['kode'] == $item['id']){?>
                  		<button class="btn btn-secondary btn-sm">+ Add</button>
                  	<?php }else{?>
                  		<a href="<?php echo base_url("C_menu2/tambah_cart/".$j['kode']) ?>" class="btn btn-primary btn-sm">+ Add</a>
                  	<?php } 
                  	endforeach;
                  	?>
                  	<?php endif ?>
                  	</td>
                </tr>
                <?php $i++; endforeach; ?>
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
<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      responsive: true
    });
});
</script>
</body>

</html>
