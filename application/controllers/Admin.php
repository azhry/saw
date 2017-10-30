<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin extends MY_Controller
{

	private $data = [];

  	public function __construct()
	{
	    parent::__construct();		
		$this->load->model('Pelamar_m');
  	}

  	public function test()
  	{
  		$this->load->model('penilaian_m');
  		$data = $this->penilaian_m->get(['id_pelamar' => 1]);
  		echo $this->penilaian_m->defuzzification($data);
  	}

  	public function index()
  	{
	    $this->data['title'] 	= 'Dashboard Admin';
	    $this->data['content']	= 'admin/dashboard';
	    $this->template($this->data);
	}

	public function daftar_pelamar()
  	{
  		$this->load->model('kriteria_m');
  		$this->load->model('bobot_m');
  		if ($this->POST('simpan')) {
  			
  		}
  		$this->data['kriteria'] = $this->kriteria_m->get();
	    $this->data['title'] 	= 'Daftar Pelamar';
	    $this->data['content']	= 'admin/daftar_pelamar';
	    $this->data['pelamar']	= $this->Pelamar_m->get();
	    $this->template($this->data);
	}

	public function hasil_penilaian()
  	{
	    $this->data['title'] 	= 'Hasil Penilaian Pelamar';
	    $this->data['content']	= 'admin/hasil_penilaian';
	    $this->template($this->data);
	}
}
