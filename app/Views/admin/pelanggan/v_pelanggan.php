<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Data Pelanggan</h4>
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
                <div class="card-header" style="background-color: transparent">
                    <a href="<?= site_url('admin/tambahpelanggan') ?>" class="btn btn-success float-right"><i class="mdi mdi-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 3%">No</th>
                                    <th>Nomor Internet</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Produk</th>
                                    <th style="width: 10%;">Alamat</th>
                                    <th>No. Hp</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pelanggan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->nomor_internet ?></td>
                                        <td><?= $value->nama_pelanggan ?></td>
                                        <td><?= $value->nm_paket ?></td>
                                        <td><?= $value->alamat ?></td>
                                        <td><?= $value->no_hp ?></td>
                                        <td class=" text-center">
                                            <div style="padding:7px 12px; font-size:12px" class="badge badge-pill <?= ($value->status == "Active" ? "badge-success" : "badge-danger") ?>"><?= $value->status ?></div>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= site_url('admin/pelanggan/edit/' . $value->id_pelanggan) ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="<?= site_url('admin/pelanggan/hapus/' . $value->id_pelanggan) ?>" method="POST" class="d-inline">
                                                <input type="hidden" value="delete" name="_method">
                                                <button onclick="return confirm('Yakin akan menghapus Data?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
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
</div>
<?= $this->endSection('') ?>