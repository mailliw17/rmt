<body>
    <div class="card text-center">
        <div class="card-header">
            Selamat Datang di Aplikasi RMT
        </div>
        <div class="card-body">

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url() ?>assets/logo.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">INFORMASI :</h5>
                            <p class="card-text">Pabrik : <?= $this->session->userdata('lokasi_pabrik'); ?></p>
                            <p class="card-text">Lokasi : <?= $this->session->userdata('lokasi_checkpoint'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($this->session->userdata('lokasi_checkpoint') == 'Pelabuhan') : ?>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </div>
                    <div class="col">
                        <a href="<?php echo base_url() ?>operator/isiform" class=" btn btn-primary"><i class="fas fa-qrcode"></i> Barcode</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->userdata('lokasi_checkpoint') == 'Security') : ?>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <a href="<?php echo base_url() ?>scan/scansecurity" class="btn btn-success btn-sm"><i class="fas fa-qrcode" onclick="window.location.reload(true)"></i> Barcode Masuk</a>
                    </div>
                    <div class="col">
                        <a href="<?php echo base_url() ?>scan/scansecurityout" class="btn btn-primary btn-sm"><i class="fas fa-qrcode"></i> Barcode Keluar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->userdata('lokasi_checkpoint') == 'Truck Scale IN') : ?>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </div>
                    <div class="col">
                        <a href="<?php echo base_url() ?>scan/scantsin" class=" btn btn-primary"><i class="fas fa-qrcode"></i> Barcode</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->userdata('lokasi_checkpoint') == 'Gudang Bongkar') : ?>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <a href="<?php echo base_url() ?>scan/scanmulaibongkar" class="btn btn-success btn-sm"><i class="fas fa-qrcode"></i> Mulai Bongkar</a>
                    </div>
                    <div class="col">
                        <a href="<?php echo base_url() ?>scan/scanselesaibongkar" class="btn btn-primary btn-sm"><i class="fas fa-qrcode"></i> Selesai Bongkar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->userdata('lokasi_checkpoint') == 'Truck Scale OUT') : ?>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </div>
                    <div class="col">
                        <a href="<?php echo base_url() ?>scan/scantsout" class=" btn btn-primary"><i class="fas fa-qrcode"></i> Barcode</a>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <div class="card-footer text-muted">
            Developer : PT. Charoen Pokphand Indonesia - William
        </div>
    </div>


</body>

</html>

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('berhasil_barcode')) : ?>
    <script>
        Swal.fire(
            'Berhasil',
            'Barcode Truk Sukses!',
            'success'
        )
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('gagal_barcode')) : ?>
    <script>
        Swal.fire(
            'Gagal',
            'Barcode Tidak Terdaftar!',
            'error'
        )
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('loncat_barcode')) : ?>
    <script>
        Swal.fire(
            'Error',
            'Barcode Tidak Sesuai Urutan Lokasi',
            'warning'
        )
    </script>
<?php endif; ?>