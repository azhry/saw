<?php defined('BASEPATH') || exit('No direct script allowed');

class Penilaian_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'penilaian';
		$this->data['primary_key'] = 'id_penilaian';
	}

	public function defuzzification($data)
	{
		$this->load->model('bobot_m');
		$this->load->model('keputusan_m');
		$this->load->model('kriteria_m');

		// TODO: get nilai pelamar -> crisped -> keputusan

	}

	public function max($cond = '')
	{
		$this->db->select_max('hasil');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}

	public function min($cond = '')
	{
		$this->db->select_min('hasil');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}

	public function total($cond = '')
	{
		$this->db->select_sum('hasil');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}
}

