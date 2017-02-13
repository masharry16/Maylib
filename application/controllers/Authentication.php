<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_authentication','authe');
    }
	
	public function index(){
        $session = $this->session->userdata('isLogin');
        if($session == FALSE)
        {
            $this->load->view('authentication/login');
        }else{
            redirect('Dashboard');
        }
	}
        
        function AuthenticationLoginDo(){
                 $email = $this->input->post("email");
                 $password = $this->input->post("password");
                 $cek = $this->authe->cek_user($email , md5($password)); //melakukan persamaan data dengan database
            if(count($cek) == 1){ //cek data berdasarkan username & pass
            foreach ($cek as $employee) 
                {
                $id             = $employee['id'];                             
                $name           = $employee['name'];                 
                $birth_date     = $employee['birth_date'];
                $email          = $employee['email'];
                $id_number      = $employee['id_number'];
                $address        = $employee['address'];
                $phone_number   = $employee['phone_number'];                
                $token          = $employee['token'];   
                $level          = $employee['level'];
                $active         = $employee['active'];
                $photos         = $employee['photos'];
                $thumbnail      = $employee['thumbnail'];
                $patch          = $employee['patch'];
                
                }
            $this->session->set_userdata(array(
                'isLogin'       => TRUE, //set data telah login
                'id'            => $id,
                'name'          => $name,
                'birth_date'    => $birth_date,
                'email'         => $email,
                'id_number'     => $id_number,
                'address'       => $address,
                'phone_number'  => $phone_number,
                'token'         => $token,
                'level'         => $level,
                'active'        => $active,
                'photos'        => $photos,
                'thumbnail'     => $thumbnail,
                'patch'         => $patch
            ));
            
                //INSERT LOG DATA//
                $log = array(
                    'user_id' => $id,
                    'activity' => 'Login',
                    'activity_description' => $name.' Trying Login to the System & Successfull!!',
                    'ip_computer' => $_SERVER['REMOTE_ADDR']
                );
                $this->authe->activity_log($log);
                
        redirect('dashboard','refresh');  //redirect ke halaman dashboard
        }else{ //jika data tidak ada yng sama dengan database
            echo "<script>alert('Gagal Login!')</script>";
            redirect('Authentication','refresh');
        }

    }
        
        public function register(){
                $this->auth->cek_auth(); //ceklogin
                $data['user']= $this->authe->ambil_user($this->session->userdata('id'));
                $data['users_data'] = $this->authe->auth_get_all_user_data();
                $this->load->view('Authentication/register',$data);
                //print_r($data);
        }
        
        public function RegistrationProcessing(){
            //start load library
            $this->load->library('uuid');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            //end load library
            $name = $this->input->post('name');
            $data = array(
                'name' => $name,
                'password' => md5($this->input->post('password')),
                'birth_date' => $this->input->post('dateofbirth'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone'),
                'id_number' => $this->input->post('idnumber'),
                'token' => $this->uuid->v4(), //add UUID
                'level' => $this->input->post('level'),
                'active' => $this->input->post('active'),
                'create_owner' => $this->input->post('owner'),
            );
                    
            $this->form_validation->set_rules('idnumber', 'required');
            $this->form_validation->set_rules('level', 'required');
            $this->form_validation->set_rules('phone', 'required');
            $this->form_validation->set_rules('name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('confirm_email', 'Email', 'required');
            
            if ($this->form_validation->run() == FALSE){
                $this->load->view('authentication/register');
            }else{
                $this->authe->register_user($data); // insert data into database
                
                //INSERT LOG DATA//
                $log = array(
                    'user_id' => $this->input->post('owner'),
                    'activity' => 'INSERT',
                    'activity_description' => 'Register '.$name.' As User',
                    'ip_computer' => $_SERVER['REMOTE_ADDR']
                );
                $this->authe->activity_log($log);
                
                $this->session->set_flashdata("messages", "<div class=\"alert alert-success alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Congratulation!</strong> Add data successfull</div>");
                redirect('Authentication/register');
                //print_r($data);
             }
                
        }
        
        public function updateUserdata(){ //Ajax update using x-editable
        $pk = $_POST['pk'];
        $name = $_POST['name'];
        $value = $_POST['value'];
        
                    $data=array(
                    $name => $value,
                    );
        
        if(!empty($value)) {
             $this->authe->updateUserdata(array('id' => $pk), $data);
        } else {
            header('HTTP/1.0 400 Bad Request', true, 400);
            echo "This field is required!";
        }
        }
        
        public function DeleteUserDo($id)
        {         
            $session = $this->session->userdata('isLogin');
            if($session == FALSE){
            redirect('Authentication');
            }else{
                $user = $this->authe->ambil_user($id);
                $name = $user['name'];
                    $log = array(
                    'user_id' => $this->session->userdata('id'),
                    'activity' => 'DELETE',
                    'activity_description' => 'Permanently Delete User ID : '.$name,
                    'ip_computer' => $_SERVER['REMOTE_ADDR']
                );
                $this->authe->activity_log($log);
                $this->authe->delete_user($id);
  		echo json_encode(array("status" => TRUE));
            }
        }
        
        
        public function ResetUserDo($id){
            $session = $this->session->userdata('isLogin');
            $newpass = MD5('12345');
            if($session == FALSE){
            redirect('Authentication');
            }else{
                $user = $this->authe->ambil_user($id);
                $name = $user['name'];
                    $log = array(
                    'user_id' => $this->session->userdata('id'),
                    'activity' => 'RESET',
                    'activity_description' => 'Reset Password user : '.$name,
                    'ip_computer' => $_SERVER['REMOTE_ADDR']
                );
                    $data=array(
                        'password' => $newpass
                    );
                $this->authe->activity_log($log);
                $this->authe->updateUserdata(array('id' => $id), $data);
  		echo json_encode(array("status" => TRUE));
            }
        }
        
        
        function LogActivity(){
        //$data['log'] = $this->authe->get_all_log();
        $level = $this->session->userdata('level');
            if($level != '3'){
            redirect('Dashboard');
            }else{
            $this->load->view('logactivity/LogActivity');
            //print_r($data);
            }
        } 
        
    public function ajax_list()
    {
        $list = $this->authe->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->name;
            $row[] = $customers->activity;
            $row[] = $customers->activity_description;
            $row[] = $customers->activity_time;
            $row[] = $customers->ip_computer;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->authe->count_all(),
                        "recordsFiltered" => $this->authe->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
       
        
        
}
