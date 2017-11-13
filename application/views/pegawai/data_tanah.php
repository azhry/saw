<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Tanah Lab FP Kecil <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> </i></button></h1> 
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
                                    Data Tanah Lab FP Kecil
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
                                           
                                            <?php foreach ($tanah as $row): ?>
                                                <tr>
                                                    <td></td>
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
                                                              <li><a href="#" data-toggle="modal" data-target="#edit"><i class="lnr lnr-pencil"></i> Edit</a></li>
                                                              <li><a href="<?= base_url('admin') ?>"><i class="fa fa-eye"></i> Detail</a></li>
                                                              <li><a href="" onclick="delete_data()"><i class="lnr lnr-trash"></i> Hapus </a></li>
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


                    <div class="modal fade" tabindex="-1" role="dialog" id="add">
                      <div class="modal-dialog" role="document">
                        <?= form_open('pegawai/data_tanah') ?>
                       <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Data</h4>
                          </div>
                          <div class="modal-body">
                                <div class="form-group">
                                    <label for="Kode Lab">Kode Lab</label>
                                    <input type="text" class="form-control" name="kode_lab" required>
                                </div>
                                <div class="form-group">
                                    <label for="Kode Sampel">Kode Sampel</label>
                                    <input type="text" class="form-control" name="kode_sampel" required>
                                </div>
                                <div class="form-group">
                                    <label for="Nama Tanaman">Nama Tanaman</label>
                                    <input type="text" class="form-control" name="nama_tanaman" required>
                                </div>
                                <div class="form-group">
                                    <label for="Tahun Tanaman">Tahun Tanaman</label>
                                    <input type="text" class="form-control" name="tahun_tanaman" required>
                                </div>
                                <?php foreach ($kriteria as $row): ?>
                                    <div class="form-group">
                                        <label for="label_<?= $row->id_kriteria ?>"><?= $row->nama ?></label>

                                        <?php  
                                            $bobot = $this->bobot_m->get(['id_kriteria' => $row->id_kriteria]);
                                        ?>

                                        <input type="number" class="form-control" name="label_value[]" step="0.01" min="<?= $bobot[0]->min_range ?>" max="<?= $bobot[count($bobot) - 1]->max_range ?>" required>
                                        <input type="hidden" name="label_id[]" value="<?= $row->id_kriteria ?>">
                                    </div>    
                                <?php endforeach; ?>
                                
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                          </div>
                          <?= form_close() ?>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <div class="modal fade" tabindex="-1" role="dialog" id="edit">
                      <div class="modal-dialog" role="document">
                        <?= form_open('pegawai/data-tanah') ?>
                       <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data</h4>
                          </div>
                          <div class="modal-body">
                                <input type="hidden" name="" id="">
                               <div class="form-group">
                                    <label for="Kode Lab">Kode Lab</label>
                                    <input type="text" class="form-control" name="kode_lab" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis Sampel">Jenis Sampel</label>
                                    <input type="text" class="form-control" name="jenis_sampel" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Kode Sampel">Kode Sampel</label>
                                    <input type="text" class="form-control" name="kode_sampel" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="pH H20 (1:1)">pH H20 (1:1)</label>
                                    <input type="number" class="form-control" name="pH" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="C-Organik">C-Organik</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="c_organik" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="N-Total">N-Total</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="n_total" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="P-Tersedia">P-tersedia</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="p_tersedia" id="" required>
                                        <span class="input-group-addon">mg/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="K-dd">K-dd</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="k-dd" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Na">Na</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="na" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ca">Ca</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="ca" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Mg">Mg</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="mg" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="KTK">KTK</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="ktk" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Al-dd">Al-dd</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="al_dd" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                          </div>
                          <?= form_close() ?>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                </div>
            </div>
        </div>


            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function delete_bahan_baku(id_bahan_baku) {
                    $.ajax({
                        url: '<?= base_url('kasir/bahan-baku') ?>',
                        type: 'POST',
                        data: {
                            id_bahan_baku: id_bahan_baku,
                            delete: true
                        },
                        success: function() {
                            window.location = '<?= base_url('kasir/bahan-baku') ?>';
                        },
                        error: function(err) {
                            console.log(err.responseText);
                        }
                    });
                }
            </script>