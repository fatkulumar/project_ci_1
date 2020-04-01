<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Edit Status Kawin</h1>
    <?php foreach($sts_kawin as $kwn): ?>
    <form action="<?= base_url('admin/e_sts_kawin') ?>" method="POST">
        <input type="hidden" name="id_sts_kawin" id="id_sts_kawin" value="<?= $kwn->id_sts_kawin ?>">
        <div class="form-group">
            <label for="sts_kawin">Status Kawin</label>
            <input class="form-control" type="text" name="sts_kawin" value="<?= $kwn->sts_kawin ?>"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_sts_kawin">Edit Status</button>
        </div>
    </form>
    <?php endforeach ?>

</body>
</html>