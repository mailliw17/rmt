<!-- Modal Logout -->
<div class="modal fade" id="modalKeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar dari sistem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin keluar ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a type="button" class="btn btn-primary" href="<?php echo base_url() ?>auth/logout">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Lokasi -->
<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Lokasi Truk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Pelabuhan :</th>
                            <td> <span id="pelabuhan"></span> </td>
                        </tr>
                        <tr>
                            <th>Masuk Pabrik :</th>
                            <td> <span id="security_in"></span> </td>
                        </tr>
                        <tr>
                            <th>Truck Scale IN :</th>
                            <td> <span id="ts_in"></span> </td>
                        </tr>
                        <tr>
                            <th>Mulai Bongkar :</th>
                            <td> <span id="mulai_bongkar"></span> </td>
                        </tr>
                        <tr>
                            <th>Selesai Bongkar :</th>
                            <td> <span id="selesai_bongkar"></span> </td>
                        </tr>
                        <tr>
                            <th>Truck Scale OUT :</th>
                            <td> <span id="ts_out"></span> </td>
                        </tr>
                        <tr>
                            <th>Keluar Pabrik :</th>
                            <td> <span id="security_out"></span> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery/popper.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>vendor/fontawesome/js/all.min.js"></script>
<script src="<?= base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $('.mydatatable').DataTable();
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var pelabuhan = $(this).data('pelabuhan');
            var security_in = $(this).data('security_in');
            var ts_in = $(this).data('ts_in');
            var mulai_bongkar = $(this).data('mulai_bongkar');
            var selesai_bongkar = $(this).data('selesai_bongkar');
            var ts_out = $(this).data('ts_out');
            var security_out = $(this).data('security_out');
            $('#pelabuhan').text(pelabuhan);
            $('#security_in').text(security_in);
            $('#ts_in').text(ts_in);
            $('#mulai_bongkar').text(mulai_bongkar);
            $('#selesai_bongkar').text(selesai_bongkar);
            $('#ts_out').text(ts_out);
            $('#security_out').text(security_out);
        })
    })
</script>