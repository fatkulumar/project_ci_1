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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Edit Pekerjaan</h4>
        </div>
        <br><br>
        <div class="card-body">
    <?php foreach($pekerjaan as $div): ?>
    <form action="<?= base_url('admin/e_pekerjaan') ?>" method="POST">
        <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="<?= $div->id_pekerjaan ?>">
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input class="form-control" type="text" name="pekerjaan" value="<?= $div->pekerjaan ?>"  required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $div->deskripsi ?></textarea>
        </div>
        <div class="form-group">
            <select class="form-control" name="status" id="status" required>
                <option value="">-Pilih Status-</option>
                <?php foreach($status as $sta): ?>
                    <option value="<?= $sta->id_status ?>" <?php if($sta->id_status == $div->status_pekerjaan){echo "selected";}?>><?= $sta->nama_status ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_pekerjaan">Edit pekerjaan</button>
        </div>
    </form>
    <?php endforeach ?>

        </div>
        </div>
    </div>
</div>

</body>
</html>