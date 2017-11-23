<?php 

class Kepala_bagian extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        if (!isset($this->data['username']))
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }

        $this->data['hak_akses'] = $this->session->userdata('hak_akses');
        if ($this->data['hak_akses'] != 'kabagian')
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;   
        }
    }

    public function index()
    {
        $this->data['title']        = 'Dashboard Kepala Bagian' . $this->title;
        $this->data['content']      = 'kepala-bagian/dashboard';
        $this->template($this->data, 'kepala-bagian');
    }

    public function kriteria()
    {
        $this->load->model('kriteria_m');

        if ($this->POST('simpan'))
        {
        	$this->kriteria_m->insert([
        		'nama'	=> $this->POST('nama'),
        		'bobot'	=> $this->POST('bobot'),
        		'nilai'	=> $this->POST('nilai')
        	]);

        	$this->flashmsg('<i class="fa fa-success"></i> Data berhasil disimpan');
        	redirect('kepala-bagian/kriteria');
        	exit;
        }

        $this->data['kriteria'] = $this->kriteria_m->get();
        $this->data['title']    = 'Kriteria' . $this->title;
        $this->data['content']  = 'kepala-bagian/kriteria';
        $this->template($this->data, 'kepala-bagian');
    }

    public function data_tanah()
    {
        $this->load->model('saw_m');
        $this->load->model('kriteria_m');
        $this->load->model('nilai_sifat_tanah_m');
        $this->load->model('sifat_kimia_tanah_m');
        $this->load->model('bobot_m');

        if ($this->POST('simpan'))
        {
            $this->sifat_kimia_tanah_m->insert([
                'kode_lab'      => $this->POST('kode_lab'),
                'kode_sampel'   => $this->POST('nama_tanaman') . '(' . $this->POST('tahun_tanaman') . ')',
                'nama_tanaman'  => $this->POST('nama_tanaman'),
                'tahun_tanaman' => $this->POST('tahun_tanaman')
            ]);

            $kode_lab = $this->POST('kode_lab');
            $label_id = $this->POST('label_id');
            $label_value = $this->POST('label_value');
            for ($i = 0; $i < count($label_value); $i++)
            {
                $id_kriteria = $label_id[$i];
                $nilai = $label_value[$i];
                $bobot = $this->bobot_m->get_row(['id_kriteria' => $id_kriteria, 'min_range <=' => $nilai, 'max_range >=' => $nilai]);
                if ($bobot)
                {
                    $this->nilai_sifat_tanah_m->insert([
                        'id_kriteria'   => $id_kriteria,
                        'id_bobot'      => $bobot->id_bobot,
                        'kode_lab'      => $kode_lab,
                        'nilai'         => $nilai
                    ]);
                }
            }

            $this->flashmsg('Data tanah berhasil disimpan');
            redirect('kepala-bagian/data_tanah');
            exit;
        }

        $this->data['tanah']        = $this->sifat_kimia_tanah_m->get();
        $arr = [];
        $i = 0;
        foreach ($this->data['tanah'] as $tanah)
        {
            $nilai = $this->nilai_sifat_tanah_m->get(['kode_lab' => $tanah->kode_lab]);
            $bobot = [];
            foreach ($nilai as $row)
            {
                $kriteria = $this->kriteria_m->get_row(['id_kriteria' => $row->id_kriteria]);
                $bobot[$kriteria->nama] = $row->nilai;
            }

            $arr[$i]['nilai']   = $bobot;
            $arr[$i++]['data']  = $tanah;            
        }

        $this->data['tanah']        = $arr;
        $this->data['kriteria']     = $this->kriteria_m->get();
        $this->data['title']        = 'Data Tanah' . $this->title;
        $this->data['content']      = 'kepala-bagian/data_tanah';
        $this->template($this->data, 'kepala-bagian');
    }

    public function hasil()
    {
        $this->load->model('saw_m');
        $this->data['hasil']    = $this->saw_m->sort_desc();
        $this->data['title']    = 'Hasil Perhitungan';
        $this->data['content']  = 'kepala-bagian/hasil';
        $this->template($this->data, 'kepala-bagian');
    }

    public function cara_perhitungan()
    {
        $this->data['title']    = 'Cara Perhitungan';
        $this->data['content']  = 'kepala-bagian/cara_perhitungan';
        $this->template($this->data, 'kepala-bagian');
    }

    public function laporan_cara_perhitungan()
    {
        @unlink(realpath(APPPATH . '../laporan.pdf'));
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
        header("Content-disposition: attachment; filename=laporan.pdf");
        header("Content-type: application/pdf");
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', -1);
        $rand = mt_rand(1000, 2000);
        $cmd = 'assets\phantomjs-2.1.1\bin\phantomjs.exe assets\phantomjs-2.1.1\generate_pdf.js ' . base_url('login/laporan-cara-perhitungan?nocache='.mt_rand(0, 9999999) . '^&kepala-bagian=true') . ' laporan.pdf ' . mt_rand(2000, 2500);
        echo exec($cmd);
        readfile(base_url('laporan.pdf'));
        // redirect(base_url('laporan.pdf'));
    }
}