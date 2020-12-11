<?php
function hoursandmins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
?>
<div class="container" style="margin-top: 10px;">
    <div class="table-responsive">
        <table id="mydatatable" class="table table-striped table-bordered mydatatable" style="width:100%">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Plat Nomor</th>
                    <th>Nomor SJ</th>
                    <th>Qty</th>
                    <th>Durasi</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tracking as $t) :
                ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $t['plat_nomor']; ?> </td>
                        <td> <?php echo $t['nomor_sj']; ?> </td>
                        <td> <?php echo number_format($t['qty']); ?> Kg</td>
                        <td> <?php if (is_null($t['durasi'])) {
                                    echo '<div class="badge badge-danger">Belum Selesai</div>';
                                } else {
                                    echo hoursandmins($t['durasi'], '%02d Jam %02d Menit');
                                }
                                ?> </td>
                        <td>
                            <a id="detail" href="" class=" btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#modalDetail" data-pelabuhan="<?= $t['pelabuhan'] ?>" data-security_in="<?= $t['security_in'] ?>" data-ts_in="<?= $t['ts_in'] ?>" data-mulai_bongkar="<?= $t['mulai_bongkar'] ?>" data-selesai_bongkar="<?= $t['selesai_bongkar'] ?>" data-ts_out="<?= $t['ts_out'] ?>" data-security_out="<?= $t['security_out'] ?>">
                                <span class="icon text-white-50">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <span class="text">Lokasi</span>
                            </a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
        <div class="row" style="margin-bottom: 10px;">
            <div class="col">
                <a href="<?php echo base_url() ?>admin" class="btn btn-success btn-sm"><i class="fas fa-sign-out-alt"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>