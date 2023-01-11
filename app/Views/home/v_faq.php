<?= $this->extend('v_index'); ?>

<?= $this->section('content') ?>

<style>
    h3 {
        font-size: 1.3rem;
        line-height: 3.1rem;
        font-weight: 700;
        font-family: Nunito, sans-serif;
    }
</style>

<h3>Pertanyaan yang sering ditanyakan</h3>
<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Apa itu IndiHome?
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                Layanan digital yang menyediakan Internet Rumah, Telepon Rumah dan TV Interaktif (IndiHome TV) dengan beragam pilihan paket. Saat ini, jaringan IndiHome sudah tersebar di seluruh wilayah Indonesia, dan terus berinovasi untuk memenuhi kebutuhan internet yang lebih baik bagi masyarakat.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Apa yang dimaksud dengan gangguan massal?
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                Gangguan layanan yang terjadi di satu area yang luas.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Apa yang dimaksud dengan isolir?
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                Pemutusan akses layanan sementara, karena pelanggan melewati batas waktu pembayaran tagihan.
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>