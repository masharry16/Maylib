<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_authentication extends CI_Model{

  var $user = 'tbl_user';
  var $log = 'tbl_log';
  var $log_view = 'view_tbl_log';
  
  //Kebutuhan untuk Serverside LogActivity
  var $column_order = array(null, 'name','activity','activity_description','activity_time','ip_computer'); //set column field database for datatable orderable
  var $column_search = array('name','activity','activity_description','activity_time','ip_computer'); //set column field database for datatable searchable 
  var $order = array('activity_time' => 'DESC'); // default order 
  
  function __construct()
	{
	parent::__construct();
	}
  
    private function _get_datatables_query()
    {
        
        $this->db->from($this->log_view);

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

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->log_view);
        return $this->db->count_all_results();
    }
        
        
  function get_all_log(){
            $this->db->from($this->log_view);
            $query = $this->db->get();
            return $query->result();
  }
                
  function activity_log($data){
            $this->db->insert($this->log, $data);
            return TRUE;
  }
        
  function auth_get_all_user_data(){ //mengambil semua userdata dari table
            $this->db->from($this->user);
            $this->db->order_by('create_date','DESC');
            $query = $this->db->get();
            return $query->result();
  }
  
  function get_user_by_id($id){
            $this->db->from($this->user);
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $query->result();
  }
  
  function register_user($data){
            $this->db->insert($this->user, $data);
            return TRUE;
  }
  
  function updateUserdata($where,$data){
        $this->db->update($this->user, $data, $where);
        return $this->db->last_query();
  }
   
   function delete_user($id){
            $this->db->where('id', $id);
	    $this->db->delete($this->user);
   }
   
   function cek_user($email,$password){
            $kueri = $this->db->query('SELECT * FROM tbl_user WHERE email=? AND password=? AND active=?',array($email , $password,'1'));
	    $query = $kueri->result_array();
	    return $query;
	}
        
    function ambil_user($id){
        $query = $this->db->get_where($this->user, array('id' => $id));
        $kueri = $query->result_array();
        if($kueri){
            return $kueri[0];
        }
    }
  
}
