<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= site_url('admin/dashboard') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Master Data</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?= site_url('admin/pelanggan') ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Data Pelanggan </span></a></li>
                        <li class="sidebar-item"><a href="<?= site_url('admin/teknisi') ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Data Teknisi </span></a></li>
                        <li class="sidebar-item"><a href="<?= site_url('admin/gangguan') ?>" class="sidebar-link"><i class="mdi mdi-alert-circle-outline"></i><span class="hide-menu"> Data Pengaduan </span></a></li>
                        <li class="sidebar-item"><a href="<?= site_url('admin/product') ?>" class="sidebar-link"><i class="fab fa-product-hunt"></i><span class="hide-menu"> Data Produk </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Report </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <!-- <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Daily Report </span></a></li> -->
                        <li class="sidebar-item"><a href="<?= site_url('admin/laporan/cetak-minggu') ?>" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Weekly report </span></a></li>
                        <li class="sidebar-item"><a href="<?= site_url('admin/laporan/cetak-bulan') ?>" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Monthly Report </span></a></li>
                        <li class="sidebar-item"><a href="<?= site_url('admin/laporan/cetak-tgl') ?>" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Date Range Report </span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>