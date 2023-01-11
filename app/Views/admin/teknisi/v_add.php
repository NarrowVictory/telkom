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
                <form class="form-horizontal" action="<?= site_url('admin/tambahteknisi') ?>" autocomplete="off" method="post">
                    <div class="card-header" style="background-color: black; color:white">
                        Form Master Data Teknisi
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nomor_internet" class="col-sm-3 text-right control-label col-form-label">Nama Teknisi</label>
                            <div class="col-sm-6">
                                <input type="text" name="nm_teknisi" class="form-control" id="nm_teknisi" placeholder="Masukan Nama Teknisi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No. Hp</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan No. Hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat" placeholder="Masukan Alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 text-right control-label col-form-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password">
                            </div>
                        </div>
                    </div>

                    <div class="border-top mb-3"></div>
                    <div class="form-group row">
                        <div class="col-sm-3 text-right"></div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('') ?>