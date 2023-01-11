<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Update Pelanggan</h4>
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
                <form class="form-horizontal" action="<?= site_url('admin/pelanggan/edit/' . $pelanggan->id_pelanggan) ?>" autocomplete="off" method="post">
                    <div class="card-header" style="background-color: black; color:white">
                        Form Master Update Data Pelanggan
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id_users" value="<?= $pelanggan->id_users ?>" id="">
                        <div class="form-group row">
                            <label for="nomor_internet" class="col-sm-3 text-right control-label col-form-label">Nomor Internet</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= $pelanggan->nomor_internet ?>" name="nomor_internet" class="form-control" id="nomor_internet" placeholder="First Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-3 text-right control-label col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= $pelanggan->nama_pelanggan ?>" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Last Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_paket" class="col-sm-3 text-right control-label col-form-label">Nama Produk</label>
                            <div class="col-md-6">
                                <select class="select2 form-control custom-select" name="id_paket" style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    <option value="1" <?= ($pelanggan->id_paket == 1 ? "selected" : null) ?>>Produk 10Mbps</option>
                                    <option value="2" <?= ($pelanggan->id_paket == 2 ? "selected" : null) ?>>Produk 20Mbps</option>
                                    <option value="3" <?= ($pelanggan->id_paket == 3 ? "selected" : null) ?>>Produk 30Mbps</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat"><?= $pelanggan->alamat ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No. Hp</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= $pelanggan->no_hp ?>" class="form-control" name="no_hp" id="no_hp" placeholder="Password Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                            <div class="col-sm-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation1" value="Active" <?php if ($pelanggan->status == 'Active') {
                                                                                                                                        echo ' checked ';
                                                                                                                                    } ?> name="status" required>
                                    <label class="custom-control-label" for="customControlValidation1">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation2" value="InActive" <?php if ($pelanggan->status == 'InActive') {
                                                                                                                                        echo ' checked ';
                                                                                                                                    } ?> name="status" required>
                                    <label class="custom-control-label" for="customControlValidation2">InActive</label>
                                </div>
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