<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	
    function __construct(){
		parent::__construct();
                $this->load->model('m_authentication','authe');
		$this->auth->cek_auth(); //ngambil auth dari library
	}
        
	function index()
	{
		$data['user']= $this->authe->ambil_user($this->session->userdata('id'));
		$stat = 0;
		if($stat==0){//admin
			$this->load->view('index',$data);
		}else{
			$this->load->view('index',$data);
		}
	}

	function Authentication(){
        $session = $this->session->userdata('isLogin');
            if($session == FALSE){
      		$this->load->view('authentication/login');
            }else{
      		redirect('dashboard');
            }   
	}
        
	function logout()
	{
                //Get User Name
                $user = $this->session->userdata('id');
                $name = $this->session->userdata('name');
                //INSERT LOG DATA//
                    $log = array(
                    'user_id' => $user,
                    'activity' => 'Logout',
                    'activity_description' => $name.' Trying Logout from the System & Successfull!!',
                    'ip_computer' => $_SERVER['REMOTE_ADDR']
                );
                $this->authe->activity_log($log);
                
		$this->session->sess_destroy();
		redirect('Authentication','refresh');
	}
        
        function ChangePassword(){
		$data['user']= $this->authe->ambil_user($this->session->userdata('id'));
		$this->load->view('authentication/change_password',$data);
                //print_r($data);
        }
        
        function ChangePasswordDo(){
            $id = $this->session->userdata('id');
            $data= $this->authe->ambil_user($id);
            $oldpassworddb = $data['password'];
            $oldpassword = MD5($this->input->post('oldpassword'));
            $newpassword = $this->input->post('password');
            $newpasswordconfirm = $this->input->post('password2');
            if($oldpassworddb != $oldpassword){
                $this->session->set_flashdata("messages", "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Wrong Old Password! </div>");
                redirect('dashboard/changepassword');          
            }else{
                
            if($newpassword != $newpasswordconfirm){
                $this->session->set_flashdata("messages", "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>New Password and New Password Confirmation not Same! </div>");
                redirect('dashboard/changepassword');    
            }
                $data=array(
                    'password' =>  MD5($newpassword)
                );
                
                $hasil =  $this->authe->updateUserdata(array('id' => $id), $data);
                if($hasil){
                $this->session->set_flashdata("messages", "<div class=\"alert alert-success alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Change Password Successfully!</div>");
                redirect('dashboard/changepassword');  
                }else{
                $this->session->set_flashdata("messages", "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>There's Something Wrong with the System!</div>");
                redirect('dashboard/changepassword'); 
                }
            }
            
        }
        
        function ProfilePage(){
		$data['user']= $this->authe->ambil_user($this->session->userdata('id'));
                $this->load->view('authentication/profile_page',$data);
               // print_r($data);
        }
        
        function UpdateProfilePageDo(){
            //print_r($_POST);
            $name = $this->input->post('name');
            $dateofbirth = $this->input->post('dateofbirth');
            $email = $this->input->post('email');
            $id_number = $this->input->post('idnumber');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
            $ids = $this->input->post('ids');
            $photos = $this->input->post('photos');
            $thumbnail = $this->input->post('thumbnail');
            $File = $_FILES["files"]['name'];
            if($File==''){
            $data = array(
                'name' => $name,
                'birth_date' => $dateofbirth,
                'email' => $email,
                'id_number' => $id_number,
                'address' => $address,
                'phone_number' => $phone,
            );
            
            $hasil = $this->authe->updateUserdata(array('id' => $ids), $data);
                    if($hasil){
                        $this->session->set_flashdata("messages", "<div class=\"alert alert-success\" id=\"alert\"> Update profile failed! </div>");
                        redirect('dashboard/profilepage');
                    }else{
                        $this->session->set_flashdata("messages", "<div class=\"alert alert-danger\" id=\"alert\"> Update profile failed! </div>");
                        redirect('dashboard/profilepage');
                    }
                    
            }else{
                
                if($photos==''){}else{
                $dir = getcwd();
                $file =$dir.'\assets\uploads\ProfilePhoto/'.$photos;
                $thumb =$dir.'\assets\uploads\ProfilePhoto/'.$thumbnail;
                //$file = FCPATH."/assets/uploads/ProfilePhoto/".$photos;
                //$thumb = FCPATH."/assets/uploads/ProfilePhoto/".$thumbnail;
		unlink($file);
                unlink($thumb);
                }
                            $this->load->library('image_lib');      
                            $dir = FCPATH."/assets/uploads/ProfilePhoto/";
                            $dirs = FCPATH."/assets/uploads/ProfilePhoto/";
                            $patch = "/assets/uploads/ProfilePhoto/";
                            $new_name = time().$_FILES["files"]['name'];
                            $config['file_name'] = $new_name;
                            $config['upload_path']   = Trim($dir);
                            $config['allowed_types'] = 'gif|jpg|png|ico';
                            $this->load->library('upload',$config);

                            if($this->upload->do_upload('files')){
                                    $nama =$this->upload->data('file_name');
                                    $data_upload = $this->upload->data();
                                    $this->image_lib->initialize(array(
                                        'image_library' => 'gd2',
                                        'source_image' => $dirs.'/'.$data_upload['file_name'],
                                        'maintain_ratio' => false,
                                        'create_thumb' => true,
                                        'width' => 150,
                                        'height' => 150
                                    ));
                    $this->image_lib->resize();
                    $datas = array(
                        'name' => $name,
                        'birth_date' => $dateofbirth,
                        'email' => $email,
                        'id_number' => $id_number,
                        'address' => $address,
                        'phone_number' => $phone,
                        'photos' => $nama,
                        'thumbnail' => $data_upload['raw_name'].'_thumb'.$data_upload['file_ext'],
                        'patch' => $patch
                    );
                    
                    $hasils = $this->authe->updateUserdata(array('id' => $ids), $datas);
                    if($hasils){
                        $this->session->set_flashdata("messages", "<div class=\"alert alert-success\" id=\"alert\"> Update profile success! </div>");
                        redirect('dashboard/profilepage');
                    }else{
                        $this->session->set_flashdata("messages", "<div class=\"alert alert-danger\" id=\"alert\"> Update profile filed! </div>");
                        redirect('dashboard/profilepage');
                    }
            }else{
                echo 'GAGAL UPLOAD!';
            }
            
        }
        }
        
        
        function admin(){
		$data['user']= $this->authe->ambil_user($this->session->userdata('id'));
		$stat = 0;
		if($stat==0){//admin
			$this->load->view('dashboard/admin',$data);
		}else{
			$this->load->view('index',$data);
		}
        }
       

}
