<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Report Range</h4>
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
                    <h3 class="card-title">Cetak Pertanggal</h4>
                </div>
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div class="input-group mb-3">
                            <label for="tglawal">Tanggal Awal</label>
                            <input type="date" name="tglawal" id="tglawal" class="form-control" />
                        </div>
                        <div class="input-group mb-3">
                            <label for="tglakhir">Tanggal Akhir</label>
                            <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                        </div>
                        <div class="input-group mb-3">
                            <a href="" onclick="this.href='/admin/laporan/cetak-tgl/' + document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">Cetak Laporan</a>
                        </div>
                    </div>


                </div>
            </div>
            <!-- column -->
        </div>
    </div>
</div>

<?= $this->endSection('') ?>