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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Status</h4>
        </div>
            <a class="btn btn-primary float-right rounded-pill" href="<?= base_url('admin/v_t_sts_pekerjaan') ?>">Tambah Status</a>
        </div>
        <div class="card-body">
    
    <table id="sts_pekerjaan" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Status Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        </tbody>

            <?php 

                $no = 0;
                foreach ($sts_pekerjaan as $pkr) :
                $no++;

            ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $pkr->nama_status ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_sts_pekerjaan/". $pkr->id_status) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_sts_pekerjaan/' . $pkr->id_status ) ?>">Hapus</a>
                </td>
            </tr>
                <?php endforeach ?>
        </tbody>
    </table>

    <script>
        $(document).ready( function () {
            $('#sts_pekerjaan').DataTable({
                // "proccessing" : true,
                // "serverSide" : true,
                // "ajax" : '<?= base_url('admin/registrasi') ?>'
            })
        } );
    </script>
    
</body>
</html>