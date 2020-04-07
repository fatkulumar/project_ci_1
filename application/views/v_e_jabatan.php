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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Edit Jabatan</h4>
        </div>
        <br><br>
        <div class="card-body">
    
    <?php foreach($jabatan as $jab ):?>
    <form action="<?= base_url("admin/e_jabatan") ?>" method="POST">
    <input type="hidden" name="id_jabatan" id="id_jabatan" value="<?= $jab->id_jabatan ?>">
        <div class="form-group">
            <label for="jabatan">Nama Jabatan</label>
            <input class="form-control" type="text" name="jabatan" value="<?= $jab->jabatan ?>" required>
        </div>

        <div>
            <button class="btn btn-primary" type="submit" name="e_jabatan">Edit Jabatan</button>
        </div>
    </form>
    <?php endforeach ?>

        </div>
    </div>
</div>
</div>

</body>
</html>