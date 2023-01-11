<?= $this->extend('v_index') ?>

<?= $this->section('content') ?>
<div class="jumbotron jumbotron-fluid" style="background-image: url(<?= base_url() ?>/template_atlantis/examples/assets/img/bg-bantuan-new.jpeg); height:400px">
</div>

<!-- Tampilan HP -->
<div class="d-sm-flex">
    <div style="height:15px"></div>
    <div class="row">
        <div style="padding-left:30px;padding-right:0px" class="col-2"><img src="<?= base_url() ?>/template_atlantis/examples/assets/img/ic-laporggn-gear.svg"></div>
        <div class="col-8">
            <a href="">
                <h5>Pengaduan Layanan</h5>
            </a>
            <span class="txtDesc" style="font-size:12px">Solusi menyelesaikan kendala IndiHome Anda.</span>
        </div>
        <a href="">
            <div style="padding-top:30px" class="col-2"><img src="<?= base_url() ?>/template_atlantis/examples/assets/img/ic-chevron-right-bold.svg"></div>
        </a>
    </div>
    <hr>
    <div class="row">
        <div style="padding-left:30px;padding-right:0px" class="col-2"><img src="<?= base_url() ?>/template_atlantis/examples/assets/img/ic-call-centre.svg"></div>
        <div class="col-8">
            <a href="">
                <h5>Call Center &amp; Email</h5>
            </a>
            <span class="txtDesc" style="font-size:12px">Sampaikan pertanyaan atau keluhan seputar layanan IndiHome.</span>
        </div>
        <a href="">
            <div style="padding-top:30px" class="col-2"><img src="<?= base_url() ?>/template_atlantis/examples/assets/img/ic-chevron-right-bold.svg"></div>
        </a>
    </div>
    <hr>

    <div class="row">
        <div style="padding-left:30px;padding-right:0px" class="col-2"><img src="<?= base_url() ?>/template_atlantis/examples/assets/img/ic-plasa-telkom.svg"></div>
        <div class="col-8">
            <a href="/bantuan/plasa-telkom">
                <h5>Plasa Telkom</h5>
            </a>
            <span class="txtDesc" style="font-size:12px">Dapatkan informasi plasa Telkom di seluruh Indonesia.</span>
        </div>
        <a href="">
            <div style="padding-top:30px" class="col-2"><img src="<?= base_url() ?>/template_atlantis/examples/assets/img/ic-chevron-right-bold.svg"></div>
        </a>
    </div>

    <hr>
</div>

<?= $this->endSection() ?>