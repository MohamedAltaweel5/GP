<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('my_model');            
            $this->load->library('form_validation');
            $this->load->library('pagination');
            if($this->input->post('sendMessage')){
                //`patientName`, `age`, `phone`, `district_id`, `date`
                //echo 'ok';
             //   $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
            // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');
                $data['name'] = $this->input->post('name');                
                $data['email'] = $this->input->post('email');     
                $data['subject'] = $this->input->post('subject');                
                $data['message'] = $this->input->post('message'); 
                
                $table = 'messages';
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">Message sent</div>                    
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">Message not sent</div>                    
                    <?php
                }
            }
        }                
	public function managementTeam()
	{               
            $data_a     = array(); 
            $data_a['introManagement'] = $this->my_model->get_all_data('intromanagement', array() , NULL , 'id' , 'DESC',NULL );                                    
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['teamMembers'] = $this->my_model->get_all_data('team', array() , NULL , 'id' , 'DESC',NULL );
            $this->load->view('site_ar/our-team', $data_a);                        
	}       
        public function teamMember()
	{               
            $data_a     = array(); 
            $id               = $this->uri->segment(4);
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['team'] = $this->my_model->get_one_row_by_id('id',$id , 'team');            
            $this->load->view('site_ar/teamMember', $data_a);                        
	}
        
                                               
}
