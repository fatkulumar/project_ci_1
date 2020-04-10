

<div class="col-md-12">
    <div class="card">
        <div class="row">
        <div class="card-header">
        <div style="position: absolute"; >
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Aktifitas</h4>
        </div>
        <div>

        </div>
        <br><br>
        <div class="card-body">
     
    <table id="divisi" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Waktu</th>
                <th>Aktifitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 

                $no = 0;
                foreach ($aktifitas as $aktif) :
                $no++;

            ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $aktif->uname_aktifitas ?></td>
                <td><?= $aktif->waktu_aktifitas ?></td>
                <td><?= $aktif->aktifitas ?></td>
                <td><?= $aktif->aksi ?></td>
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
            $('#divisi').DataTable({
                // "proccessing" : true,
                // "serverSide" : true,
                // "ajax" : '<?= base_url('admin/registrasi') ?>'
            })
        } );
    </script>
    
