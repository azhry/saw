    <script type="text/javascript" src="<?= base_url('assets/MathJax/MathJax.js?config=TeX-MML-AM_CHTML') ?>"></script>
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
        tex2jax: {
          inlineMath: [ ['$','$'], ["\\(","\\)"] ],
          processEscapes: true
        }
      });
    </script>
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
                <?php $row = (object)$row; ?>
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
                    <?php $row = (object)$row; ?>
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
                $$\LARGE{X = 
                    \begin{pmatrix}
                    <?php for ($i = 0; $i < count($tanah); $i++): ?>
                        <?php $tanah[$i] = (object)$tanah[$i]; ?>
                        <?php $nilai = $this->nilai_sifat_tanah_m->get(['kode_lab' => $tanah[$i]->kode_lab]); ?>
                        <?php for ($j = 0; $j < count($nilai); $j++): ?>
                            <?php  
                                $bobot = $this->bobot_m->get_row(['id_bobot' => $nilai[$j]->id_bobot]);
                                if ($bobot) echo $bobot->nilai;
                                else echo '-';
                            ?>
                            <?php if ($j < count($nilai) - 1): ?>
                                <?php echo '&'; ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($i < count($tanah) - 1): ?>
                            \\\
                        <?php endif; ?>
                    <?php endfor; ?>
                    \end{pmatrix}}
                $$
            </div>

            <li>Menormalisasi matriks X menjadi matriks R</li>
            <div>
                $$\LARGE{r_{ij} = 
                \begin{cases}
                \frac{x_{ij}}{max_i(x_{ij})}\\
                \frac{min_i(x_{ij})}{x_{ij}}
                \end{cases}}$$
                <br><strong>Keterangan :</strong> <br>
                $\LARGE{r_{ij}}$     = Nilai rating kinerja ternormalisasi <br>
                $\LARGE{x_{ij}}$     = Nilai atribut yang dimiliki dari setiap kriteria <br>
                $\LARGE{max(x_{ij})}$ = Nilai terbesar dari setiap kriteria <br>
                $\LARGE{min(x_{ij})}$ = Nilai terkecil dari setiap kriteria <br>
                Benefit     = Jika nilai terbesar adalah terbaik <br>
                Cost        = Jika nilai terkecil adalah terbaik <br>

                <ol style="list-style-type: lower-alpha;">
                    <?php $matriks_nilai = []; ?>
                    <?php for ($i = 0; $i < count($kriteria); $i++): ?>
                    <li>Untuk <?= $kriteria[$i]->nama ?> termasuk kedalam atribut keuntungan (benefit)</li>
                    <div>
                        <?php  
                            $nilai = $this->nilai_sifat_tanah_m->get(['id_kriteria' => $kriteria[$i]->id_kriteria]);
                            $arr_nilai = [];
                            foreach ($nilai as $n)
                            {
                                $arr_nilai []= $n->nilai;
                            }
                            for ($j = 0; $j < count($nilai); $j++):
                        ?>
                            $$\LARGE{r_{<?= $j + 1 ?><?= $i + 1 ?>}=\frac{<?= $nilai[$j]->nilai ?>}{max\{<?= implode(',', $arr_nilai) ?>\}}=\frac{<?= $nilai[$j]->nilai ?>}{<?= max($arr_nilai) ?>}=<?= number_format((float)$nilai[$j]->nilai/(float)max($arr_nilai), 2) ?>}$$
                            <?php $matriks_nilai[$j] []= number_format((float)$nilai[$j]->nilai/(float)max($arr_nilai), 2); ?>
                        <?php endfor; ?>
                    </div>
                    <?php endfor; ?>
                </ol>
            </div>
            <div>
                Matriks R : <br>
                $$\LARGE{R = 
                    \begin{pmatrix}
                    <?php for ($i = 0; $i < count($matriks_nilai); $i++): ?>
                        <?php for ($j = 0; $j < count($matriks_nilai[$i]); $j++): ?>
                            <?= $matriks_nilai[$i][$j] ?>
                            <?php if ($j < count($matriks_nilai[$i]) - 1): ?>
                                &
                            <?php endif; ?>    
                        <?php endfor; ?>
                        <?php if ($i < count($matriks_nilai) - 1): ?>
                            \\\
                        <?php endif; ?>
                    <?php endfor; ?>
                    \end{pmatrix}}
                $$
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
                $$\LARGE{W = 
                    \begin{pmatrix}
                    <?php for ($j = 0; $j < count($kriteria); $j++): ?>
                        <?= $kriteria[$j]->nilai ?>
                        <?php if ($j < count($kriteria) - 1): ?>
                            &
                        <?php endif; ?>    
                    <?php endfor; ?>
                    \end{pmatrix}}
                $$
            </div>

            <li>Hasil akhir dari proses perangkingan yaitu penjumlahan dari perkalian matriks ternormalisasi R dengan vektor bobot segingga diperoleh nilai terbesar yang dipilih sebagai alternatif terbaik ($\LARGE{A_i}$) sebagai solusi . <br>
            Melakukan proses perangkingan dengan menggunakan persamaan sebagai berikut : <br>
            </li>
            <div>
                $$\LARGE{V_i = \sum_{j=i}^n W_j r_{ij}}$$
                <strong>Keterangan :</strong><br>
                $\LARGE{V_i}$  = rangking untuk setiap alternatif <br>
                $\LARGE{W_j}$  = nilai bobot dari setiap kriteria <br>
                $\LARGE{r_{ij}}$ = nilai rating kinerja ternormalisasi <br>
                nilai $\LARGE{V_i}$ yang lebih besar mengindikasikan bahwa alternatif $\LARGE{A_i}$ lebih terpilih, maka : <br> <br>
                <?php $rank = []; ?>
                <?php for ($i = 0; $i < count($matriks_nilai); $i++): ?>
                <?php $multiply = []; ?>
                $\LARGE{V_<?= $i + 1 ?> = 
                    <?php for ($j = 0; $j < count($matriks_nilai[$i]); $j++): ?>
                        (<?= $kriteria[$j]->nilai ?>)(<?= $matriks_nilai[$i][$j] ?>)
                        <?php $multiply []= $kriteria[$j]->nilai * $matriks_nilai[$i][$j]; ?>
                        <?php if ($j < count($matriks_nilai[$i]) - 1): ?>
                            +
                        <?php endif; ?>
                    <?php endfor; ?>
                }$<br>
                $\LARGE{ =
                    <?php for ($j = 0; $j < count($multiply); $j++): ?>
                        <?= $multiply[$j] ?>
                        <?php if ($j < count($multiply) - 1): ?>
                            +
                        <?php endif; ?>
                    <?php endfor; ?>
                    = <?= array_sum($multiply) ?>
                    <?php $rank['$\LARGE{V_'.($i + 1).'}$'] = array_sum($multiply) ?>
                }$<br><br>
                <?php endfor; ?>
                Hasil perangkingan yang diperoleh 
                <?php foreach ($rank as $key => $value): ?>
                    <?= $key . ' = ' . $value . ', ' ?>
                <?php endforeach; ?>
                <?php  
                    $keys = array_keys($rank);
                    $values = array_values($rank);
                ?>
                Nilai terbesar ada pada <?= $keys[array_search(max($values), $values)] ?>. Dengan demikian alternatif $\LARGE{A_<?= (array_search(max($values), $values) + 1) ?>}$ adalah alternatif yang terpilih sebagai alternatif terbaik. <br>
            </div>
        </ol> 
        <!-- /. ol -->
    </div>