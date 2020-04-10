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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Tambah Registrasi</h4>
        </div>
        <br><br>
    <div class="card-body">
    
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
                    <option value="<?= $kar->id_karyawa ?>"><?= $kar->nama_karyawan ?></option>
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

        <!-- <div class="form-group">
            <label for="id_karawan">Gak Penting</label>
            <select class="form-control" name="id_karyawan" id="id_karyawan">
                <option value="">-Pilih Karyawan-</option>
                <?php foreach($gakJelas as $ga ): ?>
                    <option value="<?= $ga->id_karyawa ?>"><?= $ga->id_registrasi ?></option>
                <?php endforeach ?>
            </select>
        </div> -->

            <button class="btn btn-primary" type="submit" name="registrasi">Registrasi</button>
        </div>
    </form>

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