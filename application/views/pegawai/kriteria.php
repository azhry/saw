<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Kriteria Tanah <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button></h1> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Kriteria
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Bobot</th>
                                                <th>Nilai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach ($kriteria as $row): ?>
                                            <tr>
                                                <td><?= ++$i ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->bobot ?></td>
                                                <td><?= $row->nilai ?></td>
                                                <td>
                                                    <a href="#" onclick="get_kriteria(<?= $row->id_kriteria ?>);" class="btn btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> Edit</a> 
                                                    <a href="#" onclick="delete_kriteria(<?= $row->id_kriteria ?>);" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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
                <?= form_open('pegawai/kriteria') ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" name="bobot">
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control" name="nilai">
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
                <?= form_open('pegawai/kriteria') ?>
                <input type="hidden" name="id_kriteria" id="id_kriteria">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" name="bobot" id="bobot">
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control" name="nilai" id="nilai">
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

            function get_kriteria(id_kriteria) {
                $.ajax({
                    url: '<?= base_url('pegawai/kriteria') ?>',
                    type: 'POST',
                    data: {
                        id_kriteria: id_kriteria,
                        get: true
                    },
                    success: function(response) {
                        var json = $.parseJSON(response);
                        $('#id_kriteria').val(json.id_kriteria);
                        $('#nama').val(json.nama);
                        $('#bobot').val(json.bobot);
                        $('#nilai').val(json.nilai);
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });

                return false;
            }

            function delete_kriteria(id_kriteria) {
                $.ajax({
                    url: '<?= base_url('pegawai/kriteria') ?>',
                    type: 'POST',
                    data: {
                        id_kriteria: id_kriteria,
                        delete: true
                    },
                    success: function(response) {
                        window.location = '<?= base_url('pegawai/kriteria') ?>'
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            }
        </script>