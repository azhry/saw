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
					redirect('admin');
					exit;
				case 'staff':
					redirect('pegawai');
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
}
