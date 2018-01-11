<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller
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
        if ($this->data['hak_akses'] != 'staff')
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;   
        }
	}

	public function index()
    {
        $this->data['title']        = 'Dashboard Pegawai' . $this->title;
        $this->data['content']      = 'pegawai/dashboard';
        $this->template($this->data, 'pegawai');
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
            redirect('pegawai/data-tanah');
            exit;
        }

        if ($this->POST('edit'))
        {
            $this->sifat_kimia_tanah_m->update($this->POST('kode_lab'), [
                'kode_lab'      => $this->POST('edit_kode_lab'),
                'kode_sampel'   => $this->POST('edit_nama_tanaman') . '(' . $this->POST('edit_tahun_tanaman') . ')',
                'nama_tanaman'  => $this->POST('edit_nama_tanaman'),
                'tahun_tanaman' => $this->POST('edit_tahun_tanaman')
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
                    $this->nilai_sifat_tanah_m->update_where([
                        'id_kriteria'   => $id_kriteria,
                        'kode_lab'      => $this->POST('kode_lab')
                    ], [
                        'id_bobot'      => $bobot->id_bobot,
                        'nilai'         => $nilai
                    ]);
                }
            }

            $this->nilai_sifat_tanah_m->update_where(['kode_lab' => $this->POST('kode_lab')], [
                'kode_lab'  => $this->POST('edit_kode_lab')
            ]);

            $this->flashmsg('Data tanah berhasil di-edit');
            redirect('pegawai/data-tanah');
            exit;
        }

        if ($this->POST('get') && $this->POST('kode_lab'))
        {
            $tanah = $this->sifat_kimia_tanah_m->get_row(['kode_lab' => $this->POST('kode_lab')]);
            $tanah = (array)$tanah;
            $tanah['nilai'] = $this->nilai_sifat_tanah_m->get(['kode_lab' => $this->POST('kode_lab')]);
            $tanah['nilai'] = (array)$tanah['nilai'];
            echo json_encode($tanah);
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
        $this->data['content']      = 'pegawai/data_tanah';
        $this->template($this->data, 'pegawai');
    }
}
