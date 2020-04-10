
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

  
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div style="position: absolute"; >
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Task</h4>
        </div>
        <div>
        <?php if($level_admin = $this->session->userdata("level") == 0):?>
            <button type="button" class="btn btn-primary float-right rounded-pill" data-toggle="modal" data-target="#modalTambah">Tambah Task</button>
            <?php endif ?>
        </div>
        <br><br>
        <div class="card-body">
            
    <table id="task" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Pekerjaan</th>
                <?php if($level_admin = $this->session->userdata("level") == 0):?>
                <th>Divisi</th>
                <th>Deskripsi</th>
                <th>Tanggal Penugasan</th>
                <th>Tanggal Selesai</th>
                <th>Progress Pekerjaan</th>
                <th>Detail</th>
                <th>Aksi</th>
                <?php endif ?>
            </tr>
            </thead>
            <?php
                $no = 0;
                foreach($taskUserAll as $tas):
                $no++
            ?>
            <tbody>
            <tr>
                <td><?= $no ?></td>
                <td><?= $tas->nama_karyawan ?></td>
                <td><?= $tas->pekerjaan ?></td>
                <?php if($level_admin = $this->session->userdata("level") == 0):?>
                <td><?= $tas->divisi ?></td>
                <td><?= $tas->keterangan ?></td>
                <td><?= $tas->tgl_penugasan ?></td>
                <td><?= $tas->tgl_penyelesaian ?></td>
                <td><?php 
                        $progess = $tas->progress; 
                        if($progess == 0): ?>
                            <a  class='btn btn-danger' onclick='return confirm("Selesai?, status tidak bisa di kembalikan!")' href='<?= base_url("admin/konfirProgress/" . $tas->id_task) ?>'>On Progress</a>
                        <?php else: ?>
                            <button class='btn btn-danger' disabled>Closed</button>
                        <?php endif ?>
                <td>
                    <a href="#" id="tampil_edit<?= $tas->id_task ?>" onclick="modalEdit(<?= $tas->id_task ?>)"class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_task/' . $tas->id_task) ?>">Hapus</a>
                </td>
                <?php endif ?>
                <td><a class="btn btn-warning" href="<?= base_url('admin/taskDetail/' . $tas->id_task ) ?>">Detail</a></td>
            </tr>            
        </div>
        <?php endforeach ?>
        </tbody>
</table>
</div>
</div>
    </div>
<!-- ========================================================modal batas==================================================== -->

<!-- The Modal -->
<div class="modal" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Tambah</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id="form_tambah" action="#" method="post">
                <!-- Modal body -->
                <div class='modal-body'>
                    <div class='row'>

                        <div class='col-md-12'>
                            <div class="form-group">
                                <label for="id_jabatan">Jabatan</label>
                                <select class="form-control" name="id_jabatan" id="id_jabatan">
                                    <option value="">-Pilih Jabatan-</option>
                                    <?php foreach($jabatan as $korona): ?>
                                        <option value="<?=$korona->id_jabatan?>"><?=$korona->jabatan?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class="form-group">
                                <label for="id_divisi">Divisi</label>
                                <select class="form-control" name="id_divisi" id="id_divisi">
                                    <option value="">-Pilih Divisi-</option>
                                </select>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='id_karyawan'>Karyawan</label>
                                <select class="form-control" name="id_karyawan" id="id_karyawan">
                                    <option value="">-Pilih Karyawan-</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='id_pekerjaan'>Pekerjaan</label>
                                <select class="form-control" name="id_pekerjaan" id="id_pekerjaan">
                                    <option value="">-Pilih Pekerjaan-</option>
                                </select>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='keterangan'>Keterangan</label>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <textarea name="keterangan" id="keterangan" cols="45" rows="5"></textarea>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='tgl_penugasan'>Tanggal Penugasan</label>
                                <input class='form-control' type='date' name='tgl_penugasan' id='tgl_penugasan'>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='tgl_selesai'>Tanggal Selesai</label>
                                <input class='form-control' type='date' name='tgl_selesai' id='tgl_selesai'>
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

<!-- =============================================modal edit=================================================== -->

