<?= $this->extend('teknisi/default') ?>

<?= $this->section('content') ?>

<div class="swal" data-swal="<?= session()->getFlashData('success') ?>"></div>

<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Dashboard</h4>
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
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i><?= $total ?></h1>
                    <h6 class="text-white">Total Keluhan<br><small>Jumlah total seluruh keluhan</small></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i><?= $pending ?></h1>
                    <h6 class="text-white">Keluhan Pending<br><small>Keluhan yang belum ditangani</small></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i><?= $onproccess ?></h1>
                    <h6 class="text-white">Keluhan On Proccess<br><small>Keluhan yang sedang ditangani</small></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i><?= $done ?></h1>
                    <h6 class="text-white">Keluhan Done<br><small>Keluhan yang telah ditangani</small></h6>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(''); ?>