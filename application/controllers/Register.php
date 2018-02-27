<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct() {

		parent::__construct();
		$this->data['username'] = $this->session->userdata('username');
        if (isset($this->data['username']))
        {
            $this->data['hak_akses'] = $this->session->userdata('hak_akses');
	        if (isset( $this->data['hak_akses'] ))
	        {
	        	switch ( $this->data['hak_akses'] ) {

	        		case 'kabagian':
	        			redirect( 'kepala-bagian' );
	        			break;

	        		case 'staff':
	        			redirect( 'pegawai' );
	        			break;

	        		case 'admin':
	        			redirect( 'admin' );
	        			break;

	        		case 'eksternal':
	        			redirect( 'eksternal' );
	        			break;

	        	}

	        }

	        $this->session->sess_destroy();
	        redirect( 'register' );
	        exit;
        }

	}

	public function index() {

		if ( $this->POST( 'register' ) ) {

			$this->load->model( 'login_m' );
			$this->data['login'] = [
				'nama_user'	=> $this->POST( 'nama_user' ),
				'pass_user'	=> md5( $this->POST( 'pass_user' ) ),
				'hak_akses'	=> 'eksternal'
			];
			$this->login_m->insert( $this->data['login'] );
			$this->flashmsg( 'Pendaftaran berhasil' );
			redirect( 'login' );
			exit;

		}
		$this->load->view( 'register' );

	}

}