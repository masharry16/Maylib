<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_book extends CI_Model{

  var $kategori = 'tbl_kategori';
  var $location = 'tbl_location';
  var $kategoris = 'view_kategori';
  var $locations = 'view_location';
  
  //Kebutuhan untuk Serverside Kategori
  var $column_order = array(null, 'kategori','description','create_owner','create_date'); //set column field database for datatable orderable
  var $column_search = array('kategori','description','create_owner','create_date'); //set column field database for datatable searchable 
  var $order = array('create_date' => 'DESC'); // default order 
  //Kebutuhan untuk Serverside Location
  var $column_orders = array(null, 'location','description','create_owner','create_date'); //set column field database for datatable orderable
  var $column_searchs = array('location','description','create_owner','create_date'); //set column field database for datatable searchable 
  var $orders = array('create_date' => 'DESC'); // default order 
  
  function __construct()
	{
	parent::__construct();
	}
  
  private function _get_datatables_query()
    {
        
        $this->db->from($this->kategori);

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

    function get_datatables_category()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_category()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_category()
    {
        $this->db->from($this->kategori);
        return $this->db->count_all_results();
    }
    
    public function AddBookDo($data){
            $this->db->insert($this->kategori, $data);
            return TRUE;
    }
        
}
