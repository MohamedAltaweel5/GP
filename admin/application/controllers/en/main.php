<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
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
	public function index()
	{               
            $data_a     = array(); 
            $data_a['introManagement'] = $this->my_model->get_all_data('intromanagement', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['services'] = $this->my_model->get_all_data('services', array() , 3 , 'id' , 'ASC',NULL );
            $data_a['teamMembers'] = $this->my_model->get_all_data('team', array() , 3 , 'id' , 'ASC',NULL );
            $data_a['advantages'] = $this->my_model->get_all_data('advantages', array() , 1 , 'id' , 'DESC',NULL );
            $data_a['banners'] = $this->my_model->get_all_data('banners', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );
            $this->load->view('site_ar/index', $data_a);                        
	}
        public function services()
	{               
            $data_a     = array(); 
            $data_a['introServices'] = $this->my_model->get_all_data('introservices', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['services'] = $this->my_model->get_all_data('services', array() , NULL , 'id' , 'ASC',NULL );            
            $this->load->view('site_ar/service', $data_a);                        
	}
        public function singleService()
	{               
            $data_a     = array(); 
            $id               = $this->uri->segment(4);
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['services'] = $this->my_model->get_one_row_by_id('id',$id , 'services');            
            $this->load->view('site_ar/singleService', $data_a);                        
	}
        public function whyUs()
	{               
            $data_a     = array();             
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );            
            $this->load->view('site_ar/whyUs', $data_a);                        
	}
        public function advantages()
	{               
            $data_a     = array();             
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL ); 
            $data_a['advantages'] = $this->my_model->get_all_data('advantages', array() , NULL , 'id' , 'DESC',NULL );
            $this->load->view('site_ar/advantages', $data_a);                        
	}
        public function contactUs()
	{               
            $data_a     = array();             
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );             
            $this->load->view('site_ar/contact', $data_a);                        
	}   
        public function visionAndMission()
	{               
            $data_a     = array();             
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['vision'] = $this->my_model->get_all_data('vision', array() , NULL , 'id' , 'DESC',NULL );
            $this->load->view('site_ar/vision', $data_a);                        
	}
        public function aboutUs()
	{               
            $data_a     = array();             
            $data_a['whyUs'] = $this->my_model->get_all_data('whyus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['contactUs'] = $this->my_model->get_all_data('contactus', array() , NULL , 'id' , 'DESC',NULL );
            $data_a['about'] = $this->my_model->get_all_data('aboutus', array() , NULL , 'id' , 'DESC',NULL );
            $this->load->view('site_ar/about-us', $data_a);                        
	}
}
