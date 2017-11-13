<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function hasil_uji_daun()
    {
        $this->data['title']        = 'Data Hasil Uji Daun Sawit';
        $this->data['content']      = 'admin/hasil_uji_daun';
        $this->template($this->data);
    }

    public function data_tanah()
    {
        $this->load->model('saw_m');
        $this->load->model('kriteria_m');
        $this->load->model('nilai_sifat_tanah_m');
        $this->load->model('sifat_kimia_tanah_m');
        $this->load->model('bobot_m');

        // $hasil = $this->saw_m->sort_desc();
        // $this->dump($hasil);
        // exit;

        if ($this->POST('simpan'))
        {
            $this->sifat_kimia_tanah_m->insert([
                'kode_lab'      => $this->POST('kode_lab'),
                'kode_sampel'   => $this->POST('kode_sampel'),
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
            redirect('admin/data_tanah');
            exit;
        }

        $this->data['kriteria']     = $this->kriteria_m->get();
        $this->data['title']        = 'Data Tanah Lab FP Kecil';
        $this->data['content']      = 'admin/data_tanah';
        $this->template($this->data);
    }
}
