<?php defined('BASEPATH') || exit('No direct script allowed');

class Login_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'tb_login';
		$this->data['primary_key'] = 'kode_login';
	}

	public function login($data)
	{
		$result = $this->get_row(['nama_user' => $data['username'], 'pass_user' => $data['password']]);
		if (!isset($result))
			return $result;
		$this->session->set_userdata([
			'username'	=> $result->nama_user,
			'hak_akses'	=> $result->hak_akses
		]);
		return $result;
	}
}

