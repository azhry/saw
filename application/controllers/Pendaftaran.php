<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{

	private $data = [];

  	function __construct()
	{
	    parent::__construct();		
  	}

  	public function index()
  	{
	    $this->load->view('daftar');
	}
}
