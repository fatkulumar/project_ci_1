<?php
    if($level_admin = $this->session->userdata("level") == 1) {
        redirect('admin');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Edit Task</h1>
    <?php foreach($task as $tas): ?>
    <form action="<?= base_url('admin/e_task') ?>" method="POST">
    <input type="hidden" name="id_task" value="<?= $tas->id_task ?>">
        <div class="form-group">
            <label for="id_karyawan">Karyawan</label>
            <input class="form-control" type="text" name="id_karyawan" value="<?= $tas->id_karyawan ?>" required>
        </div>
        <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <select name="id_jabatan" id="id_jabatan">
                <option value="">-Pilih Jabatan-</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_divisi">Divisi</label>
            <input class="form-control" type="text" name="id_divisi" value="<?= $tas->id_divisi ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_penugasan">Tanggal Penugasan</label>
            <input class="form-control" type="text" name="tgl_penugasan" value="<?= $tas->tgl_penugasan ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_task">Edit Task</button>
        </div>
    </form>
    <?php endforeach ?>

    <script>
        //pilih jabatan
        $(document).ready(function(){

$('#jabatan').on('click', function (event) {

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

</body>
</html>