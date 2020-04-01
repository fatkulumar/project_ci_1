<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Tambah Divisi</h1>
    <form action="<?= base_url('admin/t_divisi') ?>" method="POST">
        <div class="form-group">
            <label for="divisi">Divisi</label>
            <input class="form-control" type="text" name="divisi"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_divisi">Tambah Divisi</button>
        </div>
    </form>

</body>
</html>