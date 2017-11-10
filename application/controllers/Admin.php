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
        $this->load->model('Saw_m');
        
        if ($this->POST('simpan'))
        {

            // bobot pH Tanah
            // $pH_tanah = $this->POST('pH');
            // if($pH_tanah >= 0 || $pH_tanah <= 4.4)
            //     $id_bobot = 1;
            // elseif($pH_tanah >= 4.5 || $pH_tanah <= 5.5)
            //     $id_bobot = 2;
            // elseif($pH_tanah >= 5.6 || $pH_tanah <= 6.5)
            //     $id_bobot = 3;
            // elseif($pH_tanah >= 6.6 || $pH_tanah <= 7.5)
            //     $id_bobot = 4;
            // elseif($pH_tanah >= 7.6 || $pH_tanah <= 8.5)
            //     $id_bobot = 5;
            // else
            //     echo "input nilai";


            // echo $id_bobot; exit;



            $this->data['data_tanah'] = [
                'id_kriteria'           => 1,
                'id_bobot'          => 1,
                'kode_lab' => $this->POST('kode_lab'), 
                'nilai' => 7.8     
            ];
            
            // if (!$this->Saw_m->required_input(array_keys($this->data['data_tanah'])))
            // {
            //     $this->flashmsg('Anda harus mengisi form dengan benar', 'danger');
            //     redirect('admin/data_tanah');
            //     exit;   
            // }
            
            $this->Saw_m->insert($this->data['data_tanah']);
            $this->flashmsg('Data tanah berhasil disimpan');
            redirect('admin/data_tanah');
            exit;
        }

        $this->data['title']        = 'Data Tanah Lab FP Kecil';
        $this->data['content']      = 'admin/data_tanah';
        $this->template($this->data);
    }
}
