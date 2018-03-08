<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Bobot <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button></h1> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Bobot
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kriteria</th>
                                                <th>Fuzzy</th>
                                                <th>Min</th>
                                                <th>Max</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach ($bobot as $row): ?>
                                            <tr>
                                                <td><?= ++$i ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->fuzzy ?></td>
                                                <td><?= $row->min_range ?></td>
                                                <td><?= $row->max_range ?></td>
                                                <td>
                                                    <a href="#" onclick="get_bobot(<?= $row->id_bobot ?>);" class="btn btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> Edit</a> 
                                                    <a href="#" onclick="delete_bobot(<?= $row->id_bobot ?>);" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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

        <div class="modal fade" tabindex="-1" role="dialog" id="add">
            <div class="modal-dialog" role="document">
                <?= form_open('admin/data-bobot') ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fuzzy">Fuzzy</label>
                            <input type="text" class="form-control" name="fuzzy">
                        </div>
                        <div class="form-group">
                            <label for="id_kriteria">Kriteria</label>
                            <select class="form-control" name="id_kriteria">
                                <option>Pilih Kriteria</option>
                                <?php foreach ($kriteria as $row): ?>
                                    <option value="<?= $row->id_kriteria ?>"><?= $row->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="min_range">Min Range</label>
                            <input type="number" class="form-control" name="min_range" step="any">
                        </div>
                        <div class="form-group">
                            <label for="max_range">Max Range</label>
                            <input type="number" class="form-control" name="max_range" step="any">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="edit">
            <div class="modal-dialog" role="document">
                <?= form_open('admin/data-bobot') ?>
                <input type="hidden" name="id_bobot" id="id_bobot">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fuzzy">Fuzzy</label>
                            <input type="text" class="form-control" name="fuzzy" id="fuzzy">
                        </div>
                        <div class="form-group">
                            <label for="id_kriteria">Kriteria</label>
                            <div id="id_kriteria_container"></div>
                        </div>
                        <div class="form-group">
                            <label for="min_range">Min Range</label>
                            <input type="number" class="form-control" name="min_range" step="any" id="min_range">
                        </div>
                        <div class="form-group">
                            <label for="max_range">Max Range</label>
                            <input type="number" class="form-control" name="max_range" step="any" id="max_range">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });

            function get_bobot(id_bobot) {
                $.ajax({
                    url: '<?= base_url('admin/data-bobot') ?>',
                    type: 'POST',
                    data: {
                        id_bobot: id_bobot,
                        get: true
                    },
                    success: function(response) {
                        var json = $.parseJSON(response);
                        $('#id_bobot').val(json.id_bobot);
                        $('#fuzzy').val(json.fuzzy);
                        $('#min_range').val(json.min_range);
                        $('#max_range').val(json.max_range);
                        $('#id_kriteria_container').html(json.dropdown);
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });

                return false;
            }

            function delete_bobot(id_bobot) {
                $.ajax({
                    url: '<?= base_url('admin/data-bobot') ?>',
                    type: 'POST',
                    data: {
                        id_bobot: id_bobot,
                        delete: true
                    },
                    success: function(response) {
                        window.location = '<?= base_url('admin/data-bobot') ?>'
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            }
        </script>