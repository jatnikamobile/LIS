<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	// variable utk datatable serverside
	var $tbl = 'mw_gizi_user';
	var $column_order = array(null,'id_user', 'id_group', 'uname', 'pass', 'group_nama','group_akses');
	var $column_search = array('uname','group_nama','group_akses');
	var $order = array('update_at' => 'desc');

	// private variable utk memanggil nama table dan idnya
	private $table = 'mw_gizi_user';
	private $id = 'id_user';
	private $pass = 'pass';
	protected $sv;
	public function __construct()
	{
		// load library database
		parent::__construct();
		$this->load->database();
		$this->sv = $this->load->database('server',true);
	}

	// function menampilkan semua list user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by($this->id,'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	// Function Tambah User
	public function tambah($data)
	{
		$this->db->insert($this->table,$data);
	}

	// Function untuk edit data
	public function edit($id,$data)
	{
		$this->db->where($this->id,$id);
		$this->db->update($this->table,$data);

	}

	// Function untuk mendapatkan id dari user untuk keperluar function edit
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->id,$id_user);
		$query = $this->db->get();
		return $query->row_array();
	}

	// Function delete data
	public function delete($data)
	{
		$this->db->where($this->id,$data['id_user']);
		$this->db->delete($this->table,$data);
	}

	// Function untuk mengecek username
	public function check_login($username,$password)
	{
		// $this->db->select('*');
		// $this->db->from($this->table);
		// $this->db->where('uname',$username);
		// $query = $this->db->get();
		// return $query->row_array();
		$this->sv->where('NamaUser',$username)->where('Password',$password);
		$resp = $this->sv->get('DBpass')->row();
		return $resp;
		
	}

	public function get_group_user($id='')
	{
		if($id!=''){
			$this->db->where('id_group',$id);
		}
		$get = $this->db->get('mw_gizi_user_group');
		return $get->result();
	}
	// datatable serverside
	private function _get_datatables_query()
	{
		$this->db->select("mu.id_user, mu.uname, mg.id_group, mg.group_nama, mg.group_akses, mu.create_at, mu.update_at");
		$this->db->from("mw_gizi_user mu");
		$this->db->join("mw_gizi_user_group mg", "mu.id_group = mg.id_group","INNER");
		$i = 0;
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function get_datatables_verify()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->where("akses_level","kecamatan");
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->tbl);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_user',$id);
        $query = $this->db->get();
 
        return $query->row();
    }


}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */