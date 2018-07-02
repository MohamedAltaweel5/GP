<!DOCTYPE html>
<html>
<head>
  <title>Post Graduate System</title>
   <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student's Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php include 'includes/head.php'; ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Profile</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content" style="background:white;">

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-9" style="width:60%">
          <div class="nav-tabs-custom">
            <?php
            include 'Database.php';
            $con =new Database();
             $student_username = $_SESSION['user'];
            
             $qu =("SELECT  student.student_username,student.student_fullname,student.student_email,student.student_phone,department.department_name,status.status_name,student.date_reg,student.student_password, student.student_image FROM student,department,status WHERE department.department_id=student.department_id AND status.status_id=student.status_id AND student_username=$student_username");
             $data=mysqli_query($con->conn,$qu);
             $rw=mysqli_fetch_assoc($data);
             // var_dump($rw);
             ?>
            <ul class="nav nav-tabs">              
              <li class="active"><a href="#settings" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Username" disabled="" value="<?php echo $rw['student_username'] ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Full Name" disabled="" value="<?php echo $rw['student_fullname'] ?>">
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputName" name ="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Email"
                       value="<?php echo $rw['student_email'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" name ="phone" class="form-control" id="inputName" placeholder="phone" 
                      value="<?php echo $rw['student_phone'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Department</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" disabled="" 
                      value="<?php echo $rw['department_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" disabled="" 
                      value="<?php echo $rw['status_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Date of Registration</label>

                    <div class="col-sm-10">
                      <input type="Date" class="form-control" id="inputName" disabled="" 
                      value="<?php echo $rw['date_reg'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label" >Password</label>

                    <div class="col-sm-10">
                        <input name="password" type="text" class="form-control" id="inputName" placeholder="password" value="<?php echo $rw['student_password'] ?>" >
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="exampleInputFile" class="col-sm-2 control-label">Edit Picture</label>
                        <input name="file" type="file" id="exampleInputFile">
                        <img src="<?php echo $rw['student_image'] ?>" style="position:relative; left:111%; bottom:450px;">
                        
                    </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="edit" class="btn btn-danger">save</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
     <?php

         if(isset($_POST['edit'])){
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $password = $_POST['password'];
         // $username = $_POST['username'];


        
 // $qu = $connect->prepare("select doctor_id from doctor where doctor_username='$username'");
 // $qu->execute();
 // $res = $qu->get_result();
 // $rr=$res->fetch_assoc();
 

 // if($res){

         $email_updated=0;
         if(!empty($email)){
          
         $q ="UPDATE student SET student_email='$email' WHERE student_username=$student_username";
         if(mysqli_query($con->conn,$q)){

            
          $email_updated=1;
          }

         }
         
         $phone_updated=0;  
         if(!empty($phone)){
         
         $q2 =("UPDATE student SET student_phone='$phone' WHERE student_username=$student_username");
         if(mysqli_query($con->conn,$q2)){
         $phone_updated=1;
          }

         }

         $password_updated=0;
        if(!empty($password)){
         
         $q1 = ("UPDATE student SET student_password='$password' WHERE student_username=$student_username");
         if(mysqli_query($con->conn,$q1)){
         $password_updated=1;
          }
        }
         // echo 'Data Saved Successfully';
         if(isset($_FILES["file"]["name"])){
         $image_updated=0;
         $output_dir = "dist/img/";
         $allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
         $extension = @end(explode(".", $_FILES["file"]["name"]));

         
         if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/JPG")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/pjpeg"))
            && ($_FILES["file"]["size"] < 504800)
            && in_array($extension, $allowedExts)) 
          {
              if ($_FILES["file"]["error"] > 0)
              {
              echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
              }
           
              $pic=$_FILES["file"]["name"];
              $conv=explode(".",$pic);
              $ext=$conv['1'];  
                
              //move the uploaded file to uploads folder;
                  move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir.$student_username.".".$ext);
              
              $pics=$output_dir.$student_username.".".$ext;
            
                
              $url=$student_username.".".$ext;
              
              
              $q3=("UPDATE student SET student_image='$pics' WHERE student_username=$student_username");
              
              if(mysqli_query($con->conn,$q3)){
              $image_updated=1;
              }
              
              
              
          } 
          

        }

          if($email_updated==1 || $phone_updated==1 || $password_updated==1 || $image_updated==1){
               echo '<div data-alert class="alert-box success radius">';
               echo  '<b>Success !</b> Profile updated successfully';
               echo  '<a href="#" class="close">&times;</a>';
               echo '</div>';
               // header('refresh:2;url=profile.php');
              }
              else{
                echo '<div data-alert class="alert-box warning radius">';
                echo  '<b>Error !</b> No input given';
                echo  '<a href="#" class="close">&times;</a>';
                echo '</div>';
              }
          


        }
        
?>

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2018.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
