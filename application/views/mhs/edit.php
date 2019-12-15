<!DOCTYPE html>
<html>
<head>
    <title>TRRAVEL</title>
</head>
<body>
    <!-- MODAL EDIT -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info text-white">
                <h3 class="modal-title" id="exampleModalLabel">Update Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart("C_mahasiswa/update"); ?>
                <?php echo validation_errors(); ?>
                <div class="form-group row">
                    <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                    <div class="col-sm-8">
                        <input type="hidden" name="id_old" value="<?php echo $record[0]->nim ?>">
                        <input type="text" name="nim" class="form-control" required="" id="nim" value="<?php echo $record[0]->nim; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" required="" id="nama" value="<?php echo $record[0]->nama; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <div class="col-xs-4">
                            <input name="jk" id="jk" type="radio" value="L" <?php if($record[0]->jk=="L"){ echo "checked"; } ?> > Laki-laki
                        </div>
                        <div class="col-xs-4">
                            <input name="jk" id="jk" type="radio" value="P" <?php if($record[0]->jk=="P"){ echo "checked"; } ?> > Perempuan
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required="" id="alamat" value="<?php echo $record[0]->alamat; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="kode_jurusan" id="kode_jurusan">
                            <?php foreach ($jurusan as $key => $value): ?>
                                <option value="<?php echo $value->kode ?>"><?php echo $value->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nip_wali" class="col-sm-4 col-form-label">Dosen Wali</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="nip_wali" id="nip_wali">
                            <?php foreach ($dosen as $key => $value): ?>
                                <option value="<?php echo $value->nip ?>"><?php echo $value->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="hidden"  id="foto_old"  name="foto_old"  value="<?php echo $record[0]->foto;   ?>">
                        <img src="<?php echo base_url()."foto/".$record[0]->foto ?>" alt="" height="100px" width="100px">
                        <input type="file" name="foto" class="form-control" id="foto" value="<?php echo $record[0]->foto; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="update" value="Update" class="btn btn-info">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!--END MODAL EDIT-->

    <script type="text/javascript">
        $(document).ready(function(){

            $('#kode_jurusan').val('<?php echo $record[0]->kode_jurusan ?>');

            $('#nip_wali').val('<?php echo $record[0]->nip_wali ?>');

        });
    </script>
</body>
</html>