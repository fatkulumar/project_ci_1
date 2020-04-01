<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold; line-height: 1em"><?= $page ?></h1>
    <a class="btn btn-primary" href="<?= base_url('admin/v_t_profil') ?>">Tambah <?= $page ?></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Profil</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Domisili</th>
                <th>Asal</th>
                <th>Hobi</th>
                <th>Status Perkawinan</th>
                <th>Agama</th>
                <th>Aksi</th>
            </tr>

            <?php 

                $no = 0;
                foreach ($profil as $prof) :
                $no++;

            ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $prof->profil ?></td>
                <td><?= $prof->nama_profil ?></td>
                <td><?= $prof->tpt_lahir ?></td>
                <td><?= $prof->tgl_lahir ?></td>
                <td><?= $prof->alamat_sekarang ?></td>
                <td><?= $prof->alamat_asal ?></td>
                <td><?= $prof->hobi ?></td>
                <td><?= $prof->id_sts_perkawinan ?></td>
                <td><?= $prof->agama ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_profil/". $prof->id_profil) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_profil/' . $prof->id_profil ) ?>">Hapus</a>
                </td>
            </tr>
                <?php endforeach ?>
        </thead>
    </table>
    
</body>
</html>