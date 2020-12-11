<?php
$total = $data_po['qty_rencana'];
$current = $data_po['jumlah'];
$persentasi = ($current <= 0 ? $current = 0 :  round(($current / $total) * 100, 1));
?>


<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Halaman Utama</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Tracking Armada</a>
            </li> -->
        </ul>
    </div>
    <div class="card-body">
        <h5 class="card-title">Selamat Datang Pak <?= $this->session->userdata('nama'); ?> di Aplikasi RMT</h5>
        <div class="container align-self-center">
            <div class="row">
                <div class="col">
                    <div class="card text-white bg-primary mb-3" style="max-width: 15rem;">
                        <div class="card-header">Nomor PO : <?php echo $data_po['nomor_po']; ?></div>
                        <div class="card-body">
                            <h5 class="card-title" id="qty_direncanakan">Qty Direncakan : <?php echo number_format($data_po['qty_rencana']); ?> KG </h5>
                            <p class="card-text"><?php echo $data_po['nama_barang']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="card-text">Quantity Diterima : <?php echo number_format($data_po['jumlah']); ?> KG</p>
        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $persentasi; ?>%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><?= $persentasi; ?>%</div>
        </div>

        <div class="container" style="margin-top: 50px;">
            <div class="table-responsive">
                <table id="" class="table table-striped table-bordered " style="width:10%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Terdaftar</th>
                            <th>Diterima</th>
                            <th>Ditolak</th>
                            <th>Keberhasilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($analisis as $a) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo
                                            date("l d/m/Y", strtotime($a['tanggal'])); ?> </td>
                                <td> <?php echo $a['pelabuhan']; ?> </td>
                                <td> <?php echo $a['diterima']; ?> </td>
                                <td> <?php echo  $a['pelabuhan'] - $a['diterima']; ?> </td>
                                <td> <?php echo round(($a['diterima'] / $a['pelabuhan']) * 100, 1); ?>%</td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px;">
            <div class="col">
                <a href="<?php echo base_url() ?>admin/tracking" class="btn btn-success btn-sm"><i class="fas fa-search-location"></i> Tracking Armada</a>
            </div>
            <div class="col">
                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </div>
        </div>

    </div>
    <div>

    </div>
    <div class="card-footer text-muted">
        Developer : PT. Charoen Pokphand Indonesia - William
    </div>
</div>