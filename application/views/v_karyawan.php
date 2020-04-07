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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Karyawan</h4>
        </div>
            <a class="btn btn-primary float-right rounded-pill" href="<?= base_url('admin/v_t_karyawan') ?>">Tambah Karyawan</a></div>
        <div class="card-body">
    
    <table id="karyawan" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Jabatan</th>
                <th>Divisi</th>
                <th>Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        <thead>
        <tbody>
            <?php
                $no = 0;
                foreach($karyawan as $jab ):
                $no++
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $jab->nama_karyawan ?></td>
                <td><?= $jab->jabatan ?></td>
                <td><?= $jab->divisi ?></td>
                <td><?= $jab->pekerjaan ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_karyawan/" . $jab->id_karyawa) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_karyawan/' . $jab->id_karyawan) ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
        </div>
    </div>
</div>
</div>


    <script>
        $(document).ready( function () {
    $('#karyawan').DataTable({
        // "proccessing" : true,
        // "serverSide" : true,
        // "ajax" : '<?= base_url('admin/registrasi') ?>'
    })
} );
    </script>
    
</body>
</html>