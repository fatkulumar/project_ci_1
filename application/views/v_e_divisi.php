<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Edit Divisi</h1>
    <?php foreach($divisi as $div): ?>
    <form action="<?= base_url('admin/e_divisi') ?>" method="POST">
        <input type="hidden" name="id_divisi" id="id_divisi" value="<?= $div->id_divisi ?>">
        <div class="form-group">
            <label for="divisi">Divisi</label>
            <input class="form-control" type="text" name="divisi" value="<?= $div->divisi ?>"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_divisi">Edit Divisi</button>
        </div>
    </form>
    <?php endforeach ?>

</body>
</html>