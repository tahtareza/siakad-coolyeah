<?php 
$this->load->view('main12/header');
$this->load->view('main12/navbardsn');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Mahasiswa Wali</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <hr>
    <?php echo $mhs[0]->nama; ?>
    <hr>
    <a href="<?php echo base_url('C_menu1/krs'); ?>" class="btn btn-sm btn-warning">Kembali</a>
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
                                <th>Matakuliah</th>
                                <th>Dosen</th>
                                <th>Ruang</th>
                                <th>Tahun Ajaran</th>
                                <th>Hari</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Akhir</th>
                                <th>Status</th>
                                <th>Update</th>
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
                                <td><a class="btn btn-xs btn-primary text-white" data-toggle="modal" data-target="#modal_edit<?php echo $key->kode; ?>">Update</a></td>
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
<!-- MODAL EDIT -->
<?php
foreach ($krs as $key) :
    ?>
    <div class="modal fade" id="modal_edit<?php echo $key->kode; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button> -->
                    <h3 class="modal-title" id="myModalLabel">Update Status</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('C_krs/updateStatusKrs/')?><?php echo $key->nim; ?>">
                    <div class="modal-body">
                        <input name="kode" value="<?php echo $key->kode; ?>" class="form-control" type="hidden">
                        <input name="nim" value="<?php echo $key->nim; ?>" class="form-control" type="hidden">
                        <input name="kode_mk" value="<?php echo $key->mk; ?>" class="form-control" type="hidden">
                        <input name="kode_semester" value="<?php echo $key->ks; ?>" class="form-control" type="hidden">
                        <input name="kode_ta" value="<?php echo $key->kt; ?>" class="form-control" type="hidden">


                        <div class="form-group">
                            <label class="control-label col-xs-3" >Matakuliah</label>
                            <div class="col-xs-8">
                                <input name="matkul" value="<?php echo $key->mk; ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Dosen</label>
                            <div class="col-xs-8">
                                <input name="nados" value="<?php echo $key->nd; ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-8">
                             <select name="status" class="form-control" required>
                                <?php if($key->status==1):?>
                                    <option value="1" selected>Setujui</option>
                                    <option value="0">Tolak</option>
                                <?php else:?>
                                    <option value="1">Setujui</option>
                                    <option value="0" selected>Tolak</option>
                                <?php endif;?>
                             </select>
                        </div>
                    </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach;?>
<!--END MODAL EDIT-->


<?php 
$this->load->view('main12/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable({
            responsive: true
        });
    });
</script>

</div>
</body>

</html>
