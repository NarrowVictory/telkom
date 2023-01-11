<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Tambah Pelanggan</h4>
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
            <div class="card">
                <form class="form-horizontal" action="<?= site_url('admin/teknisi/edit/' . $teknisi->id_teknisi) ?>" autocomplete="off" method="post">
                    <div class="card-header" style="background-color: black; color:white">
                        Form Master Data Teknisi
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id_teknisi" value="<?= $teknisi->id_teknisi ?>">
                        <div class="form-group row">
                            <label for="nomor_internet" class="col-sm-3 text-right control-label col-form-label">Nama Teknisi</label>
                            <div class="col-sm-6">
                                <input type="text" name="nm_teknisi" value="<?= $teknisi->nm_teknisi ?>" class="form-control" id="nm_teknisi" placeholder="First Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= $teknisi->email ?>" class="form-control" name="email" id="email" placeholder="Last Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No. Hp</label>
                            <div class="col-sm-6">
                                <input type="password" value="<?= $teknisi->no_hp ?>" class="form-control" name="no_hp" id="no_hp" placeholder="Password Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat"><?= $teknisi->alamat ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="border-top mb-3"></div>
                    <div class="form-group row">
                        <div class="col-sm-3 text-right"></div>
                        <div class="col-sm-6">
                            <a href="<?= site_url('admin/teknisi') ?>" class="btn btn-default"><i class="mdi mdi-arrow-left"></i></a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('') ?>