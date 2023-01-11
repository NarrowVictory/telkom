<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Data Teknisi</h4>
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
                    <a href="<?= site_url('admin/tambahteknisi') ?>" class="btn btn-success float-right"><i class="mdi mdi-plus"></i> Tambah Teknisi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Teknisi</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>No. Telp</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teknisi as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->nm_teknisi ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->username ?></td>
                                        <td><?= $value->no_hp ?></td>
                                        <td><?= $value->alamat; ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('admin/teknisi/edit/' . $value->id_teknisi) ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="<?= site_url('admin/teknisi/hapus/' . $value->id_teknisi) ?>" method="POST" class="d-inline">
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