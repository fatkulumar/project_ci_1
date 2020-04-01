<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Tambah Registrasi</h1>
    <form action="<?= base_url('admin/t_registrasi')?>" method="POST">
        <div class="form-group">
            <label for="nip">NIP</label>
            <input class="form-control" type="number" name="nip"  required>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input class="form-control" type="text" name="nik"  required>
        </div>
        <div class="form-group">
            <label for="id_karawan">Karyawan</label>
            <select class="form-control" name="id_karyawan" id="id_karyawan">
                <option value="">-Pilih Karyawan-</option>
                <?php foreach($karyawan as $kar ): ?>
                    <option value="<?= $kar->id_karyawan ?>"><?= $kar->nama_karyawan ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input class="form-control" type="text" name="nama" id="nama"  required>
        </div>
        <div class="form-group">
            <label for="ttl">Tempat, Tanggal Lahir</label>
            <input class="form-control" type="text" name="ttl"  required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username"  required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="text" name="password"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="registrasi">Registrasi</button>
        </div>
    </form>

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
                            html += data[i].nama
                        }
                        $("#nama").val(html)
                    }
                });
            })
        })
    

    </script>

</body>
</html>