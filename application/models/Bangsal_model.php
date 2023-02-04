<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bangsal_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->sv = $this->load->database('server', TRUE);
		$this->db_interface =& $this->sv;
	}

	public function get_bangsal_page($filter_options)
	{
		extract($filter_options);

		$select = ['KdBangsal', 'NmBangsal'];

		$where = NULL;
		if(!empty($term))
		{
			$builded_term = "LIKE '%".$this->db->escape_like_str($term)."%' ESCAPE '!'";
			$where = "NmBangsal $builded_term OR KdBangsal $builded_term";
		}

		return $this->raw_query_pagination($select, 'TBLBangsal', $where, 'NmBangsal ASC');
	}

	public function get_all_bangsal()
	{
		return $this->sv->select(['KdBangsal', 'NmBangsal'])->order_by('NmBangsal ASC')->get('TBLBangsal')->result();
	}
}