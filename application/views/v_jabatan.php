<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold; line-height: 0.7em">Jabatan</h1>
    <a class="btn btn-primary" href="<?= base_url('admin/v_t_jabatan') ?>">Tambah Jabatan</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th>Divisi</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 0;
                foreach($jabatan as $jab ):
                $no++
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $jab->jabatan ?></td>
                <td><?= $jab->divisi ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_jabatan/" . $jab->id_jabatan) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_jabatan/' . $jab->id_jabatan) ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </thead>
    </table>
    
</body>
</html>