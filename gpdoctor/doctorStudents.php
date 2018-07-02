<!DOCTYPE html>
<html>
<head>
  <title>Post Graduate System</title>
  <?php
 
  session_start();
  require('authorize.php');
  ?>
  <!-- <title>My Students</title> -->
  <!-- Tell the browser to be responsive to screen width -->
  <?php include 'includes/head.php'; ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <?php include 'includes/header.php'; ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include 'includes/sidebar.php'; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Students
        <!-- <small>table</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Doctor Students</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Doctor Students</h3> -->
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>name</th>                                                      
                  <th>department</th>
                  <td>progrem</td>
                  <th>SuperVisor</th>
                  
                </tr>
                </thead>

                <tbody>
                <?php

                $doc_username =$_SESSION['user'];
                $connect = new mysqli("localhost","root","","pgs");
                $q=$connect->prepare("select * from doctor where doctor_username = $doc_username");
                $q->execute();
                $result =$q->get_result();
                $rr=$result->fetch_assoc();
                $doctor_id = $rr['doctor_id'];
                $qu = $connect->prepare("select * from doctorstudent where doctor_id = $doctor_id");
                $qu->execute();
                $res = $qu->get_result();
                while ($rw = $res->fetch_assoc()){
                $temp = $rw["student_id"];
                $con = new mysqli("localhost","root","","pgs");
                $st = $con->prepare("select * from student where student_id = $temp");
                $st->execute();

                $result = $st->get_result();
                while($row = $result->fetch_assoc()){

                ?>
                
                <tr> 
                   
                    <td><?php echo $row["student_fullname"] ?></td> 
                    <?php 
                    $dep_id = $row["department_id"]; 
                     $con2 = new mysqli("localhost","root","","pgs");
                     $st2 = $con2->prepare("select * from department where department_id = $dep_id");
                     $st2->execute();
                     $result2 = $st2->get_result();
                     $row2 = $result2->fetch_assoc();

                    ?>                      
                    <td><?php echo $row2["department_name"] ?></td>
                    <?php 
                    $pro_id = $row["program_id"]; 
                     $con3 = new mysqli("localhost","root","","pgs");
                     $st3 = $con3->prepare("select * from program where program_id = $pro_id");
                     $st3->execute();
                     $result3 = $st3->get_result();
                     $row3 = $result3->fetch_assoc();

                    ?>     
                    <td><?php echo $row3["program_name"] ?></td>
                    <?php
                    $st_id = $row["student_id"];
                    $con4 = new mysqli("localhost","root","","pgs");
                    $st4 = $con4->prepare("select * from doctorstudent where student_id = $st_id");
                    $st4->execute();
                    $result4 = $st4->get_result();
                    $row4 = $result4->fetch_assoc();
                    $doc_id = $row4["doctor_id"];
                    $con5 =  new mysqli("localhost","root","","pgs");
                    $st5 = $con5->prepare("select * from doctor where doctor_id = $doc_id");
                    $st5->execute();
                    $result5 = $st5->get_result();
                    $row5 = $result5->fetch_assoc();
                    ?>
                    <td><?php echo $row5["doctor_fullname"] ?></td>
                    
                </tr>  
               <?php } } ?>
                </tbody>

               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'includes/footer.php'; ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php include 'includes/jsTablesData.php'; ?>
</body>
</html>





