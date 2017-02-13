<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Book extends CI_Controller{
	
    function __construct(){
		parent::__construct();
                $this->load->model('m_book','Book');
                $this->load->model('m_authentication','authe');
		$this->auth->cek_auth(); //ngambil auth dari library
	}
        
	function index()
	{
		$data['user']= $this->authe->ambil_user($this->session->userdata('id'));
		$stat = 0;
		if($stat==0){//admin
			$this->load->view('index',$data);
                        //print_r($data);
		}else{
			$this->load->view('index',$data);
		}
	}
        
        function category()
	{
		$data['user']= $this->authe->ambil_user($this->session->userdata('id'));
		$stat = 0;
		if($stat==0){//admin
			$this->load->view('book/kategori',$data);
                        //print_r($data);
		}else{
			$this->load->view('index',$data);
		}
	}
        
        public function ajax_list_category()
        {
        $list = $this->Book->get_datatables_category();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $count ='';
            $action ='<a href="" class="label label-danger">DELETE</a><a href="" class="label label-success" style="margin-left:3px;">UPDATE</a>';
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = $customers->kategori;
            $row[] = $customers->description;
            $row[] = '<center>'.$count.'</center>';
            $row[] = '<center>'.$action.'</center>';
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Book->count_all_category(),
                        "recordsFiltered" => $this->Book->count_filtered_category(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
        }
        
        function AddCategoryDo(){
            $kategori = $this->input->post('category');
            $deskripsi = $this->input->post('description');
            $user = $this->session->userdata('id');
            $data=array(
                'kategori' => $kategori,
                'description' => $deskripsi,
                'create_owner' => $user,
            );
            
            $hasil = $this->Book->AddBookDo($data);
            if($hasil){
                echo 'Add Category Success!';
            }else{
                echo 'Add Category Failed!';
            }
        }
        
        function Location(){
		$data['user']= $this->authe->ambil_user($this->session->userdata('id'));
		$stat = 0;
		if($stat==0){//admin
			$this->load->view('book/location',$data);
                        //print_r($data);
		}else{
			$this->load->view('index',$data);
		}
        }
    

}

