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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Edit Registrasi</h4>
        </div>
        <br><br>
        <div class="card-body">
    
    <?php foreach($registrasi as $reg): ?>
    <form action="<?= base_url('admin/e_registrasi')?>" method="POST">
    <input type="hidden" name="id_registrasi" value="<?= $reg->id_registrasi ?>">
        <div class="form-group">
            <label for="nip">NIP</label>
            <input class="form-control" type="number" name="nip" value="<?= $reg->nip ?>" required>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input class="form-control" type="text" name="nik" value="<?= $reg->nik ?>" required>
        </div>
        <div class="form-group">
            <label for="id_karawan">Karyawan</label>
            <select class="form-control" name="id_karyawan" id="id_karyawan" required>
                <option value="">-Pilih Karyawan-</option>
                <?php foreach($karyawan as $kar ): ?>
                    <option value="<?= $kar->id_karyawa ?>" <?php if($kar->id_karyawa == $reg->id_karyawan){echo "selected";}?>><?= $kar->nama_karyawan ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ttl">Tempat, Tanggal Lahir</label>
            <input class="form-control" type="text" name="ttl" value="<?= $reg->ttl ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" value="<?= $reg->username ?>" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="text" name="password" value="<?= $reg->password ?>" required>
        </div>
        <div class="form-group">
            <label for="level">Jenis User</label>
            <select class="form-control" name="level" id="level">
                <option value="">-Pilih-</option>
                <option value="0" <?php if($reg->level == 0){echo "selected";} ?>>Admin</option>
                <option value="1" <?php if($reg->level == 1){echo "selected";} ?>>User</option>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="edit_registrasi">Edit Registrasi</button>
        </div>
    </form>
    <?php endforeach ?>

        </div>
    </div>
</div>
    </div>

    <script>

        $(document).ready(function(){

            $('#id_karyawan').on('change', function (event) {
                event.preventDefault();
                var id_karyawan = $("#id_karyawan").val()
                $.ajax({
                    type : 'POST',
                    url : '<?= base_url('admin/getAjaxKaryawan') ?>',
                    data : "id_karyawan=" + id_karyawan,
                    dataType : 'JSON',
                    cache : false,
                    success : function(data){
                        var html = ""
                        for(i =0; i<data.length; i++){
                            html += data[i].nama_karyawan
                        }
                        $("#nama").val(html)
                    }
                });
            })
        })
    

    </script>

</body>
</html>