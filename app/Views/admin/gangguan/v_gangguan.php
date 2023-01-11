<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Data Pengaduan Pelanggan</h4>
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
</div>

<div class="swal" data-swal="<?= session()->getFlashData('success') ?>"></div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-3"> Pengaduan Gangguan Indihome </h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Tickets</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nomor Hp</th>
                                    <th>Topik Keluhan</th>
                                    <th>Tanggal Keluhan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gangguan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->id_tickets ?></td>
                                        <td><?= $value->nama_pelanggan ?></td>
                                        <td><?= $value->no_hp ?></td>
                                        <td><?= $value->topik_keluhan ?></td>
                                        <td><?= $value->tgl_keluhan ?></td>
                                        <td class=" text-center">
                                            <div style="padding:7px 12px; font-size:12px" class="badge badge-pill <?php if ($value->status_keluhan == "Pending") {
                                                                                                                        echo 'badge-info';
                                                                                                                    } else if ($value->status_keluhan == "On Proccess") {
                                                                                                                        echo 'badge-warning';
                                                                                                                    } else {
                                                                                                                        echo 'badge-success';
                                                                                                                    } ?>"><?= ($value->status_keluhan != null) ? "$value->status_keluhan" : "Belum Ditanggapi" ?></div>
                                        </td>
                                    <?php endforeach; ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('') ?>