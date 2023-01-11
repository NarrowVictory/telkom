<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Tambah Paket</h4>
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
                <form class="form-horizontal" action="<?= site_url('admin/paket/edit/' . $paket->id_paket) ?>" autocomplete="off" method="post">
                    <div class="card-header" style="background-color: black; color:white">
                        Form Master Data Paket
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id_paket" value="<?= $paket->id_paket ?>">
                        <div class="form-group row">
                            <label for="nomor_internet" class="col-sm-3 text-right control-label col-form-label">Nama Paket</label>
                            <div class="col-sm-6">
                                <input type="text" name="nm_paket" value="<?= $paket->nm_paket ?>" class="form-control" id="nm_paket" placeholder="Masukan Nama Paket">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?= $paket->spesifikasi ?>" name="spesifikasi" id="spesifikasi" placeholder="Tuliskan Spesifkasi/Keterangan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 text-right control-label col-form-label">Harga</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?= $paket->harga ?>" name="harga" id="harga" placeholder="Masukan Harga Paket">
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