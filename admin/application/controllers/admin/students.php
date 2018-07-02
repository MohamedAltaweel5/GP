<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
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
	
        
        public function addStudents()
	{               
            $data_a     = array();  
            $students   = array();
            $data_a['departments'] = $this->my_model->get_all_data('department' , array() , NULL , 'department_id' , 'DESC',NULL );// for menu
            $data_a['programs'] = $this->my_model->get_all_data('program' , array() , NULL , 'program_id' , 'DESC',NULL );// for menu            
            $data_a['status'] = $this->my_model->get_all_data('status' , array() , NULL , 'status_id' , 'DESC',NULL );// for menu            
            $this->load->view('admin/addStudents', $data_a);
            //`doctor_id`, `doctor_username`, `doctor_password`, `doctor_email`, `doctor_phone`, `doctor_lastlogin`, `department_id`, `rank_id`
            $data             = array();                         
            $config['upload_path'] = 'Uploads/students/';
            $config['allowed_types'] = 'csv';
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
                $data['program_id'] = $this->input->post('program_id');
                $data['status_id'] = 1;
                
                $table = 'student';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('studentsheet')){                    
                    //$data['studentsheet'] = $this->upload->data('file_name'); 
                }else{
                    echo $this->upload->display_errors();
                }
                $handle = fopen("http://localhost/admin/Uploads/students/".$this->upload->data('file_name'), "r");
                while($students = fgetcsv($handle)){
                    $data['student_username'] = $students[0];
                    $data['student_fullname'] = $students[1];
                    $data['student_password'] = $students[2];
                    $data['student_email'] = $students[3];
                    $data['student_phone'] = $students[4];
                    $data['gpa'] = $students[5];
                    if($this->my_model->insertData($table,$data)){
                        echo 'ok';
                        }
                }
                //header("location:http://localhost/admin/admin/students/students");
            }
	}
        public function students() {
            $data = array();             
            $data['students'] = $this->my_model->excuteQuery('SELECT * FROM student INNER JOIN department,program,status WHERE student.department_id = department.department_id AND student.program_id = program.program_id AND student.status_id = status.status_id');
            $this->load->view('admin/students', $data);        
        }
        public function studentProfile()
	{                                   
            $data             = array();             
            $table            = 'student';
            $id               = $this->uri->segment(4);
            $idName           = 'student_id';
            $data['student'] = $this->my_model->excuteQuery('SELECT * FROM student INNER JOIN status, department, program WHERE student.status_id = status.status_id AND student.department_id = department.department_id AND student.program_id = program.program_id AND student.student_id = '.$id.'');
            $data['departments'] = $this->my_model->get_all_data('department' , array() , NULL , 'department_id' , 'DESC',NULL );// for menu
            $data['programs'] = $this->my_model->get_all_data('program' , array() , NULL , 'program_id' , 'DESC',NULL );
            $data['status'] = $this->my_model->get_all_data('status' , array() , NULL , 'status_id' , 'DESC',NULL );
            $this->load->view('admin/studentProfile', $data);
           // echo base_url().'Uploads/'.$data['rWhyUs'][0]['image'];           
            if($this->input->post('submit')){
                //`student_id`, `student_username`, `student_fullname`, `student_password`, `student_email`, `student_phone`, `student_lastlogin`, `status_id`, `department_id`, `program_id`, `date_reg`, `G.P.A`, `thesis`
               // echo "Uploads".$data['rWhyUs'][0]['image'];
                $updatedData['student_username'] = $this->input->post('student_username');                          
                $updatedData['student_fullname'] = $this->input->post('student_fullname');                
                $updatedData['student_password'] = $this->input->post('student_password');
                $updatedData['student_email'] = $this->input->post('student_email');
                $updatedData['student_phone'] = $this->input->post('student_phone');
                $updatedData['status_id'] = $this->input->post('status_id');
                $updatedData['department_id'] = $this->input->post('department_id');
                $updatedData['program_id'] = $this->input->post('program_id');
                                                
                
                        $table = 'student';
                    if($this->my_model->update('student_id',$id,$table,$updatedData) == TRUE){
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/students/studentProfile/<?php echo $id; ?>" />
                    <?php                     
                    }else{
                        ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/students/studentProfile/<?php echo $id; ?>" />
                    <?php
                    }
                }                                                       
	}
        public function addDocuments()
	{               
            $data_a     = array();  
            $student_id               = $this->uri->segment(4);
            $name = $this->session->userdata('username');
            $column = 'admin_username';
            $value  = $name;
            $table  = 'admin';
            $data_a['adminProfile'] = $this->my_model->get_rows_by_column($column , $value , $table);
            $data_a['documents'] = $this->my_model->get_rows_by_column('student_id' , $student_id , 'document');
            $id                     = $data_a['adminProfile'][0]['admin_id'];           
            $this->load->view('admin/addDocument', $data_a);
            //`document_id`, `document_title`, `document_content`, `document_date`, `document_type`, `student_id`, `admin_id`
            $data             = array();                         
            $config['upload_path'] = 'Uploads/document/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']     = '102400';           
            $config['encrypt_name'] = TRUE;
            $config['detect_mime']  = TRUE;
            $config['mod_mime_fix'] = TRUE;
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            if($this->input->post('submit')){
                // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
                // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');                                
                
                $data['document_title'] = $this->input->post('document_title');                
                $data['document_type'] = $this->input->post('document_type');
                $data['student_id'] = $student_id;
                $data['admin_id']   = $id;
                
                $table = 'document';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('document_content')){                    
                    $data['document_content'] = $this->upload->data('file_name'); 
                }else{
                    echo $this->upload->display_errors();
                }
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="7; url=<?php echo base_url(); ?>admin/students/addDocuments/<?php echo $student_id; ?>" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/students/addDocuments/<?php echo $student_id; ?>" />
                    <?php
                }
            }
	}
        public function document()
	{                                   
            $data             = array();                         
            $id               = $this->uri->segment(4);            
            $data['documents'] = $this->my_model->excuteQuery('SELECT * FROM document INNER JOIN student WHERE document.student_id = student.student_id AND document.student_id = '.$id.'');            
            $this->load->view('admin/documents', $data);
           // echo base_url().'Uploads/'.$data['rWhyUs'][0]['image'];           
                                                                   
	}
        public function addAlarm()
	{               
            $data_a     = array();  
            $student_id               = $this->uri->segment(4);
            $name = $this->session->userdata('username');
            $column = 'admin_username';
            $value  = $name;
            $table  = 'admin';
            $data_a['adminProfile'] = $this->my_model->get_rows_by_column($column , $value , $table);
            $data_a['documents'] = $this->my_model->get_rows_by_column('student_id' , $student_id , 'document');
            $id                     = $data_a['adminProfile'][0]['admin_id'];           
            $this->load->view('admin/addAlarm', $data_a);
            //`alarm_id`, `alarm_content`, `alarm_date`, `student_id`, `admin_id`
            $data             = array();                         
            $config['upload_path'] = 'Uploads/document/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']     = '102400';           
            $config['encrypt_name'] = TRUE;
            $config['detect_mime']  = TRUE;
            $config['mod_mime_fix'] = TRUE;
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            if($this->input->post('submit')){
                // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
                // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');                                
                
                
                $data['student_id'] = $student_id;
                $data['admin_id']   = $id;
                
                $table = 'alarm';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('alarm_content')){                    
                    $data['alarm_content'] = $this->upload->data('file_name'); 
                }else{
                    echo $this->upload->display_errors();
                }
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="7; url=<?php echo base_url(); ?>admin/students/addDocuments/<?php echo $student_id; ?>" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/students/addDocuments/<?php echo $student_id; ?>" />
                    <?php
                }
            }
	}
        public function addReport()
	{               
            $data_a     = array();  
            $student_id               = $this->uri->segment(4);
            $name = $this->session->userdata('username');
            $column = 'admin_username';
            $value  = $name;
            $table  = 'admin';
            $data_a['adminProfile'] = $this->my_model->get_rows_by_column($column , $value , $table);
            $data_a['documents'] = $this->my_model->get_rows_by_column('student_id' , $student_id , 'document');
            $id                     = $data_a['adminProfile'][0]['admin_id'];           
            $this->load->view('admin/addReport', $data_a);
            //`document_id`, `document_title`, `document_content`, `document_date`, `document_type`, `student_id`, `admin_id`
            $data = array();
            if($this->input->post('submit')){
                // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
                // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');                                                
                $data['report_title'] = $this->input->post('report_title');                                
                $data['student_id'] = $student_id;                                
                $table = 'report';               
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="7; url=<?php echo base_url(); ?>admin/students/addReport/<?php echo $student_id; ?>" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/students/addReport/<?php echo $student_id; ?>" />
                    <?php
                }
            }
	}
        public function Report()
	{                                   
            $data             = array();                         
            $id               = $this->uri->segment(4);            
            $data['reports'] = $this->my_model->excuteQuery('SELECT * FROM report INNER JOIN student WHERE report.student_id = student.student_id AND report.student_id = '.$id.'');            
            $this->load->view('admin/reports', $data);
           // echo base_url().'Uploads/'.$data['rWhyUs'][0]['image'];           
                                                                   
	}                       
        public function addDoctorReport()
	{               
            $data_a     = array();  
            $report_id               = $this->uri->segment(4);
            $data_a['doctors'] = $this->my_model->excuteQuery('SELECT * FROM doctor INNER JOIN department WHERE doctor.department_id = department.department_id');          
            $this->load->view('admin/addDoctorReport', $data_a);
            //`document_id`, `document_title`, `document_content`, `document_date`, `document_type`, `student_id`, `admin_id`
            $data = array();
            if($this->input->post('submit')){
                // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
                // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');                                                
                $data['doctor_id'] = $this->input->post('doctor_id');                                
                $data['report_id'] = $report_id;                                
                $table = 'doctorreport';               
                if($this->my_model->insertData($table,$data) == TRUE){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="7; url=<?php echo base_url(); ?>admin/students/students" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/students/students" />
                    <?php
                }
            }
	}
}
