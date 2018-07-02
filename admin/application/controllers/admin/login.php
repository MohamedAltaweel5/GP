<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('my_model');            
            $this->load->library('form_validation');
            $this->load->library('pagination');
            $this->load->library('session');
        }                
	public function index()
	{               
            $data     = array(); 
           // $data['departments'] = $this->my_model->get_all_data('departments' , array() , NULL , 'id' , 'DESC',NULL );
        //    $data['news'] = $this->my_model->get_all_data('news' , array() , 5 , 'id' , 'DESC',NULL );
            //$data['articles'] = $this->my_model->get_all_data('articles' , array() , 4 , 'id' , 'DESC',NULL );
            //['articlesImg'] = $this->my_model->get_all_data('articles' , array() , 6 , 'id' , 'DESC',NULL );
           // $data['outPatientClinic'] = $this->my_model->get_all_data('specialize' , array(), NULL , 'id' ,'DESC',NULL);
           // $data['statistics'] = $this->my_model->get_one_row_by_id( 1 , 'statistics' );
           // $id               = $this->uri->segment(1);
           /* if($id != NULL){
                $column = 'specializeId';
                $value  = $id;
                $table  = 'doctors';
                $data['doctors'] = $this->my_model->get_rows_by_column($column , $value , $table);                                
                }*/
            $this->load->view('admin/login',$data);
            if($this->input->post('submit')){                                
                //Validating Name Field
                
                    //                    $this->load->view('site/complaints', $data_a);
                    
                    $data_a['username']    = $this->input->post('username');
                    $data_a['password']    = $this->input->post('password');                    
                    if($data_a['username'] == 'ahmed' && $data_a['password']== '1234567' ){
                        $userData = array('username'=>$data_a['username']);
                        $this->session->set_userdata($userData);
                        header('Location: http://localhost/admin/admin/main/myProfile');
                    }
                   
                //echo 'ok';
            // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
            // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');
                
                //echo $data['subject'];                                                                                
            
        }}
        public function logout(){
            $data = array();
            session_destroy();
            header('Location: http://localhost/admin/admin/login/index');
           // $this->load->view('admin/login',$data);
            
        }
        
                       
}
