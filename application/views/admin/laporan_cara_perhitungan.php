    <script type="text/javascript" async src="<?= base_url('assets/MathJax/MathJax.js?config=TeX-MML-AM_CHTML') ?>"></script>
    <style type="text/css">
        tr th, tr td{text-align: center; padding: 1%;}
        ol > li{margin-bottom: 2%; margin-top: 3%;}
        .ket_tabel{text-align: center !important; margin-bottom: 3%; margin-top: 2%; font-weight: bolder;}
        div {text-align: justify;}
        .title{
            padding: 10px;
            padding-left: 100px;
            padding-right: 100px; 
            text-align: center;
        }
        .konten{
            padding: 100px;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;            
        }
    </style>

    <div class="title">
        <strong><h2>Detail Cara Perhitungan</h2></strong><br>
        <hr>
        <hr size="4" style="background: black; margin-top: -5px;">
    </div>

    <div class="konten">

        <table width="100%">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 50px !important;">No</th>
                    <th rowspan="2">Kode Lab</th>
                    <th rowspan="2">Kode Sampel</th>
                    <th rowspan="2">pH h20 (1:1)</th>
                    <th>C-Organik</th>
                    <th>N-Total</th>
                    <th rowspan="2">P-tersedia <br>mg/Kg</th>
                    <th>K-dd</th>
                    <th>Na</th>
                    <th>Ca</th>
                    <th>Mg</th>
                    <th>KTK</th>
                    <th>Al-dd</th>
                </tr>
                <tr>
                    <th colspan="2">g/Kg</th>
                    <th colspan="6">g/Kg</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; foreach ($tanah as $row): ?>
                <tr>
                    <td style="width: 20px !important;" ><?= ++$i ?></td>
                    <td><?= $row->kode_lab ?></td>
                    <td><?= $row->kode_sampel ?></td>
                    
                    <?php  
                        $nilai = $this->nilai_sifat_tanah_m->get(['kode_lab' => $row->kode_lab]);
                    ?>

                    <?php foreach ($nilai as $n): ?>
                    <td><?= $n->nilai ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- /.table-responsive -->

        <ol style="margin-top: 3%;">
            <li>Memberikan nilai setiap alternatif (Ai) pada setiap kriteria (Cj) yang sudah ditentukan</li>

            <table width="60%">
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
                    <?php $i = 0; foreach ($tanah as $row): ?>
                    <tr>
                        <th>A<?= ++$i ?></th>
                        
                        <?php  
                            $nilai = $this->nilai_sifat_tanah_m->get(['kode_lab' => $row->kode_lab]);
                        ?>

                        <?php foreach ($nilai as $n): ?>
                        <th>
                            <?php  
                                $bobot = $this->bobot_m->get_row(['id_bobot' => $n->id_bobot]);
                                if ($bobot) echo $bobot->nilai;
                                else echo '-';
                            ?>
                        </th>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="ket_tabel">
                Tabel. Rating kecocokan dari setiap alternatif pada setiap kriteria
            </div>

            <div>
                Diubah ke dalam matriks keputusan  X dengan data : <br>
                $$\begin{pmatrix}a & b\\\ c & d\end{pmatrix}$$
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
                        r_11= 3/max⁡〖{2,3,3}〗 = 3/3 =1 <br>
                        r_21=2/max⁡〖{2,3,3}〗 =2/( 3) = 0,67 <br>
                         r_31=3/max⁡〖{2,3,3}〗  = 3/3 = 1 <br>
                        r_11= 3/max⁡〖{2,3,3}〗 = 3/3 =1 <br>
                        r_21=2/max⁡〖{2,3,3}〗 =2/( 3) = 0,67 <br>
                         r_31=3/max⁡〖{2,3,3}〗  = 3/3 = 1 <br>

                    </div>

                    <li>Untuk karbon organik tanah termasuk kedalam atribut keuntungan (benefit)</li>
                    <div>
                        r_12=4/max⁡〖{3,4,4}〗  = 4/4 = 1 <br>
                        r_22=4/max⁡〖{3,4,4}〗  = 4/4 = 1 <br>
                        r_32=3/max⁡〖{3,4,4}〗  = 3/4 = 0,75 <br>

                    </div>

                    <li>Untuk nitrogen total tanah termasuk kedalam atribut keuntungan (benefit)</li>
                    <div>
                        r_13=5/max⁡〖 {5,5,5}〗  = 5/5 = 1 <br>
                        r_23=5/max⁡〖 {5,5,5}〗  = 5/5 = 1 <br>
                        r_33=5/max⁡〖 {5,5,5}〗  = 5/5 = 1 <br>
                    </div>

                    <li>Untuk fosfor(P) yang tersedia termasuk ke dalam atribut keuntungan  (benefit)</li>
                    <div>
                        r_14=4/max⁡〖{4,4,4}〗  = 4/4 = 1 <br>
                        r_24=4/max⁡〖{4,4,4}〗  = 4/4 = 1 <br>
                        r_34=4/max⁡〖{4,4,4}〗  = 4/4 = 1 <br>
                    </div>

                    <li>Untuk kalium dapat dipertukarkan termasuk ke dalam atribut keuntungan (benefit)</li>
                    <div>
                        r_15=4/max⁡〖{2,3,4}〗  = 4/4 = 1 <br>
                        r_25=2/max⁡〖{2,3,4}〗  = 2/4 = 0,05 <br>
                        r_35=3/max⁡〖{2,3,4}〗  = 3/4 = 0,75 <br>
                    </div>

                    <li>Untuk natrium dapat dipertukarkan termasuk kedalam atribut keuntungan (benefit)</li>
                    <div>
                        r_16=2/max⁡〖{2,2,2}〗  = 2/2 = 1 <br>
                        r_26=2/max⁡〖{2,2,2}〗  = 2/2 = 1 <br>
                        r_36=2/max⁡〖{2,2,2}〗  = 2/2 = 1 <br>

                    </div>

                    <li>Untuk kalsium dapat dipertukarkan termasuk kedalam atribut keuntungan (benefit)</li>
                    <div>
                        r_17=3/max⁡〖{2,2,3}〗  = 3/3 = 1 <br>
                        r_27=2/max⁡〖{2,2,3}〗  = 2/3 = 0,67 <br>
                        r_37=2/max⁡〖{2,2,3}〗  = 2/3 = 0,67 <br>
                    </div>

                    <li>Untuk magnesium dapat dipertukarkan termasuk kedalam atribut keuntungan (benefit)</li>
                    <div>
                        r_18=1/max⁡〖{1,1,1}〗  = 1/1 = 1 <br>
                        r_28=1/max⁡〖{1,1,1}〗  = 1/1 = 1 <br>
                        r_38=1/max⁡〖{1,1,1}〗  = 1/1 = 1 <br>
                    </div>

                    <li>Untuk ktk tanah termasuk kedalam atribut keuntungan (benefit)</li>
                    <div>
                        r_19=4/max⁡〖{3,3,4}〗  = 4/4 = 1 <br>
                        r_29=3/max⁡〖{3,3,4}〗  = 3/4 = 0,75 <br>
                        r_39=3/max⁡〖{3,3,4}〗  = 3/4 = 0,75 <br>
                    </div>

                    <li>Untuk aluminium dapat dipertukarkan kedalam atribut keuntungan (benefit)</li>
                    <div>
                        r_110=5/max⁡〖{1,2,3,4,5}〗  = 5/5 = 1 <br>
                        r_210=2/max⁡〖{1,2,3,4,5}〗  = 2/5 = 0,4 <br>
                        r_310=1/max⁡〖{1,2,3,4,5}〗  = 1/5 = 0,2 <br>
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
            <table width="60%">
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