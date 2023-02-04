<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	public $table;

	protected $per_page = 20;
	protected $paging_limit = 10;
	protected $page_variable = 'page';

	protected $db_interface;

	function __construct()
	{
		parent::__construct();
		$this->load->library('input_sanitizer');
		$this->db_interface = $this->load->database('default', TRUE);
	}

	protected function get_page_parameter()
	{
		return $this->input_sanitizer->sanitize_integer($this->input->get($this->page_variable ?? 'page'), 1);
	}

	protected function get_per_page_parameter()
	{
		return $this->per_page ?? 25;
	}

	public function raw_query_pagination($select_query, $from_query, $where_query, $order_by)
	{
		$page = $this->get_page_parameter();
		$per_page = $this->get_per_page_parameter();

		$from_row = ($page - 1) * $per_page + 1;
		$to_row = $from_row + $per_page;

		if(is_array($select_query))
		{
			$select_query = join(',', $select_query);
		}

		if(is_array($from_query))
		{
			$from_query = join(' ', $from_query);
		}

		if(!empty($where_query))
		{
			$where_query = 'WHERE '.$where_query;
		}

		$raw_query = "
			WITH __base_result__ AS (SELECT $select_query FROM $from_query), __scope_result__ AS (
				SELECT *, ROW_NUMBER() OVER (ORDER BY $order_by) AS row_number
				FROM __base_result__
				$where_query
			) SELECT * FROM __scope_result__ WHERE row_number BETWEEN ? AND ?;
		";

		$data = $this->db_interface->query($raw_query, [$from_row, $to_row])->result();

		$next_page = count($data) === (1 + $per_page) ? ($page + 1) : FALSE;
		$previous_page = $page > 1 ? ($page - 1) : FALSE;

		if($next_page !== FALSE) array_pop($data);

		$raw_query = "
			WITH __base_result__ AS (SELECT $select_query FROM $from_query), __scope_result__ AS (
				SELECT 1 AS one FROM __base_result__ $where_query
			) SELECT COUNT(0) AS count FROM __scope_result__;
		";

		$count = $this->db_interface->query($raw_query)->row('count');

		$current_page = $page;

		$limit = $this->paging_limit;

		$first_page = 1;
		$last_page = intval(ceil($count / $per_page));

		$paging = [ $page ];

		$limit = $limit > $last_page ? $last_page : $limit;

		for ($i = 1; $i <= $limit && $i <= $count; $i++)
		{
			if(count($paging) < $limit && ($prev = $page - $i) >= $first_page)
			{
				array_unshift($paging, $prev);
			}

			if(count($paging) < $limit && ($next = $page + $i) <= $last_page)
			{
				array_push($paging, $next);
			}
		}

		$pagination = (Object) compact(
			'next_page', 'previous_page', 'count', 'current_page', 'paging', 'first_page', 'last_page'
		);

		return (Object) compact('data', 'pagination');
	}

	public function generic_pagination(...$params)
	{
		[$one, $caller] = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

		if(!method_exists($this, $method = $caller['function'].'_query_scope'))
		{
			throw new Exception("Missing $method method in ".$caller['class'].' class');
		}

		$this->$method(...$params);

		$page = $this->get_page_parameter();
		$per_page = $this->get_per_page_parameter();

		$from_row = ($page - 1) * $per_page + 1;
		$to_row = $from_row + $per_page;

		$raw_query  = "WITH __result__ AS (".$this->db_interface->get_compiled_select().") ";
		$raw_query .= "SELECT * FROM __result__ WHERE row_number BETWEEN ? AND ?;";
		$data = $this->db_interface->query($raw_query, [$from_row, $to_row])->result();

		$next_page = count($data) === (1 + $per_page) ? ($page + 1) : FALSE;
		$previous_page = $page > 1 ? ($page - 1) : FALSE;

		if($next_page !== FALSE) array_pop($data);

		$this->db_interface->select('COUNT(0) AS count');
		$this->$method(...$params);

		$count = $this->db_interface->get()->row('count');

		$current_page = $page;

		$limit = $this->paging_limit;

		$first_page = 1;
		$last_page = intval(ceil($count / $per_page));

		$paging = [ $page ];

		$limit = $limit > $last_page ? $last_page : $limit;

		for ($i = 1; $i <= $limit && $i <= $count; $i++)
		{
			if(count($paging) < $limit && ($prev = $page - $i) >= $first_page)
			{
				array_unshift($paging, $prev);
			}

			if(count($paging) < $limit && ($next = $page + $i) <= $last_page)
			{
				array_push($paging, $next);
			}
		}

		return (Object) compact(
			'data', 'next_page', 'previous_page', 'count', 'current_page', 'paging', 'first_page', 'last_page'
		);
	}

	protected function create_valid_user()
	{
		return strtoupper($this->app_session->item('username') ?? 'SYSTEM').' '.date('d/m/Y H:i:s');
	}

	protected function current_timestamp()
	{
		return date('Y-m-d H:i:s');
	}

	protected function get_table_fields()
	{
		if(is_null($this->fields))
		{
			list($catalog, $schema, $table) = explode('.', $this->table);
			$raw_query = "SELECT column_name FROM $catalog.INFORMATION_SCHEMA.Columns WHERE TABLE_SCHEMA=? AND TABLE_NAME=?";
			$this->fields = array_map(
				function($i) { return $i->column_name; },
				$this->db_interface->query($raw_query, [$schema, $table])->result()
			);
		}

		return $this->fields;
	}
}