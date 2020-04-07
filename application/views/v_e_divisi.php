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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Edit Divisi</h4>
        </div>
        <br><br>
        <div class="card-body">
    
    <?php foreach($divisi as $div): ?>
    <form action="<?= base_url('admin/e_divisi') ?>" method="POST">
        <input type="hidden" name="id_divisi" id="id_divisi" value="<?= $div->id_divisi ?>">
        <div class="form-group">
            <label for="divisi">Divisi</label>
            <input class="form-control" type="text" name="divisi" value="<?= $div->divisi ?>"  required>
        </div>

        <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <select class="form-control" name="id_jabatan" id="id_jabatan">
                <option value="">-Pilih Jabatan-</option>
                <?php foreach($id_jabatan as $id_jabatan): ?>
                    <option value="<?= $id_jabatan->id_jabatan ?>" <?php if($id_jabatan->id_jabatan == $div->id_jabatan){echo "selected";} ?>><?= $id_jabatan->jabatan ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_divisi">Edit Divisi</button>
        </div>
    </form>
    <?php endforeach ?>

        </div>
    </div>
</div>
</div>

</body>
</html>