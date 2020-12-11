<!DOCTYPE html>
<html>

<head>
    <style>
        .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #242f3f;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
        }
    </style>


    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Scan QR Code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

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
                    </div>

                    <div class="panel-body">
                        <canvas style="height: 50%;width: 50%;"></canvas>
                        <hr>
                        <!-- ini tombol kamera depan / belakang -->
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
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/qrcodelib.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>vendor/js-cam-baru/webcodecamjquery.js"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
                // $.post("../cek.php", { noijazah: result.code} );
                var redirect = "<?= base_url() ?>scan/securityin/";
                alert('OK!');
                $.redirectPost(redirect, {
                    id_barcode: result.code
                });
            }
        };

        var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
        decoder.buildSelectMenu("select");
        decoder.play();
        // Without visible select menu
        // decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();

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

        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });

        $(window).on("beforesend", function() {
            $(".loader-wrapper").fadeOut("slow");
        });

        // location.reload(true);
    </script>
</body>

</html>