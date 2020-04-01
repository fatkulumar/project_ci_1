<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold; line-height: 0.7em">Pekerjaan</h1>
    <a class="btn btn-primary" href="<?= base_url('admin/v_t_pekerjaan') ?>">Tambah Pekerjaan</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pekerjaan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 0;
                foreach($pekerjaan as $pek ):
                $no++
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $pek->pekerjaan ?></td>
                <td>
                    <?php 
                        $status = $pek->status_pekerjaan;
                        if($status == 0){
                            echo "Tidak Aktif";
                        }elseif($status == 1){
                            echo "Aktif";
                        }elseif($status == 2){
                            echo "Progres";
                        }
                    ?>
                </td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_pekerjaan/" . $pek->id_pekerjaan) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_pekerjaan/' . $pek->id_pekerjaan) ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </thead>
    </table>
    
</body>
</html>