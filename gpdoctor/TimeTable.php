<!DOCTYPE html>
<html>
<head>
  <title>Post Graduate System</title>
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  <!-- <title>My TimeTable</title> -->
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
         Timetable
        <!-- <small>table</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Courses TimeTable</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Courses TimeTable</h3> -->
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Subject</th>                                                      
                  <th>day</th>
                  <td>Time</td>                  
                  
                </tr>
                </thead>
                <?php 
                $doc_username = $_SESSION['user'];
                $connect = new mysqli("localhost","root","","pgs");
                $q=$connect->prepare("select * from doctor where doctor_username = $doc_username");
                $q->execute();
                $result =$q->get_result();
                $rr=$result->fetch_assoc();
                $doctor_id = $rr['doctor_id'];
                $qu = $connect->prepare("select * from doctorcourse where doctor_id = $doctor_id ");
                $qu->execute();
                $res = $qu->get_result();
                while ($rw = $res->fetch_assoc()){
                $temp = $rw["course_id"];
                $con = new mysqli("localhost","root","","pgs");
                $st = $con->prepare("select * from course where course_id = $temp");
                $st->execute();

                $result = $st->get_result();
                while($row = $result->fetch_assoc()){


                ?>
           

                <tbody>
                   
                <tr>                    
                    <td><?php echo $row["course_name"] ?></td>                       
                    <td><?php echo $row["course_day"] ?></td>
                    <td><?php echo $row["course_time"] ?></td>
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





