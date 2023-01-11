<?= $this->extend('pelanggan/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Form Gangguan Indihome</h4>
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
                <form class="form-horizontal" action="<?= site_url('pelanggan/keluhan/edit/' . $keluhan->id_tickets) ?>" autocomplete="off" method="post">
                    <div class="card-header" style="background-color: black; color:white">
                        Sampaikan Keluhan Anda
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="nomor_internet" class="col-sm-3 text-right control-label col-form-label">Nomor Internet</label>
                            <div class="col-sm-6">
                                <input type="text" name="nomor_internet" class="form-control" value="<?= $keluhan->nomor_internet ?>" id="nomor_internet" placeholder="Masukan Nomor Internet" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-3 text-right control-label col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="<?= $keluhan->nama_pelanggan ?>" placeholder="Masukan Nama Pelanggan" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No. HP</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $keluhan->no_hp ?>" placeholder="Masukan No. HP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat"><?= $keluhan->alamat ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="topik_keluhan" class="col-sm-3 text-right control-label col-form-label">Topik Keluhan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?= $keluhan->topik_keluhan ?>" name="topik_keluhan" id="topik_keluhan" placeholder="Masukan Topik Keluhan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail_keluhan" class="col-sm-3 text-right control-label col-form-label">Detail Keluhan</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="detail_keluhan" placeholder="Masukan Detail Keluhan"><?= $keluhan->no_hp ?></textarea>
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