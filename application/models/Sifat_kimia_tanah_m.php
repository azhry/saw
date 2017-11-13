<?php 

class Sifat_kimia_tanah_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'sifat_kimia_tanah';
		$this->data['primary_key']	= 'kode_lab';
	}
}