<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Edit Gangguan</h4>
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
                <form class="form-horizontal" action="<?= site_url('admin/gangguan/edit/' . $gangguan->id_tickets) ?>" autocomplete="off" method="post">
                    <div class="card-header" style="background-color: black; color:white">
                        Form Master Update Data Gangguan
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="id_tickets" class="col-sm-3 text-right control-label col-form-label">Id Tickets</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= $gangguan->id_tickets ?>" name="id_tickets" class="form-control" id="nomor_internet" placeholder="First Name Here" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_internet" class="col-sm-3 text-right control-label col-form-label">Nomor Internet</label>
                            <div class="col-sm-6">
                                <input type="text" style="border: none; outline:none; background:white" value="<?= $gangguan->nomor_internet ?>" name="nomor_internet" class="form-control" id="nomor_internet" placeholder="First Name Here" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-3 text-right control-label col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-6">
                                <input type="text" style="outline: none; border:none; background:white" value="<?= $gangguan->nama_pelanggan ?>" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Last Name Here" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea style="outline: none; border:none; background:white" readonly class="form-control" name="alamat"><?= $gangguan->alamat ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No. Hp</label>
                            <div class="col-sm-6">
                                <input type="text" style="outline: none; border:none; background:white" readonly value="<?= $gangguan->no_hp ?>" class="form-control" name="no_hp" id="no_hp" placeholder="Password Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_keluhan" class="col-sm-3 text-right control-label col-form-label">Status Keluhan</label>
                            <div class="col-md-6">
                                <select class="select2 form-control custom-select" name="status_keluhan" style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    <option value="Pending" <?= ($gangguan->status_keluhan == "Pending" ? "selected" : null) ?>>Pending</option>
                                    <option value="On Proccess" <?= ($gangguan->status_keluhan == "On Proccess" ? "selected" : null) ?>>Sedang Dikerjakan</option>
                                    <option value="Done" <?= ($gangguan->status_keluhan == "Done" ? "selected" : null) ?>>Selesai Dikerjakan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_keluhan" class="col-sm-3 text-right control-label col-form-label">Tanggal Keluhan</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= date("d-M-Y H:i:s", strtotime($gangguan->tgl_keluhan)); ?>" class="form-control" name="tgl_keluhan" id="tgl_keluhan" placeholder="Password Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_proses" class="col-sm-3 text-right control-label col-form-label">Tanggal Proses</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= date("d-M-Y H:i:s", strtotime($gangguan->tgl_proses)); ?>" class="form-control" name="tgl_proses" id="tgl_proses" placeholder="Password Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_selesai" class="col-sm-3 text-right control-label col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?= date("d-M-Y H:i:s", strtotime($gangguan->tgl_selesai)); ?>" class="form-control" name="tgl_selesai" id="tgl_selesai" placeholder="Password Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="closed_by" class="col-sm-3 text-right control-label col-form-label">Closed By</label>
                            <div class="col-sm-6">
                                <input type="text" style="outline: none; border:none; background:white" readonly value="<?= $gangguan->id_teknisi; ?>" class="form-control" name="closed_by" id="closed_by">
                            </div>
                        </div>
                    </div>

                    <div class="border-top mb-3"></div>
                    <div class="form-group row">
                        <div class="col-sm-3 text-right"></div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('') ?>