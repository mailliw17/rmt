<div class="container" style="margin-top: 25px;">
    <h3 class="alert alert-primary">Selesai Bongkaran</h3>
    <hr>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="row">Nomor PO :</th>
                <td><?php echo $detail['nomor_po']; ?></td>
            </tr>
            <tr>
                <th scope="row">Plat Nomor : </th>
                <td><?php echo $detail['plat_nomor']; ?></td>
            </tr>
            <tr>
                <th scope="row">Nomor Segel : </th>
                <td><?php echo $detail['nomor_segel']; ?></td>
            </tr>
            <tr>
                <th scope="row">Nomor Surat Jalan : </th>
                <td><?php echo $detail['nomor_sj']; ?></td>
            </tr>
            <tr>
                <th scope="row">Quatity : </th>
                <td><?php echo $detail['qty']; ?></td>
            </tr>

            <form action="<?= base_url() ?>scan/selesaibongkar_ok" method="POST">
                <!-- waktu di security in -->
                <input type="hidden" name="id_barcode" id="id_barcode" value="<?php echo $id_barcode ?>">
                <input type="hidden" name="selesai_bongkar" id="selesai_bongkar" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                        echo date("Y-m-d H:i:s"); ?>">
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-sm btn-block">Kirim</button>
    </form>
</div>