<div class="modal" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form id="form_edit" action="#" method="post">
            <!-- Modal body.. -->
                <div class='modal-body'>
                    <div class='row'>

                        <div class='col-md-12'>
                            <div class="form-group">
                                <label for="id_jabatan_edit">Jabatan</label>
                                <select class="form-control" name="id_jabatan_edit" id="id_jabatan_edit">
                                    <option value="">-Pilih Jabatan-</option>
                                    <?php foreach($jabatan as $korona): ?>
                                        <option value="<?=$korona->id_jabatan?>"><?=$korona->jabatan?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class="form-group">
                                <label for="id_divisi_edit">Divisi</label>
                                <select class="form-control" name="id_divisi_edit" id="id_divisi_edit">
                                    <option value="">-Pilih Divisi-</option>
                                </select>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='id_karyawan_edit'>Karyawan</label>
                                <select class="form-control" name="id_karyawan_edit" id="id_karyawan_edit">
                                    <option value="">-Pilih Karyawan-</option>
                                </select>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='id_pekerjaan_edit'>Pekerjaan</label>
                                <select class="form-control" name="id_pekerjaan_edit" id="id_pekerjaan_edit">
                                    <option value="">-Pilih Pekerjaan-</option>
                                </select>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='keterangan_edit'>Keterangan</label>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <textarea name="keterangan_edit" id="keterangan_edit" cols="45" rows="5"></textarea>
                            </div>
                        </div>
                        
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='tgl_penugasan_edit'>Tanggal Penugasan</label>
                                <input class='form-control' type='date' name='tgl_penugasan_edit' id='tgl_penugasan_edit'>
                            </div>
                        </div>

                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label for='tgl_selesai_edit'>Tanggal Selesai</label>
                                <input class='form-control' type='date' name='tgl_selesai_edit' id='tgl_selesai_edit'>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' id='edit_task'>Edit Task</button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>
<script>

$(document).ready( function () {
    $('#task').DataTable({
        // "proccessing" : true,
        // "serverSide" : true,
        // "ajax" : '<?= base_url('admin/registrasi') ?>'
    })
} );
    

</script>

