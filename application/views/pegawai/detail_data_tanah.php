<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Tanah<button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> </i></button></h1> 
                        </div>
                        <div class="col-lg-12">
                            <?= $this->session->flashdata('msg') ?>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Tanah
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="width: 20px !important;">No</th>
                                                <th rowspan="2">Kode Lab</th>
                                                <th rowspan="2">Kode Sampel</th>
                                                <th rowspan="2">pH h20 (1:1)</th>
                                                <th>C-Organik</th>
                                                <th>N-Total</th>
                                                <th rowspan="2">P-tersedia mg/Kg</th>
                                                <th>K-dd</th>
                                                <th>Na</th>
                                                <th>Ca</th>
                                                <th>Mg</th>
                                                <th>KTK</th>
                                                <th>Al-dd</th>
                                                <th rowspan="2"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">g/Kg</th>
                                                <th colspan="6">g/Kg</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <?php $i = 0; foreach ($tanah as $row): ?>
                                                <tr>
                                                    <td><?= ++$i ?></td>
                                                    <td><?= $row['data']->kode_lab ?></td>
                                                    <td><?= $row['data']->kode_sampel ?></td>
                                                    <?php foreach ($row['nilai'] as $bobot): ?>
                                                        <td><?= $bobot ?></td>
                                                    <?php endforeach; ?>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Aksi <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                              <li><a href="#" onclick="get_data_tanah('<?= $row['data']->kode_lab ?>')" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> Edit</a></li>
                                                              <li><a href="<?= base_url('pegawai/detail-tanah') ?>"><i class="fa fa-eye"></i> Detail</a></li>
                                                              <li><a href="" onclick="delete_data_tanah('<?= $row['data']->kode_lab ?>')"><i class="fa fa-trash"></i> Hapus</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>        
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->


                </div>
            </div>
        </div>