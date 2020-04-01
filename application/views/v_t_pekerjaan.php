<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Tambah Pekerjaan</h1>
    <form action="<?= base_url("admin/t_pekerjaan")?>" method="POST">
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input class="form-control" type="text" name="pekerjaan"  required>
        </div>
        <div class="form-group">
            <select class="form-control" name="status" id="status">
                <option value="">-Pilih Status-</option>
                <?php foreach($status as $sta): ?>\
                    <option value="<?= $sta->status ?>"><?= $sta->nama_status ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_pekerjaan">Tambah Pekerjaan</button>
        </div>
    </form>

</body>
</html>