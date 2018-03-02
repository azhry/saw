<?php defined('BASEPATH') || exit('No direct script allowed');

class Bobot_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'bobot';
		$this->data['primary_key'] = 'id_bobot';
	}

	public function get_bobot()
	{
		$this->db->select('*');
		$this->db->from($this->data['table_name']);
		$this->db->join('kriteria', $this->data['table_name'] . '.id_kriteria = kriteria.id_kriteria');
		$query = $this->db->get();
		return $query->result();
	}
}

