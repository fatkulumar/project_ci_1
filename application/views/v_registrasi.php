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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Registrasi</h4>
        </div>
            <a class="btn btn-primary float-right rounded-pill" href="<?= base_url('admin/v_t_registrasi') ?>">Tambah Registrasi</a></div>
        <div class="card-body">
    
    <table id="myTable" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>NIP</th>
                <th>Karyawan</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Username</th>
                <th>Password</th>
                <th>Jenis User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                foreach ($registrasi as $reg):
                $no++;
            ?>
            <?php 
                $cek_reg = $this->m_admin->cek_reg()->result();
                $jml_cek = count($cek_reg);
                if($jml_cek > 1): 
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $reg->nik ?></td>
                <td><?= $reg->nip ?></td>
                <td><?= $reg->nama_karyawan ?></td>
                <td><?= $reg->ttl ?></td>
                <td><?= $reg->username ?></td>
                <td><?= $reg->password ?></td>
                <td><?php 
                        if($reg->level == 0){
                            echo "Admin";
                        }else{
                            echo "User";
                        }
                    ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url('admin/v_e_registrasi/'. $reg->id_registrasi) ?>">Edit</a> | <a class="btn btn-danger" href="<?= base_url('admin/h_registrasi/'. $reg->id_registrasi) ?>">Hapus</a>
                </td>
            </tr>
            <?php endif ?>
            <?php endforeach ?>
        </bcmod>
    </table>
        </div>
    </div>
</div>
</div>

<script>

$(document).ready( function () {
    $('#myTable').DataTable({
        // "proccessing" : true,
        // "serverSide" : true,
        // "ajax" : '<?= base_url('admin/registrasi') ?>'
    })
} );


    

</script>
    
</body>
</html>