<?php
    if($level_admin = $this->session->userdata("level") == 1) {
        redirect('admin');
    }
?>

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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Edit Status Pekerjaan</h4>
        </div>
        <br><br>
        <div class="card-body">
    
    <?php foreach($sts_pekerjaan as $pkr): ?>
    <form action="<?= base_url('admin/e_sts_pekerjaan') ?>" method="POST">
        <input type="hidden" name="id_sts_pekerjaan" id="id_sts_pekerjaan" value="<?= $pkr->id_status ?>">
        <div class="form-group">
            <label for="sts_kawin">Status Kawin</label>
            <input class="form-control" type="text" name="sts_pekerjaan" value="<?= $pkr->nama_status ?>"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_sts_pekerjaan">Edit Status</button>
        </div>
    </form>
    <?php endforeach ?>

        </div>
        </div>
    </div>
</div>

</body>
</html>