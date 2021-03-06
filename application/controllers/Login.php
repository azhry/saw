<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{

	private $data = [];

  	public function __construct()
	{
	    parent::__construct();	
	    $username = $this->session->userdata('username');
	    $hak_akses = $this->session->userdata('hak_akses');
		if (isset($username))
		{
			switch ($hak_akses) 
			{
				case 'kabagian':
					redirect('kepala-bagian');
					exit;
				case 'staff':
					redirect('pegawai');
					exit;
				case 'admin':
					redirect('admin');
					exit;
				case 'eksternal':
					redirect( 'eksternal' );
					exit;
			}
		}
		$this->load->model('login_m');	
  	}

  	public function index()
  	{
  		if ($this->POST('login-submit'))
		{
			if (!$this->login_m->required_input(['username','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
				'username'	=> $this->POST('username'),
				'password'	=> md5($this->POST('password'))
			];

			$result = $this->login_m->login($this->data);
			if (!isset($result)) 
			{
				$this->flashmsg('Username atau password salah','danger');
			}
			redirect('login');
			exit;
		}
		$this->data['title'] = 'LOGIN'.$this->title;
		$this->load->view('login',$this->data);
	}

	public function daftar()
  	{
	    $this->load->view('daftar');
	}

	public function laporan_cara_perhitungan()
    {
    	ini_set('max_execution_time', 0);
    	ini_set('memory_limit', -1);
    	if ($this->GET('admin'))
    	{
    		$this->load->model('sifat_kimia_tanah_m');
	        $this->load->model('nilai_sifat_tanah_m');
	        $this->load->model('bobot_m');
	        $this->load->model('kriteria_m');

	        $this->data['kriteria']	= $this->kriteria_m->get();
	        $this->data['tanah'] 	= $this->sifat_kimia_tanah_m->get();
	        $this->load->view('admin/laporan_cara_perhitungan', $this->data);
    	}
    	else
    	{
    		echo 'You must login to generate report!';
    	}
    }	

}
