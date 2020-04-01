<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <h1 style="font-size: 52px; font-weight: bold">Edit Registrasi</h1>
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
            <label for="nama">Nama</label>
            <input class="form-control" type="text" name="nama" value="<?= $reg->nama ?>" required>
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
        <div>
            <button class="btn btn-primary" type="submit" name="edit_registrasi">Edit Registrasi</button>
        </div>
    </form>
    <?php endforeach ?>

</body>
</html>