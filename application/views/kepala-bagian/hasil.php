<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Hasil Perhitungan Fuzzy SAW</h1> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Ranking Sifat Tanah
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Kode Lab</th>
                                                <!-- <th>Kode Sampel</th> -->
                                                <th>Nama Tanaman</th>
                                                <th>Tahun Tanaman</th>
                                                <th>Hasil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($hasil as $row): ?>
                                                <tr>
                                                    <td><?= $row['kode_lab'] ?></td>
                                                    <!-- <td><?= $row['kode_sampel'] ?></td> -->
                                                    <td><?= $row['nama_tanaman'] ?></td>
                                                    <td><?= $row['tahun_tanaman'] ?></td>
                                                    <td><?= $row['hasil'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-success" href="<?= base_url('admin/laporan-cara-perhitungan') ?>"><i class="fa fa-download"></i> Unduh Laporan</a>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTables-example').dataTable({
                    ordering: false,
                    filter:false
                });
            });
        </script>