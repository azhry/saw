<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Percetakan Sarana Palembang">
    <meta name="author" content="Marina Adhitia">

    <title>Login | Fuzzy</title>

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
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <center>
                            <img src="<?= base_url( 'assets/logo.png' ) ?>" class="img img-responsive" style="width: 40%;">
                            <h2 class="form-signin-heading">
                                <font face="Comic Sans MS" color="Black">
                                    <center>
                                        Sistem Pendukung Keputusan Penentuan Kesuburan Tanah Perkebunan Kelapa Sawit
                                    </center>
                                </font>
                            </h2>
                        </center>
                    </div>
                    <div class="panel-body">
                        <?= $this->session->flashdata( 'msg' ) ?>
                        <?= form_open('login', ['id' => 'login-form']) ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="username" placeholder="Username" name="username" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="password" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        Belum punya akun? <a href="<?= base_url( 'register' ) ?>">Daftar</a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login-submit" id="login-submit" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        <?= form_close() ?>
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