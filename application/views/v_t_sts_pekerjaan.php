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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Tambah Status Pekerjaan</h4>
        </div>
        <br><br>
        <div class="card-body">
    
    <form action="<?= base_url('admin/t_sts_pekerjaan') ?>" method="POST">
        <div class="form-group">
            <label for="sts_pekerjaan">Status Pekerjaan</label>
            <input class="form-control" type="text" name="sts_pekerjaan"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_sts_pekerjaan">Tambah Status</button>
        </div>
    </form>

        </div>
    </div>
</div>

</body>
</html>