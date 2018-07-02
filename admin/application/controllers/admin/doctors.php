<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {
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
        public function addDoctor()
	{               
            $data_a     = array();  
            $data_a['departments'] = $this->my_model->get_all_data('department' , array() , NULL , 'department_id' , 'DESC',NULL );// for menu
            $data_a['ranks'] = $this->my_model->get_all_data('rank' , array() , NULL , 'rank_id' , 'DESC',NULL );// for menu            
            $this->load->view('admin/addDoctors', $data_a);
            //`doctor_id`, `doctor_username`, `doctor_password`, `doctor_email`, `doctor_phone`, `doctor_lastlogin`, `department_id`, `rank_id`
            $data             = array();                         
            $config['upload_path'] = 'Uploads/doctors/';
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
                
                $data['doctor_username'] = $this->input->post('doctor_username');
                $data['doctor_password'] = $this->input->post('doctor_password');
                $data['doctor_email'] = $this->input->post('doctor_email');
                $data['doctor_phone'] = $this->input->post('doctor_phone');
                $data['department_id'] = $this->input->post('department_id');
                $data['rank_id'] = $this->input->post('rank_id');
                $table = 'doctor';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('doctor_image')){                    
                    $data['doctor_image'] = $this->upload->data('file_name'); 
                }else{
                    echo $this->upload->display_errors();
                }
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/doctors" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/addDoctor" />
                    <?php
                }
            }
	}
        public function doctors() {
            $data = array();             
            $data['doctors'] = $this->my_model->excuteQuery('SELECT * FROM doctor INNER JOIN department WHERE doctor.department_id = department.department_id');
            $this->load->view('admin/doctors', $data);        
        }
        public function doctorProfile()
	{                                   
            $data             = array();             
            $table            = 'doctor';
            $id               = $this->uri->segment(4);
            $idName           = 'doctor_id';
            $data['doctor'] = $this->my_model->excuteQuery('SELECT * FROM doctor INNER JOIN department, rank WHERE doctor.department_id = department.department_id AND doctor.rank_id = rank.rank_id AND doctor.doctor_id = '.$id.'');
            $data['departments'] = $this->my_model->get_all_data('department' , array() , NULL , 'department_id' , 'DESC',NULL );// for menu
            $data['ranks'] = $this->my_model->get_all_data('rank' , array() , NULL , 'rank_id' , 'DESC',NULL );
            $this->load->view('admin/doctorProfile', $data);
           // echo base_url().'Uploads/'.$data['rWhyUs'][0]['image']; 
            $config['upload_path'] = 'Uploads/doctors/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '5120';           
            $config['encrypt_name'] = TRUE;
            $config['detect_mime']  = TRUE;
            $config['mod_mime_fix'] = TRUE;
            if($this->input->post('submit')){
                //`doctor_username`, `doctor_password`, `doctor_email`, `doctor_phone`, `doctor_lastlogin`, `department_id`, `rank_id`, `doctor_image`
               // echo "Uploads".$data['rWhyUs'][0]['image'];
                $updatedData['doctor_username'] = $this->input->post('doctor_username');                          
                $updatedData['doctor_password'] = $this->input->post('doctor_password');                
                $updatedData['doctor_email'] = $this->input->post('doctor_email');
                $updatedData['doctor_phone'] = $this->input->post('doctor_phone');
                $updatedData['department_id'] = $this->input->post('department_id');
                $updatedData['rank_id'] = $this->input->post('rank_id');
                
                
                $this->load->library('upload',$config);
                if(empty($_FILES['doctor_image']['name'])){
                    $updatedData['doctor_image'] = $data['doctor'][0]['doctor_image']; 
                    $table = 'doctor';
                    if($this->my_model->update('doctor_id',$id,$table,$updatedData) == TRUE){
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/doctorProfile/<?php echo $id; ?>" />
                    <?php
                    }else{
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/doctorProfile/<?php echo $id; ?>" />
                    <?php
                    }
                }else{
                    $file = 'Uploads/doctors/'.$data['doctor'][0]['doctor_image'];                                
                    unlink($file);
                    if ($this->upload->do_upload('doctor_image')){                    
                            $updatedData['doctor_image'] = $this->upload->data('file_name'); 
                    }else{
                        echo $this->upload->display_errors();
                    }
                        $table = 'doctor';
                    if($this->my_model->update('doctor_id',$id,$table,$updatedData) == TRUE){
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/doctorProfile/<?php echo $id; ?>" />
                    <?php                     
                    }else{
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/doctorProfile/<?php echo $id; ?>" />
                    <?php
                    }
                }                                
            }           
	}
        public function addDoctorStudents()
	{               
            $data_a     = array();
            $id               = $this->uri->segment(4);
            $data_a['doctors'] = $this->my_model->get_all_data('doctor' , array() , NULL , 'doctor_id' , 'DESC',NULL );// for menu            
            $data_a['doctorStudents'] = $this->my_model->excuteQuery('SELECT * FROM doctorstudent INNER JOIN doctor , student WHERE doctorstudent.doctor_id = doctor.doctor_id AND doctorstudent.student_id = student.student_id AND doctorstudent.student_id = '.$id.'');
            $this->load->view('admin/addDoctorStudents', $data_a);
            //`doctor_id`, `doctor_username`, `doctor_password`, `doctor_email`, `doctor_phone`, `doctor_lastlogin`, `department_id`, `rank_id`
            $data             = array();                                     
            if($this->input->post('submit')){
                // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
                // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');                                                
                $data['doctor_id'] = $this->input->post('doctor_id');
                $data['student_id'] = $id;
                $table = 'doctorstudent';                                
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/addDoctorStudents/<?php echo $id ?>" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/doctors/addDoctorStudents/<?php echo $id ?>" />
                    <?php
                }
            }
	}
                               
}
