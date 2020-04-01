<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Tambah Profil</h1>
    <form action="<?= base_url('admin/t_profil') ?>" method="POST">
    <div class="form-group">
            <label for="profil">Profil</label>
            <textarea class="form-control" placeholder="Profil Singkat" name="profil" id="profil" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="nama_profil">Nama</label>
            <input class="form-control" type="text" name="nama_profil"  required>
        </div>
        <div class="form-group">
            <label for="tpt_lahir">Tempat Lahir</label>
            <input class="form-control" type="text" name="tpt_lahir"  required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input class="form-control" type="date" name="tgl_lahir"  required>
        </div>
        <div class="form-group">
            <label for="alamat_asal">Alamat Asal</label>
            <input class="form-control" type="text" name="alamat_asal"  required>
        </div>
        <div class="form-group">
            <label for="alamat_sekarang">Alamat Sekarang</label>
            <input class="form-control" type="text" name="alamat_sekarang"  required>
        </div>
        <div class="form-group">
            <label for="hobi">Hobi</label>
            <input class="form-control" type="text" name="hobi"  required>
        </div>
        <div class="form-group">
            <label for="sts_perkawinan">Status</label>
            <select class="form-control" name="id_sts_perkawinan" id="id_sts_perkawinan">
                <option value="">-Pilih Status-</option>
                <?php foreach($sts_kawin as $kwn): ?>
                <option value="<?= $kwn->id_sts_kawin ?>"><?= $kwn->sts_kawin ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <input class="form-control" type="text" name="agama"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="t_profil">Tambah Profil</button>
        </div>
    </form>

</body>
</html>