<!-- ========================================================/modal batas==================================================== -->

    <script>
        $(document).ready(function(){
            //modal tambah change jabatan
            $('#id_jabatan').change(function(){
                var id_jabatan = $('#id_jabatan').val();
                if (id_jabatan == "") {
                    var html = '<option value="">-Pilih Divisi-</option>'
                    $('#id_divisi').html(html);
                    $('#id_karyawan').html('<option value="">-Pilih Karyawan-</option>');
                }else{
                        $.ajax({
                        type : 'POST',
                        url: '<?= base_url('admin/getAjaxDivisi') ?>',
                        data: "id_jabatan=" + id_jabatan,
                        dataType : 'JSON',
                        success : function(data){
                        
                                var html = "";
                                var i;
                                for(i =0; i<data.length; i++){
                                    html += '<option value="'+ data[i].id_divisi +'">' + data[i].divisi + '</option>'
                                }
                            $('#id_divisi').html(html);
                            
                        }
                })
            }
        }),
        //modal tambah change divisi
        $('#id_divisi').change(function(){

            var id_divisi = $('#id_divisi').val();
            if(id_divisi == "") {
                var html = '<option value="">-Pilih Karyawan-</option>'
                $('#id_karyawan').html(html);
            }else{
                $.ajax({
                    type : 'POST',
                    url : '<?= base_url('admin/v_t_task') ?>',
                    data : "id_divisi=" + id_divisi,
                    dataType : 'JSON',
                    success : function(data) {
                        var html = "";
                        var i;
                        for(i =0; i<data.length; i++){
                            html += '<option value="'+ data[i].id_karyawa +'">' + data[i].nama_karyawan + '</option>'
                        }
                        $('#id_karyawan').html(html);
                    }
                })
            }
        }),
        //modal tambah change Karyawan
        $('#id_karyawan').change(function(){

        var id_karyawan = $('#id_karyawan').val();
        if(id_karyawan == "") {
            var html = '<option value="">-Pilih Karyawan-</option>'
            $('#id_karyawan').html(html);
        }else{
            $.ajax({
                type : 'POST',
                url : '<?= base_url('admin/tampil_pekerjaan') ?>',
                // dataType : 'JSON',
                success : function(data) {
                    var html = "";
                    var i;
                    for(i =0; i<data.length; i++){
                        html += '<option value="'+ data[i].id_pekerjaan +'">' + data[i].pekerjaan + '</option>'
                    }
                    $('#id_pekerjaan').html(html);
                }
            })
        }
        }),
        //ketika tambah submit di tekan
        $('#tambah_task').click(function(){
            var data = $('#form_tambah').serialize()
            $.ajax({
                type : 'POST',
                url : '<?= base_url('admin/t_task') ?>',
                data : data,
                dataType :'JSON',
                success : function(data) {
                    $('#modalTambah').modal('hide')
                    location.reload();
                }
            })
        })
    })

    function modalEdit(id) {
        var id_task = id
            //modal edit change jabatan
            $('#id_jabatan_edit').change(function(){
                var id_jabatan = $('#id_jabatan_edit').val();
                if (id_jabatan == "") {
                    var html = '<option value="">-Pilih Divisi-</option>'
                    $('#id_divisi_edit').html(html);
                    $('#id_karyawan_edit').html('<option value="">-Pilih Karyawan-</option>');
                }else{
                        $.ajax({
                        type : 'POST',
                        url: '<?= base_url('admin/getAjaxDivisi') ?>',
                        data: "id_jabatan=" + id_jabatan,
                        dataType : 'JSON',
                        success : function(data){
                        
                                var html = "";
                                var i;
                                for(i =0; i<data.length; i++){
                                    html += '<option value="'+ data[i].id_divisi +'">' + data[i].divisi + '</option>'
                                }
                            $('#id_divisi_edit').html(html);
                            
                        }
                })
            }
        }), 
        //modal edit change divisi
        $('#id_divisi_edit').change(function(){

        var id_divisi = $('#id_divisi_edit').val();
        if(id_divisi == "") {
            var html = '<option value="">-Pilih Karyawan-</option>'
            $('#id_karyawan_edit').html(html);
        }else{
            $.ajax({
                type : 'POST',
                url : '<?= base_url('admin/v_t_task') ?>',
                data : "id_divisi=" + id_divisi,
                dataType : 'JSON',
                success : function(data) {
                    var html = "";
                    var i;
                    for(i =0; i<data.length; i++){
                        html += '<option value="'+ data[i].id_karyawa +'">' + data[i].nama_karyawan + '</option>'
                    }
                    $('#id_karyawan_edit').html(html);
                }
            })
        }
        }),
        //modal edit change karyawan
        $('#id_karyawan_edit').change(function(){

        var id_karyawan = $('#id_karyawan_edit').val();
        if(id_karyawan == "") {
            var html = '<option value="">-Pilih Karyawan-</option>'
            $('#id_karyawan_edit').html(html);
        }else{
            $.ajax({
                type : 'POST',
                url : '<?= base_url('admin/tampil_pekerjaan') ?>',
                dataType : 'JSON',
                success : function(data) {
                    var html = "";
                    var i;
                    for(i =0; i<data.length; i++){
                        html += '<option value="'+ data[i].id_pekerjaan +'">' + data[i].pekerjaan + '</option>'
                    }
                    $('#id_pekerjaan_edit').html(html);
                }
            })
        }
        }),
        $('#edit_task').click(function(){
            var data = $('#form_edit').serialize()
            var id_jabatan = $('#id_jabatan_edit').val()
            var id_divisi = $('#id_divisi_edit').val()
            var id_karyawan = $('#id_karyawan_edit').val()
            var id_pekerjaan = $('#id_pekerjaan_edit').val()
            var keterangan = $('#keterangan_edit').val()
            var tgl_penugasan = $('#tgl_penugasan_edit').val()
            var tgl_selesai = $('#tgl_selesai_edit').val()
            $.ajax({
                type : 'POST',
                url : '<?= base_url('admin/e_task') ?>',
                data : {
                    id_jabatan :id_jabatan,
                    id_divisi :id_divisi,
                    id_karyawan :id_karyawan,
                    id_pekerjaan :id_pekerjaan,
                    id_karyawan :id_karyawan,
                    keterangan :keterangan,
                    tgl_penugasan :tgl_penugasan,
                    tgl_penyelesaian :tgl_selesai,
                    id_task : id_task
                },
                dataType :'JSON',
                success : function(data) {
                    $('#modalEdit').modal('hide')
                    location.reload();
                }
            })
        })
    }

</script>
        
</body>
</html>