<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Report Bulanan</h4>
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
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cetak Perbulan</h4>
                </div>

                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div class="input-group mb-3">
                            <label for="tgl">Pilih Bulan</label>
                            <input type="month" name="tgl" id="tgl" class="form-control" />
                        </div>
                        <div class="input-group mb-3">
                            <a href="" onclick="this.href='/admin/laporan/cetak-bulan/' + document.getElementById('tgl').value" target="_blank" class="btn btn-primary">Cetak Laporan</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- column -->
        </div>
    </div>
</div>

<?= $this->endSection('') ?>