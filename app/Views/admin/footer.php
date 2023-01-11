<footer class="footer text-center">
    Sistem Informasi Gangguan Indihome <a href="https://wrappixel.com">PT Telkom Akses Lhoksukon {elapsed_time} seconds</a>.
</footer>
</div>
</div>
<script src="<?= base_url() ?>/template/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/template/dist/js/jquery.ui.touch-punch-improved.js"></script>
<script src="<?= base_url() ?>/template/dist/js/jquery-ui.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url() ?>/template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url() ?>/template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url() ?>/template/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= base_url() ?>/template/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url() ?>/template/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>/template/dist/js/custom.min.js"></script>
<!-- this page js -->
<script src="<?= base_url() ?>/template/assets/libs/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/template/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?= base_url() ?>/template/dist/js/pages/calendar/cal-init.js"></script>
<script src="<?= base_url() ?>/template/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="<?= base_url() ?>/template/assets/extra-libs/DataTables/datatables.min.js"></script>
<script>
    $('#zero_config').DataTable();
</script>

<script src="<?= base_url() ?>/template/assets/libs/sweetalert2/dist/sweetalert2.all.js"></script>
<script>
    const swal = $('.swal').data('swal');

    if (swal) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashData('success') ?>',
            timer: 3000
        })
    }
</script>

</body>

</html>