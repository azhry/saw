<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Percetakan Sarana Palembang">
    <meta name="author" content="Marina Adhitia">

    <title>Pendaftaran Pelamar | Fuzzy</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/sbadmin-2') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('assets/sbadmin-2') ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/sbadmin-2') ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/sbadmin-2') ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" type="image/x-icon" href="">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top: -15%;">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Selamat Datang di Website Pendaftaran Blabla</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="padding: 3%;">
                            <div class="col-md-8 col-md-offset-2">
                                <h3 style="color: blue; padding: 3%; text-align: center;">Lengkapi biodata diri pada formulir berikut</h3>

                                <?= form_open('pendaftaran/input') ?>
                                    <div class="form-group">
                                        <label for="Nama">Nama *</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Upload Foto">Upload Foto</label>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="form-group">
                                        <label for="Tempat Lahir">Tempat Lahir *</label>
                                        <input type="text" class="form-control" name="tempat_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Tanggal Lahir">Tanggal Lahir *</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nomor HP">Nomor HP *</label>
                                        <input type="text" class="form-control" name="no_hp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email *</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Alamat">Alamat *</label>
                                        <textarea class="form-control" rows="3" name="alamat" required></textarea>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" name="login-submit" value="Daftar" class="btn btn-lg btn-success btn-block">
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/sbadmin-2') ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/sbadmin-2') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('assets/sbadmin-2') ?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('assets/sbadmin-2') ?>/dist/js/sb-admin-2.js"></script>

</body>

</html>