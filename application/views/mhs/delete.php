<!DOCTYPE html>
<html>
<head>
    <title>TRRAVEL</title>
</head>
<body>
    <!--MODAL HAPUS-->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white btn-danger">
                <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <text>Apakah anda yakin ingin menghapus data dari <?php echo $record[0]->nim; ?> ?</text>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('C_mahasiswa/delete/'.$record[0]->nim); ?>" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </div>
        </div>
    </div>
    <!--END MODAL HAPUS-->
</body>
</html>