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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Edit Karyawan</h4>
        </div>
        <br><br>
        <div class="card-body">
    
    
    <?php foreach ($id_karyawan as $kary): ?>
    <form action="<?= base_url("admin/e_karyawan")?>" method="POST">
    <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $kary->id_karyawa ?>">
        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input class="form-control" type="text" name="nama_karyawan" value="<?= $kary->nama_karyawan ?>" required>
        </div>

        <div class="form-group">
            <select class="form-control" name="id_jabatan" id="id_jabatan" required>
                <option value="">-Pilih jabatan-</option>
                <?php foreach($id_jabatan as $id_jabatan):?>
                    <option value="<?= $id_jabatan->id_jabatan ?>" <?php if($id_jabatan->id_jabatan == $kary->id_jabatan){echo "selected";} ?>><?= $id_jabatan->jabatan ?></option>
                <?php endforeach ?>
            </select>
        </div>
        
        <div class="form-group">
            <select class="form-control" name="id_divisi" id="id_divisi" required>
                <option value="">-Pilih Divisi-</option>
                <?php foreach($id_divisi as $id_divisi):?>
                    <option value="<?= $id_divisi->id_divisi ?>" <?php if($id_divisi->id_divisi == $kary->id_divisi){echo "selected";} ?>><?= $id_divisi->divisi ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <select class="form-control" name="id_pekerjaan" id="id_pekerjaan" required>
                <option value="">-Pilih Pekerjaan-</option>
                <?php foreach($id_pekerjaan as $id_pekerjaan):?>
                    <option value="<?= $id_pekerjaan->id_pekerjaan ?>" <?php if($id_pekerjaan->id_pekerjaan == $kary->id_pekerjaan){echo "selected";} ?>><?= $id_pekerjaan->pekerjaan ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div>
            <button class="btn btn-primary" type="submit" name="e_karyawan">Edit Karyawan</button>
        </div>
    </form>
    <?php endforeach ?>

        </div>
    </div>
</div>
</div>

</body>
</html>