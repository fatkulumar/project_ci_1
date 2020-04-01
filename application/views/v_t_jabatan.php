<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Tambah Jabatan</h1>
    <form action="<?= base_url("admin/t_jabatan")?>" method="POST">
        <div class="form-group">
            <label for="jabatan">Nama Jabatan</label>
            <input class="form-control" type="text" name="jabatan"  required>
        </div>
        <div class="form-group">
            <select class="form-control" name="id_divisi" id="id_divisi" required>
                <option value="">-Pilih Divisi-</option>
                <?php foreach($id_divisi as $id):?>
                    <option value="<?= $id->id_divisi ?>"><?= $id->divisi ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_jabatan">Tambah Jabatan</button>
        </div>
    </form>

</body>
</html>