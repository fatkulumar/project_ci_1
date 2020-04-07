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
                <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Pekerjaan</h4>
            </div>
            <div>
                <a class="btn btn-primary float-right rounded-pill" href="<?= base_url('admin/v_t_pekerjaan') ?>">Tambah Pekerjaan</a>
            </div>
        </div>
        <div class="card-body">
            
    <table id="pekerjaan" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pekerjaan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                foreach($pekerjaan as $pek ):
                $no++
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $pek->pekerjaan ?></td>
                <td><?= $pek->nama_status ?></td>
                
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_pekerjaan/" . $pek->id_pekerjaan) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_pekerjaan/' . $pek->id_pekerjaan) ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
        </div>
    </div>
    </div>

    <script>
        $(document).ready( function () {
            $('#pekerjaan').DataTable({
                // "proccessing" : true,
                // "serverSide" : true,
                // "ajax" : '<?= base_url('admin/registrasi') ?>'
            })
        } );
    </script>
    
</body>
</html>