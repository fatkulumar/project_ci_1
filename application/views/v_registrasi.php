<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold; line-height: 0.7em"><?= $page ?></h1>
    <a class="btn btn-primary" href="<?= base_url('admin/v_t_registrasi') ?>">Tambah <?= $page ?></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 0;
                foreach ($registrasi as $reg):
                $no++;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $reg->nik ?></td>
                <td><?= $reg->nip ?></td>
                <td><?= $reg->nama ?></td>
                <td><?= $reg->ttl ?></td>
                <td><?= $reg->username ?></td>
                <td><?= $reg->password ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url('admin/v_e_registrasi/'. $reg->id_registrasi) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_registrasi/'. $reg->id_registrasi) ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </thead>
    </table>
    
</body>
</html>