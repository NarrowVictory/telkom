<?= $this->extend('v_index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="d-none d-sm-block col-sm-5">
            <div class="mainTxt">
                <h1>Apa itu IndiHome?</h1><br>
                <p style="max-width:333px">Layanan digital yang menyediakan Internet, Telepon Rumah dan TV Interaktif/IPTV (IndiHome TV) dengan beragam pilihan paket serta layanan tambahan yang bisa dipilih sesuai kebutuhan Anda. Saat ini, jaringan IndiHome sudah tersebar di seluruh wilayah Indonesia, dan terus berinovasi untuk memenuhi kebutuhan internet yang lebih baik bagi masyarakat.</p><br><br>
            </div>
        </div>
        <div class="d-none d-sm-block col-12 col-sm-7"><img class="float-right img-banner" alt="indihome banner" src="<?= base_url() ?>/template_atlantis/examples/assets/img/IndiHome_banner-home-1.jpg" width="100%"></div>
        <div style="margin-top:-12px" class="d-sm-none col-12 col-sm-6"><img class="float-right" alt="indihome banner" src="/images/IndiHome_banner-home-1-mobile.jpg" width="100%"></div>
        <div class="d-sm-none col-12">
            <div class="mainTxt">
                <p class="welcomeTxt">Selamat datang di IndiHome</p>
                <h3>Apa itu IndiHome?</h3>
                <p>Layanan digital yang menyediakan Internet, Telepon Rumah dan TV Interaktif (IndiHome TV) dengan beragam pilihan paket serta layanan tambahan yang bisa dipilih sesuai kebutuhan Anda. Saat ini, jaringan IndiHome sudah tersebar di seluruh wilayah Indonesia, dan terus berinovasi untuk memenuhi kebutuhan internet yang lebih baik bagi masyarakat.</p><button class="btnPrimary" type="button"><a href="/paket/daftar">Berlangganan Sekarang</a></button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>