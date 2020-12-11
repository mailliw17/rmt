<div class="container" style="margin-top: 25px;">
    <h3 class="alert alert-primary">Mulai Bongkaran</h3>
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
                <th scope="row">Nomor Surat Jalan : </th>
                <td><?php echo $detail['nomor_sj']; ?></td>
            </tr>
            <tr>
                <th scope="row">Quatity : </th>
                <td><?php echo $detail['qty']; ?></td>
            </tr>

            <form action="<?= base_url() ?>scan/mulaibongkar_ok" method="POST">
                <input type="hidden" name="id_barcode" id="id_barcode" value="<?php echo $id_barcode ?>">
                <input type="hidden" name="mulai_bongkar" id="mulai_bongkar" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                    echo date("Y-m-d H:i:s"); ?>">
                <div class="form-group">
                    <label for="exampleInputPassword1">Lokasi Bongkar</label>
                    <button href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalScan"><i class="fas fa-qrcode"></i> SCAN</button>
                    <br>
                    <div class="badge badge-info" id="lokasi_badges"></div>
                    <input type="hidden" class="form-control" id="lokasi_bongkar" name="lokasi_bongkar" autocomplete="off">
                </div>

                <div class="form-group" id="nomor_segel_group" style='display: none;'>
                    <label for="exampleInputPassword1">Nomor Segel</label>
                    <div class="badge badge-danger">Pilih salah satu</div>
                    <input list="nomor_segel_dropdown" class="form-control" id="nomor_segel" name="nomor_segel" required autocomplete="off">
                    <datalist id="nomor_segel_dropdown">
                        <?php
                        foreach ($nomor_segel as $ns) : ?>
                            <option value="<?= $ns->nomor_segel ?>"></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-sm btn-block" id="start_button">Kirim</button>
    </form>

    <div class="modal fade" id="modalScan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scan Barcode Gudang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-auto">
                    <canvas></canvas>
                    <hr>
                    <select></select>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a type="button" class="btn btn-primary" href="<?php echo base_url() ?>auth/logout">Keluar</a>
                </div> -->
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/qrcodelib.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/webcodecamjquery.js"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
                // $.post("../cek.php", { noijazah: result.code} );
                document.getElementById('lokasi_bongkar').value = result.code;
                document.getElementById('lokasi_badges').innerHTML = result.code;
                document.getElementById('nomor_segel_group').style.display = "block";
                $('#modalScan').modal('hide');
            }
        };

        var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
        decoder.buildSelectMenu("select");
        decoder.play();
        /*  Without visible select menu
            decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
        */
        $('select').on('change', function() {
            decoder.stop().play();
        });

        // jquery extend function
        $.extend({
            redirectPost: function(location, args) {
                var form = '';
                $.each(args, function(key, value) {
                    form += '<input type="hidden" name="' + key + '" value="' + value + '">';
                });
                $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
            }
        });

        // function stoppedTyping() {
        //     if (this.value.length > 0) {
        //         document.getElementById('start_button').disabled = false;
        //     } else {
        //         document.getElementById('start_button').disabled = true;
        //     }
        // }
    </script>
</div>