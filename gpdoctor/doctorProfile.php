<!DOCTYPE html>
<html>
<head>
  <title>Post Graduate System</title>
  <?php
  session_start();
  require('authorize.php');
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title>Doctor's Profile</title> -->
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
            <!-- <ul class="nav nav-tabs">              
              <li class="active"><a href="#settings" data-toggle="tab">Doctor Profile</a></li>
            </ul> -->
            <?php
            
             $doc_username = $_SESSION['user'];
             $con = new mysqli("localhost","root","","pgs");
             $qu = $con->prepare("select * from doctor where doctor_username =$doc_username ");
             $qu->execute();
             $res = $qu->get_result();
             $rw = $res->fetch_assoc();
             // var_dump($rw);
             ?>

            
            <div class="tab-content">
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="settings">
                <form action="doctorProfile.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input name="username" type="email" class="form-control" id="inputName" placeholder="Username" disabled="" value="<?php echo $rw['doctor_username'] ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input name="fullname" type="text" class="form-control" id="inputName" placeholder="Full Name" disabled="" value="<?php echo $rw['doctor_fullname'] ?>">
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input name="email" type="email" class="form-control" id="inputName" placeholder="Email" value="<?php echo $rw['doctor_email'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input name="phone" type="text" class="form-control" id="inputName" placeholder="phone" value="<?php echo $rw['doctor_phone'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label" >Password</label>

                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="inputName" placeholder="password" value="" >
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="exampleInputFile" class="col-sm-2 control-label">Edit Picture</label>
                        <input type="file" name="file" id="exampleInputFile">
                        <img src="<?php echo $rw['doctor_image'] ?>" style="position:relative; left:111%; bottom:280px;">
                        
                    </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="edit" value="edit" type="submit" class="btn btn-danger">save</button>
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


        $connect = new mysqli("localhost","root","","pgs");
 // $qu = $connect->prepare("select doctor_id from doctor where doctor_username='$username'");
 // $qu->execute();
 // $res = $qu->get_result();
 // $rr=$res->fetch_assoc();
 

 // if($res){

         $email_updated=0;
         if(!empty($email)){
          
         $q =$connect->prepare("update doctor set doctor_email='$email' where doctor_username=$doc_username");
         if($q->execute()){
         $email_updated=1;
          }

         }
         
         $phone_updated=0;
         if(!empty($phone)){
         
         $q2 =$connect->prepare("update doctor set doctor_phone='$phone' where doctor_username=$doc_username");
         if($q2->execute()){
         $phone_updated=1;
          }

         }

         $password_updated=0;
        if(!empty($password)){
         
         $q1 = $connect->prepare("update doctor set doctor_password='$password' where doctor_username=$doc_username");
         if($q1->execute()){
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
            // if (file_exists($output_dir. $_FILES["file"]["name"]))
            //   {
            //   unlink($output_dir. $_FILES["file"]["name"]);
            //   } 
            //   else
            //   {
              $pic=$_FILES["file"]["name"];
              $conv=explode(".",$pic);
              $ext=$conv['1'];  
                
              //move the uploaded file to uploads folder;
                  move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir.$doc_username.".".$ext);
              
              $pics=$output_dir.$doc_username.".".$ext;
            
                
              $url=$doc_username.".".$ext;
              
              
              $q3=$connect->prepare("update doctor set doctor_image='$pics' where doctor_username='$doc_username'");
              
              if($q3->execute()){
              $image_updated=1;
              }
              
              // if($q3->execute()){
              //  echo '<div data-alert class="alert-box success radius">';
              //     echo  '<b>Success !</b>  Image Updated' ;
              //     // echo  '<a href="#" class="close">&times;</a>';
              //   echo '</div>';
              //  // header('refresh:3;url=dashboard.php'); 
              // }
              // else{
              //   echo '<div data-alert class="alert-box alert radius">';
              //     echo  '<b>Error !</b> ' .$connect->connect_errno ;
              //     // echo  '<a href="#" class="close">&times;</a>';
              //   echo '</div>';
              // }
              
              
              
              // }
              
          } 
          // else{
          
          //     echo '<div data-alert class="alert-box warning radius">';
          //     echo  '<b>Warning !</b>  File not Uploaded, Check image' ;
          //     // echo  '<a href="#" class="close">&times;</a>';
          //     echo '</div>';
     
          // }

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
      <!-- <b>Version</b> 2.4.0 -->
    </div>
    <strong>Copyright &copy; 2017-2018 <!-- <a href="https://adminlte.io">Almsaeed Studio</a> -->.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      
      <!-- /.tab-pane -->
    </div>
  </aside>
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
