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
            <h4 style="font-size: 40px; font-weight: bold; line-height: 1em">Edit Profil</h4>
        </div>
        <br><br>
        <div class="card-body">
    
    <?php foreach($profil as $prof): ?>
    <!-- <form action="<?= base_url('admin/e_profil') ?>" method="POST" enctype="multipart/form-data"> -->
    <?= form_open_multipart('admin/e_profil')?>
        <input type="hidden" name="id_profil" id="id_profil" value="<?= $prof->id_profil ?>">
        <div class="form-group">
            <label for="profil">Profil</label>
            <textarea class="form-control" placeholder="Profil Singkat" name="profil" id="profil" cols="30" rows="10"><?= $prof->profil ?></textarea>
        </div>
        <div class="form-group">
            <label for="nama_profil">Nama</label>
            <input class="form-control" type="text" name="nama_profil" value="<?= $prof->nama_profil ?>" required>
        </div>
        <div class="form-group">
            <label for="tpt_lahir">Tempat Lahir</label>
            <input class="form-control" type="text" name="tpt_lahir" value="<?= $prof->tpt_lahir ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input class="form-control" type="date" name="tgl_lahir" value="<?= $prof->tgl_lahir ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat_asal">Alamat Asal</label>
            <input class="form-control" type="text" name="alamat_asal" value="<?= $prof->alamat_asal ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat_sekarang">Alamat Sekarang</label>
            <input class="form-control" type="text" name="alamat_sekarang" value="<?= $prof->alamat_sekarang ?>" required>
        </div>
        <div class="form-group">
            <label for="hobi">Hobi</label>
            <input class="form-control" type="text" name="hobi" value="<?= $prof->hobi ?>" required>
        </div>
        <div class="form-group">
            <label for="id_sts_perkawinan">Status</label>
            <select class="form-control" name="id_sts_perkawinan" id="id_sts_perkawinan">
                <option value="">-Pilih Status-</option>
                <option value="1">Kawin </option>
                <option value="2">Belum Kawin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <input class="form-control" type="text" name="agama" value="<?= $prof->agama ?>" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <input class="form-control" type="file" onchange="preview_image(event)" name="foto" value="oke" required>
        </div>
        <div>
            <img width="100px" id="output" />
        </div>
        
        <div  style="line-height: 50px">
            <button class="btn btn-primary" type="submit">Edit profil</button>
        </div>
    <?= form_close() ?>
    <?php endforeach ?>
        </div>
    </div>
</div>
</div>

<script>
    function preview_image()
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById("output")
            output.src = reader.result
        }
        reader.readAsDataURL(event.target.files[0])
    }
</script>
</body>
</html>