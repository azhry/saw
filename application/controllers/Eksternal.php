<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eksternal extends MY_Controller {

	public function __construct() {

		parent::__construct();
		$this->data['username'] = $this->session->userdata('username');
        if (!isset($this->data['username']))
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }

        $this->data['hak_akses'] = $this->session->userdata('hak_akses');
        if ($this->data['hak_akses'] != 'eksternal')
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;   
        }

	}

	public function index() {

		$this->load->model('saw_m');
        $this->data['hasil']    = $this->saw_m->sort_desc();
        $this->data['title']    = 'Hasil Perhitungan';
        $this->data['content']  = 'eksternal/hasil';
        $this->template($this->data, 'eksternal');

	}

}