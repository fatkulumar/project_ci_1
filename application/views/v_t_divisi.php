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

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div style="position: absolute"; >
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Tambah Divisi</h4>
        </div>
        <br><br>
    <div class="card-body">
    
    <form action="<?= base_url('admin/t_divisi') ?>" method="POST">
        <div class="form-group">
            <label for="divisi">Divisi</label>
            <input class="form-control" type="text" name="divisi"  required>
        </div>

        <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <select class="form-control" name="id_jabatan" id="id_jabatan">
                <option value="">-Pilih Jabatan-</option>
                <?php foreach($id_jabatan as $id_jabatan): ?>
                    <option value="<?= $id_jabatan->id_jabatan ?>"><?= $id_jabatan->jabatan ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div>
            <button class="btn btn-primary" type="submit" name="t_divisi">Tambah Divisi</button>
        </div>
    </form>

        </div>
    </div>
</div>
</div>

</body>
</html>