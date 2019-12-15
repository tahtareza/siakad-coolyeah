<?php 
    $this->load->view('main/header');
    $this->load->view('main/navbar');
 ?>

<div id="page-wrapper">
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
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Add</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Aksi</th>
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
<!-- /#page-wrapper -->

    <!-- /#wrapper -->

<!-- MODAL ADD -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Add Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode</label>
                        <div class="col-xs-9">
                            <input name="kode_add" id="kode1" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_add" id="nama1" class="form-control" type="text">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-success" id="btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Update Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode</label>
                        <div class="col-xs-9">
                            <input name="kode_edit" id="kode2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_edit" id="nama2" class="form-control" type="text">
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

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="kode" id="textkode" value="">
                    <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" id="btn_hapus">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL HAPUS-->

<?php 
    $this->load->view('main/footer');
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
                        '<td style="text-align:left;">'+
                        '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+data[i].kode+'">Update</a>'+' '+
                        '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+data[i].kode+'">Delete</a>'+
                        '</td>'+
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //Add Barang
        $('#btn_simpan').on('click',function(){
            var kode=$('#kode1').val();
            var nama=$('#nama1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_jurusan/add')?>",
                dataType : "JSON",
                data : {kode:kode , nama:nama},
                success: function(data){
                    if(data.sta == 0){
                        alert(data.msg);
                    }else{
                        $('[name="kode_add"]').val("");
                        $('[name="nama_add"]').val("");
                        $('#ModalAdd').modal('hide');
                        tampil_data();
                    }
                }
            });
            return false;
        });

        // $('#btn_simpan').on('click',function(){
        //     var kode=$('#kode1').val();
        //     var nama=$('#nama1').val();
        //     $.ajax({
        //         type : "POST",
        //         url  : "<echo base_url('C_jurusan/add')?>",
        //         dataType : "JSON",
        //         data : {kode:kode , nama:nama},
        //         success: function(data){
        //             $('[name="kode_add"]').val("");
        //             $('[name="nama_add"]').val("");
        //             $('#ModalAdd').modal('hide');
        //             tampil_data();
        //         }
        //     });
        //     return false;
        // });

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_jurusan/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(kode, nama){
                        $('#ModalUpdate').modal('show');
                        $('[name="kode_edit"]').val(data.kode);
                        $('[name="nama_edit"]').val(data.nama);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var kode=$('#kode2').val();
            var nama=$('#nama2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_jurusan/update')?>",
                dataType : "JSON",
                data : {kode:kode , nama:nama},
                success: function(data){
                    if(data.result == 'failed'){
                        alert(data.msg);
                    }else{
                        $('[name="kode_edit"]').val("");
                        $('[name="nama_edit"]').val("");
                        $('#ModalUpdate').modal('hide');
                        tampil_data();
                    }
                }
            });
            return false;
        });

        // $('#btn_update').on('click',function(){
        //     var kode=$('#kode2').val();
        //     var nama=$('#nama2').val();
        //     $.ajax({
        //         type : "POST",
        //         url  : "<echo base_url('C_jurusan/update')?>",
        //         dataType : "JSON",
        //         data : {kode:kode , nama:nama},
        //         success: function(data){
        //             $('[name="kode_edit"]').val("");
        //             $('[name="nama_edit"]').val("");
        //             $('#ModalUpdate').modal('hide');
        //             tampil_data();
        //         }
        //     });
        //     return false;
        // });


        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalDelete').modal('show');
            $('[name="kode"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_jurusan/delete')?>",
                dataType : "JSON",
                data : {kode: kode},
                success: function(data){
                    $('#ModalDelete').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

    });

</script>

</body>

</html>

