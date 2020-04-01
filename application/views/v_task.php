<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    
    <h1 style="font-size: 52px; font-weight: bold; line-height: 0.7em">Task</h1>
    <a class="btn btn-primary" id="tambah" href="<?= base_url('admin/v_t_task') ?>">Tambah Task</a>

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Divisi</th>
                <th>Tanggal Penugasan</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 0;
                foreach($task as $tas):
                $no++
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $tas->id_karyawan ?></td>
                <td><?= $tas->id_divisi ?></td>
                <td><?= $tas->tgl_penugasan ?></td>
                <td>
                    <a id="tampil_edit<?= $tas->id_task ?>" onclick="edit(<?= $tas->id_task ?>)"class="btn btn-primary" >Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_task/' . $tas->id_task) ?>">Hapus</a>
                </td>
            </tr>

            <div class='container'>
        <!-- The Modal -->
        <div class='modal' id='myModalEdit<?= $tas->id_task ?>'>
            <div class='modal-dialog'>
                <div class='modal-content'>
            
                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'>Edit Task</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        </div>
                        <div class='row'>
                        
                        <form id="form_edit<?= $tas->id_task ?>" action="#" method="post">
                            <!-- Modal body -->
                            <div class='modal-body'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <input type="hidden" name="id_task" id="id_task<?= $tas->id_task ?>" value="<?= $tas->id_task ?>">
                                    <div class='col-md-12'>
                                        <div class="form-grop">
                                            <label for="e_id_jabatan">Jabatan</label>
                                            <select class="form-control" name="e_id_jabatan" id="e_id_jabatan<?= $tas->id_task ?>">
                                                <option value="">-Pilih Jabatan-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label for="e_id_divisi">Divisi</label>
                                            <select class="form-control" name="e_id_divisi" id="e_id_divisi<?= $tas->id_task ?>">
                                                <option value="">-Pilih Divisi-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label for="e_id_karyawan">Karyawan</label>
                                            <select class="form-control" name="e_id_karyawan" id="e_id_karyawan<?= $tas->id_task ?>">
                                                <option value="">-Pilih Karyawan-</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label for='e_tgl_penugasan'>Tanggal Penugasan</label>
                                            <input class='form-control' type='text' name='e_tgl_penugasan' id='e_tgl_penugasan' value="<?= $tas->tgl_penugasan ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-danger' id='edit_task<?= $tas->id_task ?>'>Edit Task</button>
                            </div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            <!-- =====================================modal edit======================================== -->
            <script>

                


                //modal edit
                // $(document).ready(function(){

                //     $('#tampil_edit<?= $tas->id_task ?>').on('click', function (event) {
                //         event.preventDefault();
                //         $.ajax({
                //             type : 'POST',
                //             url : '<?= base_url('admin/getEditTask') ?>',
                //             dataType : "JSON",
                //             success : function(data){
                //                 $('#myModalEdit<?= $tas->id_task ?>').modal();
                //                 if(data == ""){
                //                     var html = '<option value="">-Pilih Divisi-</option>'
                //                     $('#ajaxIdDivisi').html(html);
                //                 }else{
                //                     var html = "";
                //                     var i;
                //                     for(i =0; i<data.length; i++){
                //                         html += '<option value="'+ data[i].id_jabatan +'">' + data[i].jabatan + '</option>'
                //                     }
                //                 }
                //                 $('#e_id_jabatan').append(html)
                //             }
                //         });
                //     });
                // });
                
                
                //aksi edit
            // $(document).ready(function(){

            //     $('#edit_task<?= $tas->id_task ?>').on('click', function (event) {
            //         event.preventDefault();
            //         var data = $('#form_edit<?= $tas->id_task ?>').serialize();
            //         $.ajax({
            //             type : 'POST',
            //             url : '<?= base_url('admin/e_task') ?>',
            //             data: data,
            //             success : function(data){
            //                 $('#myModalEdit<?= $tas->id_task ?>').modal('hide');
            //                 location.reload();
            //             }
            //         });
            //     });
            // });

            // <!-- =====================================modal edit======================================== -->

            </script>
            
        </div>
            <?php endforeach ?>
        </thead>
    </table>

    <script>
        function edit(id) {
            alert(id)
            $.ajax({
                type : 'POST',
                url : '<?= base_url('admin/getEditTaskJabatan') ?>',
                dataType : 'JSON',
                success : function(data) {
                    $('#myModalEdit'+id).modal();
                    if(data == ""){
                        var html = '<option value="">-Pilih Jabatan-</option>'
                        $('#e_id_jabatan'+ id).html(html);
                    }else{
                        var html = "";
                        var i;
                        for(i =0; i<data.length; i++){
                            html += '<option value="'+ data[i].id_jabatan +'">' + data[i].jabatan + '</option>'
                        }
                    $('#e_id_jabatan'+id).append(html)
                    }
                    editDivisi(id)
                    editKaryawan(id)
                }
            })
        }

        function editDivisi(id){
            $('#e_id_jabatan'+id).on('change', function(event){
                var e_id_jabatan = $('#e_id_jabatan'+id).val()
                if(e_id_jabatan == "") {
                    var html = '<option value="">-Pilih Divisi-</option>'
                    $("#e_id_divisi"+id).html(html)
                }else{
                    event.preventDefault()
                    $.ajax({
                        type : 'POST',
                        url : '<?= base_url('admin/getAjaxDivisi') ?>',
                        data : 'id_jabatan=' + e_id_jabatan,
                        dataType : 'JSON',
                        success : function(data) {
                            if(data == ""){
                                var html = '<option value="">-Pilih Divisi-</option>'
                                $('#e_id_divisi'+id).html(html);
                            }else{
                                var id = ""
                                var html = "";
                                var i;
                                for(i =0; i<data.length; i++){
                                    html += '<option value="'+ data[i].id_divisi +'">' + data[i].divisi + '</option>'
                                    id = data[i].id_divisi
                                }
                            $('#e_id_divisi'+id).html(html)
                            }
                        }
                    })
                }
            })
        }

        function editKaryawan(id){
            $('#e_id_jabatan' +id).on('change', function(event){
                var e_id_jabatan = $('#e_id_jabatan'+id).val()
                if(e_id_jabatan == "") {
                    var html = '<option value="">-Pilih Karyawan-</option>'
                    $("#e_id_karyawan"+id).html(html)
                }else{
                    event.preventDefault()
                    $.ajax({
                        type : 'POST',
                        url : '<?= base_url('admin/tampil_karyawan') ?>',
                        data : 'id_jabatan=' + e_id_jabatan,
                        dataType : 'JSON',
                        success : function(data) {
                            if(data == ""){
                                var html = '<option value="">-Pilih Karyawan-</option>'
                                $('#e_id_karyawan'+id).html(html);
                            }else{
                                var html = "";
                                var i;
                                for(i =0; i<data.length; i++){
                                    html += '<option value="'+ data[i].id_karyawan +'">' + data[i].nama_karyawan + '</option>'
                                }
                            $('#e_id_karyawan'+id).html(html)
                            }
                        }
                    })
                }
            })
        }
    </script>


    <!-- =============================modal=============================================== -->

    <div class='container'>
        <!-- The Modal -->
        <div class='modal' id='myModal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
            
                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'>Tambah Task</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        </div>
                        <div class='row'>
                        <form id="form_tambah" action="#" method="post">
                            <!-- Modal body -->
                            <div class='modal-body'>
                                <div class='row'>

                                    <div class='col-md-12'>
                                        <div class="form-group">
                                            <label for="id_jabatan">Jabatan</label>
                                            <select class="form-control" name="id_jabatan" id="id_jabatan">
                                                <option value="">-Pilih Jabatan-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class='col-md-12'>
                                        <div class="form-group">
                                            <label for="id_divisi">Divisi</label>
                                            <select class="form-control" name="id_divisi" id="ajaxIdDivisi">
                                                <option value="">-Pilih Divisi-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label for='id_karyawan'>Karyawan</label>
                                            <select class="form-control" name="id_karyawan" id="id_karyawanT">
                                                <option value="">-Pilih Karyawan-</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label for='tgl_penugasan'>Tanggal Penugasan</label>
                                            <input class='form-control' type='date' name='tgl_penugasan' id='tgl_penugasan'>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-danger' id='tambah_task'>Tambah Task</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
        </div>

    <script>

        //tampil modaltambah
        $(document).ready(function(){

            $('#tambah').on('click', function (event) {
                event.preventDefault();
                $.ajax({
                    type : 'POST',
                    url : '<?= base_url('admin/v_t_task') ?>',
                    dataType : 'JSON',
                    success : function(data){
                        $('#myModal').modal();

                        var html = "";
                        var i;
                        for(i =0; i<data.length; i++){
                            html += '<option value="'+ data[i].id_jabatan +'">' + data[i].jabatan + '</option>'
                        }

                        $('#id_jabatan').append(html);
                    }
                });
            }),
            //ketika id_jabatan di pilih
            $('#id_jabatan').change(function(){
                var nasi=$('#id_jabatan').val();
                $.ajax({
                type : 'POST',
                url: '<?= base_url('admin/getAjaxDivisi') ?>',
                data: "id_jabatan=" + nasi,
                dataType : 'JSON',
                success : function(data){
                    if(data == ""){
                        var html = '<option value="">-Pilih Divisi-</option>'
                        $('#ajaxIdDivisi').html(html);
                    }else{
                        var html = "";
                        var i;
                        for(i =0; i<data.length; i++){
                            html += '<option value="'+ data[i].id_divisi +'">' + data[i].divisi + '</option>'
                        }
                    $('#ajaxIdDivisi').html(html);
                    }
                }
            })
            })
        });
        //tampil karyawan tambah modal
        $(document).ready(function() {
            $("#id_jabatan").on("change", function(event) {
                var id = $("#id_jabatan").val()
                if(id == ""){
                    var html = '<option value="">-Pilih Karyawan-</option>'
                    $("#id_karyawanT").html(html)
                }else{
                event.preventDefault()
                    $.ajax({
                        type : "POST",
                        url : "<?= base_url("admin/tampil_karyawan") ?>",
                        dataType : "JSON",
                        success : function(data) {
                            var html = ""
                            for (var index = 0; index < data.length; index++) {
                                html += '<option value="'+ data[index].id_karyawan +'">' + data[index].nama_karyawan + '</option>'
                            }
                            $("#id_karyawanT").html(html)
                        }
                    })
                }
            })
        })

        //aksi tambah
        $(document).ready(function(){

            $('#tambah_task').on('click', function (event) {

                var data = $('#form_tambah').serialize();
                event.preventDefault();
                $.ajax({
                    type : 'post',
                    url : '<?= base_url('admin/t_task') ?>',
                    data : data,
                    success : function(data){
                        $('#myModal').modal('hide');
                        location.reload()
                    }
                });
            }); 
        });   

    </script>


    <!-- =====================================/modal============================================== -->
    
</body>
</html>