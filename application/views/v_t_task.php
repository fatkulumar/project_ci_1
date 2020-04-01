<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Tambah Task</h1>
    <form action="<?= base_url('admin/t_task') ?>" method="POST">
        <div class="form-group">
            <label for="id_karyawan">Karyawan</label>
            <input class="form-control" type="text" name="id_karyawan"  required>
        </div>
        <div class="form-group">
            <label for="id_divisi">Divisi</label>
            <input class="form-control" type="text" name="id_divisi"  required>
        </div>
        <div class="form-group">
            <label for="tgl_penugasan">Tanggal Penugasan</label>
            <input class="form-control" type="text" name="tgl_penugasan"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_task">Tambah Task</button>
        </div>
    </form>

</body>
</html>