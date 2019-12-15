<?php 
    $this->load->view('main/header');
    $this->load->view('main/navbar');
 ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hasil Pencarian</h1>
            <hr>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php if (count($mahasiswa) > 0) : ?>
                        <h4>Data Mahasiswa</h4><hr>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $mhs->nim; ?></td>
                                <td><?php echo $mhs->nama; ?></td>
                                <td><?php echo $mhs->kode_jurusan; ?></td>
                                <td><?php echo $mhs->alamat; ?></td>
                            </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>


                <?php elseif (count($jurusan) > 0) : ?>
                        <h4>Data Jurusan</h4><hr>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($jurusan as $jrs) : ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $jrs->kode; ?></td>
                                <td><?php echo $jrs->nama; ?></td>
                            </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Hasil Pencarian Tidak Ada</p>
                <?php endif; ?>
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

<?php 
    $this->load->view('main/footer');
 ?>
</body>

</html>

