<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Scan QR Code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>

    <?php if ($this->session->flashdata('gagal')) : ?>
        <!-- <h3 class="panel-title">Arahkan Kode QR Ke Kamera!</h3> -->
        <audio controls autoplay hidden>
            <source src="<?= base_url() ?>assets/gagal.mp3" type="audio/mpeg">
        </audio>
    <?php endif; ?>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="justify-content-center">
                <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> -->
                <!-- <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> -->
                <!-- </button> -->
                <!-- <h3 class="navbar-brand"> <strong>Scan QR Pallet & Input Kode PO</strong></h3> -->
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title" style="text-decoration: underline;">Arahkan Kamera ke KODEQR !</h3> -->
                        <!-- <?php if ($this->session->flashdata('gagal')) : ?>
                            <h3 class="panel-title">Scan Barcode <strong><?= $this->session->flashdata('gagal'); ?> ! Silahkan Coba Lagi !</strong></h3>

                        <?php endif; ?> -->
                    </div>

                    <!-- INI FLASHMESSAGE -->


                    <div class="panel-body">
                        <canvas style="height: 50%;width: 50%;"></canvas>
                        <hr>
                        <select></select>
                    </div>
                    <br>
                    <div class="panel-footer">
                        <center> <button><a href="<?= base_url('operator') ?>">Kembali</a></button> </center>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Js Lib -->
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/qrcodelib.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/webcodecamjquery.js"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
                // $.post("../cek.php", { noijazah: result.code} );
                var redirect = "<?= base_url() ?>scan/securityout/";
                alert('OK!');
                $.redirectPost(redirect, {
                    id_barcode: result.code
                });
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
    </script>
</body>

</html>