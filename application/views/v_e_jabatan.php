<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Edit Jabatan</h1>
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

</body>
</html>