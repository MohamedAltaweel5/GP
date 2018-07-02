<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
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
	public function addCourses()
	{               
            $data     = array(); 
            $data['departments'] = $this->my_model->get_all_data('department' , array() , NULL , 'department_id' , 'DESC',NULL );
            $data['programs'] = $this->my_model->get_all_data('program' , array() , NULL , 'program_id' , 'DESC',NULL );
            //$data['articles'] = $this->my_model->get_all_data('articles' , array() , 4 , 'id' , 'DESC',NULL );
            //['articlesImg'] = $this->my_model->get_all_data('articles' , array() , 6 , 'id' , 'DESC',NULL );
           // $data['outPatientClinic'] = $this->my_model->get_all_data('specialize' , array(), NULL , 'id' ,'DESC',NULL);
            
           // $id               = $this->uri->segment(1);
           /* if($id != NULL){
                $column = 'specializeId';
                $value  = $id;
                $table  = 'doctors';
                $data['doctors'] = $this->my_model->get_rows_by_column($column , $value , $table);                                
                }*/
            $this->load->view('admin/addCourses',$data);
            if($this->input->post('submit')){                                
                
                    
                    $data_a['department_id']    = $this->input->post('department_id');
                    $data_a['program_id']    = $this->input->post('program_id');   
                    $data_a['course_name']    = $this->input->post('course_name');
                    $data_a['course_code']    = $this->input->post('course_code');
                    $data_a['course_hours']    = $this->input->post('course_hours');
                    $data_a['course_day']    = $this->input->post('course_day');
                    $data_a['course_time']    = $this->input->post('course_time');
                    $data_a['course_place']    = $this->input->post('course_place');
                    $data_a['admin_id']    = 1;
                    $table = 'course';
                    if($this->my_model->insertData($table,$data_a) == TRUE){
                        ?>
                            <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                            <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/courses/courses" />
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                            <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/courses/addCourses" />
                            <?php
                        }

                //echo 'ok';
            // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
            // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');
                
                //echo $data['subject'];                                                                                
            
	} 
        }
        public function addSemesterCourse()
	{               
            $data_a             = array();
            $data_a['semesterCourses'] = $this->my_model->excuteQuery('SELECT * FROM semesterdetails INNER JOIN course,doctorcourse,doctor WHERE semesterdetails.course_id = course.course_id AND semesterdetails.course_id = doctorcourse.course_id AND doctorcourse.doctor_id = doctor.doctor_id');
            $data_a['courses'] = $this->my_model->get_all_data('course' , array() , NULL , 'department_id' , 'DESC',NULL );
            $data_a['doctors'] = $this->my_model->get_all_data('doctor' , array() , NULL , 'doctor_id' , 'DESC',NULL );
            $this->load->view('admin/addSemesterCourses', $data_a);
            //`intro`, `intro_ar`, `name`, `name_ar`, `brief_desc`, `brief_desc_ar`, `description`, `desc_ar`, `image`                                                 
            if($this->input->post('submit')){
                // $this->form_validation->set_rules('subject','الموضوع','required|min_length[20]|max_length[200]');
                // $this->form_validation->set_rules('text','المقال','required|min_length[20]|max_length[200]');                                
                //`name`, `brief_content`, `content`, `name_ar`, `brief_content_ar`, `content_ar`, `image`
                $data['semester_year'] = $this->input->post('semester_year');
                $data['course_id'] = $this->input->post('course_id');
                $data_b['doctor_id'] = $this->input->post('doctor_id');
                $data_b['course_id'] = $this->input->post('course_id');
                $table = 'semesterdetails';                
                if(($this->my_model->insertData($table , $data) == TRUE) AND ($this->my_model->insertData('doctorcourse' , $data_b) == TRUE)){
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/courses/courses" />
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" style="margin:0 auto;" role="alert">data not added</div>
                    <meta http-equiv="refresh" content="3; url=<?php echo base_url(); ?>admin/courses/addSemesterCourse" />
                    <?php
                }
            }
	}
        public function courses() {
            $data = array();             
            $data['courses'] = $this->my_model->excuteQuery('SELECT * FROM course INNER JOIN department, program WHERE course.department_id = department.department_id AND course.program_id = program.program_id');
            $this->load->view('admin/courses', $data);        
        }
        public function addGrades()
	{               
            $data_a     = array();  
            $students   = array();
            $data_a['courses'] = $this->my_model->get_all_data('course' , array() , NULL , 'course_id' , 'DESC',NULL );// for menu           
            $this->load->view('admin/addGrades', $data_a);
            //`doctor_id`, `doctor_username`, `doctor_password`, `doctor_email`, `doctor_phone`, `doctor_lastlogin`, `department_id`, `rank_id`
            $data             = array();                         
            $config['upload_path'] = 'Uploads/grades/';
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
                
                $data['course_id'] = $this->input->post('course_id');                                                
                $table = 'grade';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('gradesheet')){                    
                    //$data['studentsheet'] = $this->upload->data('file_name'); 
                }else{
                    echo $this->upload->display_errors();
                }
                $handle = fopen("http://localhost/admin/Uploads/grades/".$this->upload->data('file_name'), "r");
                while($students = fgetcsv($handle)){
                     $data['student_id'] = $students[0];
                    $data['grade_value'] = $students[1];
                    $data['grade_mark'] = $students[2];
                   
                    
                    if($this->my_model->insertData($table,$data)){
                        echo 'ok';
                        }
                }
                
                //header("location:http://localhost/admin/admin/students/students");
            }
	}
        
                               
}
