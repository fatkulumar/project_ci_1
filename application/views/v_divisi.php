<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold; line-height: 0.7em"><?= $page ?></h1>
    <a class="btn btn-primary" href="<?= base_url('admin/v_t_divisi') ?>">Tambah <?= $page ?></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Divisi</th>
                <th>Aksi</th>
            </tr>

            <?php 

                $no = 0;
                foreach ($divisi as $div) :
                $no++;

            ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $div->divisi ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_divisi/". $div->id_divisi) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_divisi/' . $div->id_divisi ) ?>">Hapus</a>
                </td>
            </tr>
                <?php endforeach ?>
        </thead>
    </table>
    
</body>
</html>