<?= $this->extend('pelanggan/default') ?>

<?= $this->section('content') ?>

<div class="swal" data-swal="<?= session()->getFlashData('success') ?>"></div>

<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Dashboard</h4>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- card new -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-3">Data Pengaduan</h4>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 3%">No</th>
                                    <th>Id Tickets</th>
                                    <th>Topik Keluhan</th>
                                    <th>Tanggal Keluhan</th>
                                    <th>Tanggal Proses</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gangguan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->id_tickets ?></td>
                                        <td><?= $value->topik_keluhan; ?></td>
                                        <td><?= date("d-M-Y H:i:s", strtotime($value->tgl_keluhan)); ?></td>
                                        <td><?php if (isset($value->tgl_proses)) {
                                                echo $value->tgl_proses;
                                            } else {
                                                echo "Belum Diproses";
                                            } ?></td>
                                        <td><?php if (isset($value->tgl_selesai)) {
                                                echo $value->tgl_proses;
                                            } else {
                                                echo "Belum Diperbaiki";
                                            } ?></td>
                                        <td>
                                            <div style="padding:7px 12px; font-size:12px" class="badge badge-pill <?php if ($value->status_keluhan == "Pending") {
                                                                                                                        echo 'badge-info';
                                                                                                                    } else if ($value->status_keluhan == "On Proccess") {
                                                                                                                        echo 'badge-warning';
                                                                                                                    } else {
                                                                                                                        echo 'badge-success';
                                                                                                                    } ?>"><?php if (isset($value->status_keluhan)) {
                                                                                                                                echo $value->status_keluhan;
                                                                                                                            } else {
                                                                                                                                echo "Pending";
                                                                                                                            } ?></div>
                                        </td>
                                        <td class="text-center" style="white-space:nowrap">
                                            <a class="btn btn-xs btn-warning" href="<?= site_url('pelanggan/keluhan/edit/' . $value->id_tickets) ?>"><i class="mdi mdi-tooltip-edit"></i></a>
                                            <form action="<?= site_url('pelanggan/keluhan/hapus/' . $value->id_tickets) ?>" method="POST" class="d-inline">
                                                <input type="hidden" value="delete" name="_method">
                                                <button onclick="return confirm('Yakin akan menghapus Data?')" class="btn btn-xs btn-danger"><i class="mdi mdi-delete"></i></button>
                                            </form>
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
    <?= $this->endSection(''); ?>