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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Tambah Pekerjaan</h4>
        </div>
        <br><br>
    <div class="card-body">
    
    <form action="<?= base_url("admin/t_pekerjaan")?>" method="POST">
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input class="form-control" type="text" name="pekerjaan"  required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <select class="form-control" name="status" id="status">
                <option value="">-Pilih Status-</option>
                <?php foreach($status as $sta): ?>
                    <option value="<?= $sta->id_status ?>"><?= $sta->nama_status ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_pekerjaan">Tambah Pekerjaan</button>
        </div>
    </form>

        </div>
    </div>
</div>

</body>
</html>