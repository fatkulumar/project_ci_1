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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Divisi</h4>
        </div>
            <a class="btn btn-primary float-right rounded-pill" href="<?= base_url('admin/v_t_divisi') ?>">Tambah Divisi</a></div>
        <div class="card-body">
     
    <table id="divisi" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 

                $no = 0;
                foreach ($divisi as $div) :
                $no++;

            ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $div->divisi ?></td>
                <td><?= $div->jabatan ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_divisi/". $div->id_divisi) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_divisi/' . $div->id_divisi ) ?>">Hapus</a>
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
            $('#divisi').DataTable({
                // "proccessing" : true,
                // "serverSide" : true,
                // "ajax" : '<?= base_url('admin/registrasi') ?>'
            })
        } );
    </script>
    
</body>
</html>