<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('my_model');            
            $this->load->library('form_validation');
            $this->load->library('pagination');
            if($this->session->userdata('username') == FALSE){
                header('Location: http://localhost/admin/admin/login/index');                                                
            }
        }                
	public function index()
	{               
            $data     = array(); 
            $name = $this->session->userdata('username');
                $column = 'admin_username';
                $value  = $name;
                $table  = 'admin';
                $data['admin'] = $this->my_model->get_rows_by_column($column , $value , $table);                                
                
            $this->load->view('admin/index',$data);
         /*   if($this->input->post('submit')){                                
                //Validating Name Field
                
                    //                    $this->load->view('site/complaints', $data_a);
                    
                    $data_a['name']    = $this->input->post('name');
                    $data_a['comment']    = $this->input->post('comment');                    
                    $table = 'comments';
                    if($this->my_model->insertData($table,$data_a) == TRUE){
                        echo '<script language="javascript">';
                        echo 'alert("تم ارسال التعليق");';
                        echo '</script>';
                    }else{
                        echo '<script language="javascript">';
                        echo 'alert("لم يتم ارسال التعليق");';
                        echo '</script>';
                    }
                */
                //echo 'ok';
            // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
            // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');
                
                //echo $data['subject'];                                                                                
            
	} 
        
        public function myProfile()
	{               
            $data_a     = array();                     
            $name = $this->session->userdata('username');
                $column = 'admin_username';
                $value  = $name;
                $table  = 'admin';
                $data_a['adminProfile'] = $this->my_model->get_rows_by_column($column , $value , $table); 
                $id                     = $data_a['adminProfile'][0]['admin_id'];
            $this->load->view('admin/adminProfile', $data_a);
            //`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_lastlogin`
            if($this->input->post('submit')){
              
                $updatedData['admin_username'] = $this->input->post('admin_username');                          
                $updatedData['admin_password'] = $this->input->post('admin_password');                
                $updatedData['admin_email'] = $this->input->post('admin_email');
                $updatedData['admin_phone'] = $this->input->post('admin_phone');                
            if($this->my_model->update('admin_id',$id,$table,$updatedData) == TRUE){
                    ?>
                <div class="alert alert-danger" style="margin:0 auto;" role="alert">data Updated</div>
                <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/main/myProfile" />
                <?php
                }else{
                    ?>
                <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not Updated</div>
                <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/main/myProfile" />
                <?php
                }  
            }
        }	            
        public function deleteMessage()
	{               
            $id = $this->uri->segment(4);
            $idName = 'id';
            $table  = 'messages';
            
            if($this->my_model->delete_one_row_by_id($idName ,$id , $table)== TRUE)
            {    ?>
                            <div class="alert alert-danger" style="margin:0 auto;" role="alert">data deleted</div>
                            <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>/admin/main/messages" />
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not deleted</div>
                            <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>/admin/main/messages" />
                            <?php
                        }   
                      
	}
        
                               
}
