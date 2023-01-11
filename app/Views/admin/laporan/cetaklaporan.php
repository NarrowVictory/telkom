<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static {
            position: relative;
            border: 1px solid brown;
        }
    </style>
    <title>Cetak Data Keluhan</title>
</head>

<body>
    <div>

    </div>
    <table align="center" style="width: 95%; border-style: none;">
        <tr>
            <td style="width: 70%">
                <h1 style="padding-left: 50%"><b>Laporan Keluhan Pelanggan</b></h1>
            </td>
            <td style="width: 30%"><img style="padding-left: 50%" src="<?= base_url() ?>/template/assets/images/logo_cetak.png" /></td>
            <!-- <td style="width: 30%"><img style="padding-left: 80%; margin-bottom: 20px" src="<?= base_url() ?>/template/assets/images/logo_cetak.png"/></td> -->
        </tr>
    </table>
    <div style="margin-top: 20px" class="form-group">
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>id_tickets</th>
                    <th>Nama Pelanggan</th>
                    <th>No Internet</th>
                    <th>No. Hp</th>
                    <th>Tgl Keluhan</th>
                    <th>Tokpik Keluhan</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $key => $value) : ?>
                    <tr>
                        <td><?= $value->id_tickets ?></td>
                        <td><?= $value->nama_pelanggan ?></td>
                        <td><?= $value->nomor_internet ?></td>
                        <td><?= $value->no_hp ?></td>
                        <td><?= $value->tgl_keluhan ?></td>
                        <td><?= $value->topik_keluhan ?></td>
                        <td><?= $value->alamat ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>