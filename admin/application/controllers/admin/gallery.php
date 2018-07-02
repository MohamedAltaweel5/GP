<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('my_model');            
            $this->load->library('form_validation');
            $this->load->library('pagination');
            if($this->session->userdata('username') == FALSE){
                header('Location: http://localhost/ibnsina/admin/login/index');                                                
            }
        }                	                     
        public function addPhoto()
	{               
            $data_a     = array();  
            $data_a['gallerydepartments'] = $this->my_model->get_all_data('gallerydepartments' , array() , NULL , 'department_id' , 'DESC',NULL );// for menu            
            $this->load->view('admin/addPhoto', $data_a);
            //``project_id`, `cat_id`, `project_name`, `project_content`, `image`
            $data             = array();                         
            $config['upload_path'] = 'Uploads/gallery/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '102400';           
            $config['encrypt_name'] = TRUE;
            $config['detect_mime']  = TRUE;
            $config['mod_mime_fix'] = TRUE;
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            if($this->input->post('submit')){
                // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
                // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');                                
                
                $data['department_id'] = $this->input->post('department_id');  
                $data['status'] = $this->input->post('status');  
                $table = 'gallery';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('image')){                    
                    $data['image'] = $this->upload->data('file_name'); 
                }else{
                    echo $this->upload->display_errors();
                }
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/gallery/photos" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/gallery/addPhoto" />
                    <?php
                }
            }
	}
        public function photos() {
            $data = array();             
            $data['photos'] = $this->my_model->excuteQuery('SELECT * FROM `gallery` INNER JOIN gallerydepartments  WHERE gallery.department_id = gallerydepartments.department_id ');// for menu            
            $this->load->view('admin/photos', $data);        
        }
        public function editPhoto()
	{                                   
            $data             = array();             
            $table            = 'gallery';
            $id               = $this->uri->segment(4);
            $idName           = 'id';
            $data['rPhoto'] = $this->my_model->get_one_row_by_id($idName,$id , $table);  
            $data['gallerydepartments'] = $this->my_model->get_all_data('gallerydepartments' , array() , NULL , 'department_id' , 'DESC',NULL );// for menu            
            //print_r($data['rCountries']);
            //``project_id`, `cat_id`, `project_name`, `project_content`, `image`
            $this->load->view('admin/editPhoto', $data);
           // echo base_url().'Uploads/'.$data['rWhyUs'][0]['image']; 
            $config['upload_path'] = 'Uploads/gallery/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '10240';           
            $config['encrypt_name'] = TRUE;
            $config['detect_mime']  = TRUE;
            $config['mod_mime_fix'] = TRUE;
            if($this->input->post('submit')){
                //unlink("Uploads/".$data['rWhyUs'][0]['image']);
               // echo "Uploads".$data['rWhyUs'][0]['image'];                
                $updatedData['department_id'] = $this->input->post('department_id');    
                $updatedData['status'] = $this->input->post('status'); 
                $this->load->library('upload',$config);
                if(empty($_FILES['image']['name'])){
                    $updatedData['image'] = $data['rPhoto'][0]['image']; 
                    $table = 'gallery';
                    if($this->my_model->update('id',$id,$table,$updatedData) == TRUE){
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/gallery/photos" />
                    <?php
                    }else{
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/gallery/editPhoto/<?php $id ?>" />
                    <?php
                    }
                }else{
                    $file = 'Uploads/gallery/'.$data['rPhoto'][0]['image'];                                
                    unlink($file);
                    if ($this->upload->do_upload('image')){                    
                            $updatedData['image'] = $this->upload->data('file_name'); 
                    }else{
                        echo $this->upload->display_errors();
                    }
                        $table = 'gallery';
                    if($this->my_model->update('id',$id,$table,$updatedData) == TRUE){
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/gallery/photos" />
                    <?php                     
                    }else{
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/gallery/editPhoto/<?php $id ?>" />
                    <?php
                    }
                }
                
                
            }           
	}
        public function deletePhoto()
	{               
            $id = $this->uri->segment(4);
            $idName = 'id';
            $table  = 'gallery';
            $row['photo']    = $this->my_model->get_one_row_by_id($idName,$id , $table);
            unlink('Uploads/gallery/'.$row['photo'][0]['image']);
            if($this->my_model->delete_one_row_by_id($idName ,$id , $table)== TRUE)
            {    ?>
                            <div class="alert alert-danger" style="margin:0 auto;" role="alert">data deleted</div>
                            <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/gallery/photos" />
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not deleted</div>
                            <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>/admin/gallery/photos" />
                            <?php
                        }   
                      
	}
       
                              
}
