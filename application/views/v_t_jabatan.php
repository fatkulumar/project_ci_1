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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Tambah Jabatan</h4>
        </div>
        <br><br>
    <div class="card-body">
    
    <form action="<?= base_url("admin/t_jabatan")?>" method="POST">
        <div class="form-group">
            <label for="jabatan">Nama Jabatan</label>
            <input class="form-control" type="text" name="jabatan"  required>
        </div>

        <!-- <div class="form-group">
            <select class="form-control" name="id_karyawan" id="id_karyawan" required>
                <option value="">-Pilih Karyawan-</option>
                <?php foreach($id_karyawan as $id_karyawan):?>
                    <option value="<?= $id_karyawan->id_karyawan ?>"><?= $id_karyawan->nama_karyawan ?></option>
                <?php endforeach ?>
            </select>
        </div> -->
        
        <div>
            <button class="btn btn-primary" type="submit" name="t_jabatan">Tambah Jabatan</button>
        </div>
    </form>

        </div>
    </div>
</div>
</div>

</body>
</html>