<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Edit Profil</h1>
    <?php foreach($profil as $prof): ?>
    <form action="<?= base_url('admin/e_profil') ?>" method="POST">
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
                <?php foreach($sts_kawin as $kwn): ?>
                <option value="<?= $kwn->id_sts_kawin ?>" <?php if($kwn->id_sts_kawin == $prof->id_profil){echo "selected";} ?>><?= $kwn->sts_kawin ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <input class="form-control" type="text" name="agama" value="<?= $prof->agama ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="e_profil">Edit profil</button>
        </div>
    </form>
    <?php endforeach ?>

</body>
</html>