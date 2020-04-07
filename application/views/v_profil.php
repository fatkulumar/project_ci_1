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

    <table class="table table-striped">
        <?php 

            $no = 0;
            foreach ($profil as $prof) :
            $no++;

        ?>
        <thead>

            <tr>
                <th>
                    <div>
                        <img width="100px" src="<?= base_url() ?>/assets/img/<?= $prof->foto ?>" alt="Foto Orang Sempurna">
                    </div>
                </th>
            </tr>

            <tr>
                <th>No.Registrasi</th>
                <th><?= $prof->id_registrasi ?></th>
            </tr>
            <tr>
                <th>Profil</th>
                <th><?= $prof->profil ?></th>
            </tr>
            <tr>
                <th>Nama</th>
                <th><?= $prof->nama_profil ?></th>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <th><?= $prof->tpt_lahir ?></th>
            </tr>    
            <tr>
                <th>Tanggal Lahir</th>
                <th><?= $prof->tgl_lahir ?></th>
            </tr>
            <tr>
                <th>Domisili</th>
                <th><?= $prof->alamat_sekarang ?></th>
            </tr>
            <tr>
                <th>Asal</th>
                <th><?= $prof->alamat_asal ?></th>
            </tr>
            <tr>
                <th>Hobi</th>
                <th><?= $prof->hobi ?></th>
            </tr>
            <tr>
                <th>Status Perkawinan</th>
                <th><?php 
                        $sts = $prof->id_sts_perkawinan;
                        if($sts == 0) {
                            echo "";
                        }elseif($sts == 1){
                            echo "Belum Kawin";
                        }else{
                            echo "Kawin";
                        }
                    ?></th>
            </tr>
            <tr>
                <th>Agama</th>
                <th><?= $prof->agama ?></th>
            </tr>                <td>
                    <a class="btn btn-primary" href="<?= base_url("admin/v_e_profil/". $prof->id_profil) ?>">Edit</a> 
                </td>
            </tr>
            <?php endforeach ?>
        </thead>
    </table>
        </div>
    </div>
</div> 
</body>
</html>