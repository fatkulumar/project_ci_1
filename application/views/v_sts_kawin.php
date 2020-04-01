<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold; line-height: 0.7em"><?= $page ?></h1>
    <a class="btn btn-primary" href="<?= base_url('admin/v_t_sts_kawin') ?>">Tambah <?= $page ?></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Status Kawin</th>
                <th>Aksi</th>
            </tr>

            <?php 

                $no = 0;
                foreach ($sts_kawin as $kwn) :
                $no++;

            ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $kwn->sts_kawin ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_sts_kawin/". $kwn->id_sts_kawin) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_sts_kawin/' . $kwn->id_sts_kawin ) ?>">Hapus</a>
                </td>
            </tr>
                <?php endforeach ?>
        </thead>
    </table>
    
</body>
</html>