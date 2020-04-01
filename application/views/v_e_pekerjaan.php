<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Edit Pekerjaan</h1>
    <?php foreach($pekerjaan as $div): ?>
    <form action="<?= base_url('admin/e_pekerjaan') ?>" method="POST">
        <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="<?= $div->id_pekerjaan ?>">
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input class="form-control" type="text" name="pekerjaan" value="<?= $div->pekerjaan ?>"  required>
        </div>
        <div class="form-group">
            <select class="form-control" name="status" id="status" required>
                <option value="">-Pilih Status-</option>
                <?php foreach($status as $sta): ?>\
                    <option value="<?= $sta->status ?>" <?php if($sta->status == $div->status_pekerjaan){echo "selected";} ?>><?= $sta->nama_status ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_pekerjaan">Edit pekerjaan</button>
        </div>
    </form>
    <?php endforeach ?>

</body>
</html>