<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cara Perhitungan <!-- <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> </i></button> --></h1> 
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
                            Detail Cara Perhitungan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center; padding: 1%;}
                                ol > li{margin-bottom: 2%; margin-top: 3%;}
                                .ket_tabel{text-align: center !important; margin-bottom: 3%; font-weight: bolder;}
                                div {text-align: justify;}
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
                                   
                                    <!-- <?php foreach ($tanah as $row): ?>
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
                                    <?php endforeach; ?> -->

                                    <tr>
                                        <td style="width: 20px !important;" >1</td>
                                        <td>738.D.06.06.16</td>
                                        <td>T1.1 (2000)</td>
                                        <td>6.3</td>
                                        <td>36.495</td>
                                        <td>2.55</td>
                                        <td>54</td>
                                        <td>0.51</td>
                                        <td>0.01</td>
                                        <td>666</td>
                                        <td>3.33</td>
                                        <td>26.1</td>
                                        <td>ttu</td>
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
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                            <ol style="margin-top: 3%;">
                                <li>Memberikan nilai setiap alternatif (Ai) pada setiap kriteria (Cj) yang sudah ditentukan</li>

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Alternatif</th>
                                            <th colspan="10">Kriteria</th>
                                        </tr>
                                        <tr>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                            <th>C7</th>
                                            <th>C8</th>
                                            <th>C9</th>
                                            <th>C10</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>A1</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>10</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="ket_tabel">
                                    Tabel. Rating kecocokan dari setiap alternatif pada setiap kriteria
                                </div>

                                <div>
                                    Diubah ke dalam matriks keputusan  X dengan data : <br>
                                        3 4 5 4 4 2 3 1 4 5 <br>
                                    x = 2 4 5 4 2 2 2 1 3 2 <br>
                                        3 3 5 4 3 2 2 1 3 1 <br>
                                </div>

                                <li>Menormalisasi matriks X menjadi matriks R</li>
                                <div>
                                    rij = {Xij / (Max_i * Xij) atau (Min_i * Xij )/Xij <br>
                                    <br><strong>Keterangan :</strong> <br>
                                    rij     = Nilai rating kinerja ternormalisasi <br>
                                    Xij     = Nilai atribut yang dimiliki dari setiap kriteria <br>
                                    Max Xij = Nilai terbesar dari setiap kriteria <br>
                                    Min Xij = Nilai terkecil dari setiap kriteria <br>
                                    Benefit     = Jika nilai terbesar adalah terbaik <br>
                                    Cost        = Jika nilai terkecil adalah terbaik <br>

                                    <ol style="list-style-type: lower-alpha;">
                                        <li>Untuk keasaman tanah (pH) termasuk kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_11= 3/max⁡〖 {2,3,3}〗 = 3/3 =1 <br>
                                            r_21=2/max⁡〖 {2,3,3}〗 =2/( 3) = 0,67 <br>
                                             r_31=3/max⁡〖 {2,3,3}〗  = 3/3 = 1 <br>
                                            r_11= 3/max⁡〖 {2,3,3}〗 = 3/3 =1 <br>
                                            r_21=2/max⁡〖 {2,3,3}〗 =2/( 3) = 0,67 <br>
                                             r_31=3/max⁡〖 {2,3,3}〗  = 3/3 = 1 <br>

                                        </div>

                                        <li>Untuk karbon organik tanah termasuk kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_12=4/max⁡〖 {3,4,4}〗  = 4/4 = 1 <br>
                                            r_22=4/max⁡〖 {3,4,4}〗  = 4/4 = 1 <br>
                                            r_32=3/max⁡〖 {3,4,4}〗  = 3/4 = 0,75 <br>

                                        </div>

                                        <li>Untuk nitrogen total tanah termasuk kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_13=5/max⁡〖 {5,5,5}〗  = 5/5 = 1 <br>
                                            r_23=5/max⁡〖 {5,5,5}〗  = 5/5 = 1 <br>
                                            r_33=5/max⁡〖 {5,5,5}〗  = 5/5 = 1 <br>
                                        </div>

                                        <li>Untuk fosfor(P) yang tersedia termasuk ke dalam atribut keuntungan  (benefit)</li>
                                        <div>
                                            r_14=4/max⁡〖 {4,4,4}〗  = 4/4 = 1 <br>
                                            r_24=4/max⁡〖 {4,4,4}〗  = 4/4 = 1 <br>
                                            r_34=4/max⁡〖 {4,4,4}〗  = 4/4 = 1 <br>
                                        </div>

                                        <li>Untuk kalium dapat dipertukarkan termasuk ke dalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_15=4/max⁡〖 {2,3,4}〗  = 4/4 = 1 <br>
                                            r_25=2/max⁡〖 {2,3,4}〗  = 2/4 = 0,05 <br>
                                            r_35=3/max⁡〖 {2,3,4}〗  = 3/4 = 0,75 <br>
                                        </div>

                                        <li>Untuk natrium dapat dipertukarkan termasuk kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_16=2/max⁡〖 {2,2,2}〗  = 2/2 = 1 <br>
                                            r_26=2/max⁡〖 {2,2,2}〗  = 2/2 = 1 <br>
                                            r_36=2/max⁡〖 {2,2,2}〗  = 2/2 = 1 <br>

                                        </div>

                                        <li>Untuk kalsium dapat dipertukarkan termasuk kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_17=3/max⁡〖 {2,2,3}〗  = 3/3 = 1 <br>
                                            r_27=2/max⁡〖 {2,2,3}〗  = 2/3 = 0,67 <br>
                                            r_37=2/max⁡〖 {2,2,3}〗  = 2/3 = 0,67 <br>
                                        </div>

                                        <li>Untuk magnesium dapat dipertukarkan termasuk kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_18=1/max⁡〖 {1,1,1}〗  = 1/1 = 1 <br>
                                            r_28=1/max⁡〖 {1,1,1}〗  = 1/1 = 1 <br>
                                            r_38=1/max⁡〖 {1,1,1}〗  = 1/1 = 1 <br>
                                        </div>

                                        <li>Untuk ktk tanah termasuk kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_19=4/max⁡〖 {3,3,4}〗  = 4/4 = 1 <br>
                                            r_29=3/max⁡〖 {3,3,4}〗  = 3/4 = 0,75 <br>
                                            r_39=3/max⁡〖 {3,3,4}〗  = 3/4 = 0,75 <br>
                                        </div>

                                        <li>Untuk aluminium dapat dipertukarkan kedalam atribut keuntungan (benefit)</li>
                                        <div>
                                            r_110=5/max⁡〖 {1,2,3,4,5}〗  = 5/5 = 1 <br>
                                            r_210=2/max⁡〖 {1,2,3,4,5}〗  = 2/5 = 0,4 <br>
                                            r_310=1/max⁡〖 {1,2,3,4,5}〗  = 1/5 = 0,2 <br>
                                        </div>
                                        <div>
                                            Matriks R : <br>
                                            1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 <br>
                                            1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 <br>
                                            1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 1.00 <br>
                                        </div>
                                    </ol>
                                </div>

                                <li>Memberikan nilai bobot (W)</li>
                                <div>
                                    Pengambilan keputusan memberikan bobot, berdasarkan tingkat kepentingan masing-masing kriteria yang dibutuhkan. <br>
                                </div><br>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>C1</th>
                                            <th>Sangat Tinggi(ST)</th>
                                            <th>5</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="ket_tabel">
                                    Tabel 3.14. Tingkat kepentingan masing-masing kriteria
                                </div>
                                <div>
                                    Dari Tabel 3.14 diperoleh vektor bobot (W) dengan data <br>
                                    w = 5 5 5 4 3 4 5 3 5 3
                                </div>

                                <li>Hasil akhir dari proses perangkingan yaitu penjumlahan dari perkalian matriks ternormalisasi R dengan vektor bobot segingga diperoleh nilai terbesar yang dipilih sebagai alternatif terbaik (Ai) sebagai solusi . <br>
                                Melakukan proses perangkingan dengan menggunakan persamaan sebagai berikut : <br>
                                </li>
                                <div>
                                    Vi = sikma Wj * r_ij <br>
                                    <br><strong>Keterangan :</strong> <br>
                                    Vi  = rangking untuk setiap alternatif <br>
                                    Wj  = nilai bobot dari setiap kriteria <br>
                                    rij = nilai rating kinerja ternormalisasi <br>
                                    nilai Vi yang lebih besar mengindikasikan bahwa alternatif Ai lebih terpilih, maka : <br> <br>
                                    V1  = (5)(1) + (5)(1) + (5)(1) + (4)(1) + (3)(1) + (4)(1) + (5)(1) + (3)(1) +
                                           (5)(1) + (3)(1) <br>
                                        = 5 + 5 + 5 + 4 + 3 + 4 +5 + 3 +5 + 3 <br>
                                        = 42 <br><br>
                                    V2  = (5)(0.67) + (5)(1) + (5)(1) + (4)(1) + (3)(0.05) + (4)(1) + (5)(0.67) + 
                                            (3)(1) + (5)(0.75) + (3)(0.50) <br>
                                        = 3.35 + 5 + 5 + 4 +0.15 + 4 + 3.35 + 3 + 3.75 + 1.5 <br>
                                        = 33.1 <br><br>
                                    V3  = (5)(1) + (5)(0.75) + (5)(1) + (4)(1) + (3)(0.75) + (4)(1) + (5)(0.67) + 
                                            (3)(1) + (5)(0.75) + (3)(0.20) <br>
                                        = 5 + 3.75 + 5 + 4 + 2.25 + 4 + 3.35 + 3 + 3.75 + 0.6 <br>
                                        = 34.7 <br><br>
                                    Hasil perangkingan yang diperoleh V1 = 42 , V2 = 33.1, V3 = 34.7. Nilai terbesar ada pada V1. Dengan demikian alternatif A2 adalah alternatif yang terpilih sebagai alternatif terbaik. <br>

                                </div>
                            

                            </ol> 
                            <!-- /. ol -->

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


    <script>
        $(document).ready(function() {
            $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
            
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>