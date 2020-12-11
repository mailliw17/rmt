<link rel="stylesheet" href="<?= base_url() ?>vendor/login.css">

<body class="text-center">
    <form class="form-signin" action="<?= base_url() ?>auth" method="POST">
        <img class="mb-4" src="<?= base_url() ?>assets/logo_login.jpg" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Silahkan Masuk</h1>

        <!-- INI FLASHMESSAGE -->
        <?php if ($this->session->flashdata('gagal_login')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username/Password salah !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Password Berhasil Diganti <br>
                Silahkan Login Ulang !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username..." required autofocus autocomplete="off">

        <br>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password..." required>
        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
        <p class="mt-5 mb-3 text-muted">Developer : PT.Charoen Pokphand Indonesia - William</p>
    </form>
</body>

</html>