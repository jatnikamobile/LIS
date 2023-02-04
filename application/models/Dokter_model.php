<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->sv = $this->load->database('server', TRUE);
		$this->db_interface =& $this->sv;
	}

	public function get_dokter_page($filter_options)
	{
		extract($filter_options);

		$select = ['KdDoc', 'NmDoc', 'KdPoli', 'NmPoli'];

		$where = NULL;
		if(!empty($term))
		{
			$builded_term = "LIKE '%".$this->db->escape_like_str($term)."%' ESCAPE '!'";
			$where = "NmDoc $builded_term OR NmPoli $builded_term";
		}

		return $this->raw_query_pagination($select, 'FtDokter', $where, 'NmDoc ASC');
	}
}