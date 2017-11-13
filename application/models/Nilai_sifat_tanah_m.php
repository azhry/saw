<?php 

class Nilai_sifat_tanah_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'nilai_sifat_tanah';
		$this->data['primary_key']	= 'id_nilai';
	}
}