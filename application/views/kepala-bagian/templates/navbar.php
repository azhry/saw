        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="<?= base_url() ?>"><img style="margin-top: -14px; border-radius: 50%;" width="70" height="50" src="<?= base_url('assets/img/logo.jpg') ?>"></a> -->
                <a class="navbar-brand" href="<?= base_url() ?>">PT. Mitra Ogan</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?= base_url('kepala-bagian/') ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('kepala-bagian/data-tanah') ?>" class=""><i class="fa fa-bar-chart"></i> <span>Data Tanah</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('kepala-bagian/kriteria') ?>" class=""><i class="fa fa-book"></i> <span>Data Kriteria</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('kepala-bagian/hasil') ?>" class=""><i class="fa fa-list"></i> <span>Data Ranking Tanah</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">