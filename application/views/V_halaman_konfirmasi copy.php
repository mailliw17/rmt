<div class="container" style="margin-top: 25px;">
    <h3 class="alert alert-primary">Cek Data Truk</h3>
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
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-sm btn-block">Oke</button>
</div>