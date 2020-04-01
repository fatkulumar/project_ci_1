<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Tambah Status Kawin</h1>
    <form action="<?= base_url('admin/t_sts_kawin') ?>" method="POST">
        <div class="form-group">
            <label for="sts_kawin">Status Kawin</label>
            <input class="form-control" type="text" name="sts_kawin"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_sts_kawin">Tambah Status</button>
        </div>
    </form>

</body>
</html>