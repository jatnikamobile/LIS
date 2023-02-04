<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->sv = $this->load->database('server', TRUE);
		$this->db_interface =& $this->sv;
	}

	public function get_poli_page($filter_options)
	{
		extract($filter_options);

		$select = ['KdPoli', 'NmPoli', 'KdTuju'];

		$where = NULL;
		if(!empty($term))
		{
			$builded_term = "LIKE '%".$this->db->escape_like_str($term)."%' ESCAPE '!'";
			$where = "NmPoli $builded_term OR KdPoli $builded_term";
		}

		return $this->raw_query_pagination($select, 'POLItpp', $where, 'NmPoli ASC');
	}

	public function get_all_poli()
	{
		return $this->sv->select(['KdPoli', 'NmPoli', 'KdTuju'])->order_by('NmPoli ASC')->get('POLItpp')->result();
	}
}