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
                            <input type="hidden" name="kode_lab" id="kode_lab">
                                <div class="form-group">
                                    <label for="Kode Lab">Kode Lab</label>
                                    <input type="text" id="edit_kode_lab" class="form-control" name="edit_kode_lab" required>
                                </div>
                                <div class="form-group">
                                    <label for="Nama Tanaman">Nama Tanaman</label>
                                    <input type="text" class="form-control" id="edit_nama_tanaman" name="edit_nama_tanaman" required>
                                </div>
                                <div class="form-group">
                                    <label for="Tahun Tanaman">Tahun Tanaman</label>
                                    <input type="text" class="form-control" id="edit_tahun_tanaman" name="edit_tahun_tanaman" required>
                                </div>
                                <?php foreach ($kriteria as $row): ?>
                                    <div class="form-group">
                                        <label for="label_<?= $row->id_kriteria ?>"><?= $row->nama ?></label>

                                        <?php  
                                            $bobot = $this->bobot_m->get(['id_kriteria' => $row->id_kriteria]);
                                        ?>

                                        <input type="number" id="edit_<?= $row->id_kriteria ?>" class="form-control" name="label_value[]" step="0.01" min="<?= $bobot[0]->min_range ?>" max="<?= $bobot[count($bobot) - 1]->max_range ?>" required>
                                        <input type="hidden" name="label_id[]" value="<?= $row->id_kriteria ?>">
                                        <input type="hidden" name="nilai_<?= $row->id_kriteria ?>" id="nilai_<?= $row->id_kriteria ?>">
                                    </div>    
                                <?php endforeach; ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" name="edit" value="Edit" class="btn btn-primary">
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

                function get_data_tanah(kode_lab) {
                    $.ajax({
                        url: '<?= base_url('pegawai/data-tanah') ?>',
                        type: 'POST',
                        data: {
                            get: true,
                            kode_lab: kode_lab
                        },
                        success: function(response) {
                            var json = $.parseJSON(response);
                            $('#kode_lab').val(json.kode_lab);
                            $('#edit_kode_lab').val(json.kode_lab);
                            $('#edit_kode_sampel').val(json.kode_sampel);
                            $('#edit_nama_tanaman').val(json.nama_tanaman);
                            $('#edit_tahun_tanaman').val(json.tahun_tanaman);
                            
                            for (var i = 0; i < json.nilai.length; i++) {
                                $('#edit_' + json.nilai[i].id_kriteria).val(json.nilai[i].nilai);
                                $('#nilai_' + json.nilai[i].id_kriteria).val(json.nilai[i].id_kriteria);
                            }
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                }

                 function delete_data_tanah(kode_lab) {
                    $.ajax({
                        url: '<?= base_url('pegawai/data_tanah') ?>',
                        type: 'POST',
                        data: {
                            kode_lab: kode_lab,
                            delete: true
                        },
                        success: function(response) {
                            window.location = '<?= base_url('pegawai/data_tanah') ?>'
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                }
            </script>