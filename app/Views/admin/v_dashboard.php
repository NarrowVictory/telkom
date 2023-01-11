<?= $this->extend('admin/default') ?>

<?= $this->section('content') ?>
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
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i><?= $pelanggan ?></h1>
                    <h6 class="text-white">Total Pelanggan<br><small>Jumlah Seluruh Pelanggan Aktif</small></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i><?= $teknisi ?></h1>
                    <h6 class="text-white">Total Teknisi<br><small>Jumlah Seluruh Teknisi</small></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i><?= $paket ?></h1>
                    <h6 class="text-white">Total Paket<br><small>Jumlah Paket yang tersedia</small></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i><?= $keluhan ?></h1>
                    <h6 class="text-white">Total Keluhan<br><small>Jumlah Keluhan yang telah dilaporkan</small></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Progress Box</h4>
                    <div>
                        <canvas id="myChart" height="100px"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <script type="text/javascript">
                        const labels = [
                            'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                        ];

                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Data Keluhan Tahun 2021',
                                backgroundColor: 'rgb(23, 125, 255)',
                                borderColor: 'rgb(23, 125, 255)',
                                data: [60, 75, 74, 61, 80, 67, 59, 77, 63, 50, 82, 67],
                            }]
                        };

                        const config = {
                            type: 'line',
                            data: data,
                            options: {}
                        };

                        var myChart = new Chart(document.getElementById('myChart'), config);
                    </script>
                </div>
            </div>
            <!-- card new -->
        </div>
    </div>
    <?= $this->endSection(''); ?>