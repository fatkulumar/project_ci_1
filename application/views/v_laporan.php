<?php 
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Task</title>
</head>
<body>
    <h1 style="text-align: center"><strong>Laporan Pekerjaan</strong></h1>
    
    <table border="1" id="task" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Divisi</th>
                <th>Pekerjaan</th>
                <th>Deskripsi</th>
                <th>Tanggal Penugasan</th>
                <th>Tanggal Selesai</th>
                <th>Progress Pekerjaan</th>
            </tr>
            </thead>
            <?php
                $no = 0;
                foreach($task as $tas):
                $no++
            ?>
            <tbody>
            <tr>
                <td style=text-align:center><?= $no ?></td>
                <td style=text-align:center><?= $tas->nama_karyawan ?></td>
                <td style=text-align:center><?= $tas->divisi ?></td>
                <td style=text-align:center><?= $tas->pekerjaan ?></td>
                <td style=text-align:center><?= $tas->keterangan ?></td>
                <td style=text-align:center><?= $tas->tgl_penugasan ?></td>
                <td style=text-align:center><?= $tas->tgl_penyelesaian ?></td>
                <td>
                    <?php 
                        $progess = $tas->progress; 
                        if($progess == 0): ?>
                            On Progress
                        <?php else: ?>
                            Closed
                        <?php endif ?>
                </td>
            </tr>            
        </div>
        <?php endforeach ?>
        </tbody>
    </table>

</body>
</html>