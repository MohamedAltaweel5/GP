<!DOCTYPE html>
<html>
<head>
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  
  <title>Courses TimeTable</title>
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
        Courses TimeTable
        <small>table</small>
      </h1>
      <<!-- ol class="breadcrumb">
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
              <h3 class="box-title">Courses TimeTable</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Subject</th>                                                      
                  <th>Day</th>
                  <th>Time</th>
                  <th>Place</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                   <?php include 'Database.php';
            $con=new Database();
            $student_username = $_SESSION['user'];
            $sql="SELECT course.course_name,course.course_day,course.course_time,course.course_place from studentcourse,semesterdetails,course,student where studentcourse.student_id = student.student_id and student.student_username=$student_username and  semesterdetails.semester_year='Fall 2018-2019' and studentcourse.course_id=course.course_id and semesterdetails.course_id=course.course_id";
            $data=mysqli_query($con->conn,$sql);
            while($row=mysqli_fetch_assoc($data)){
              echo"<tr>
              <td>".$row["course_name"]."</td>                       
                    <td>".$row["course_day"]."</td> 
                    <td>".$row["course_time"]."</td>
                    <td>".$row["course_place"]."</td>
                   </tr>";}?>
                </tbody>
                
              </table>
            </div>
            <form action="PDF/print_timetable.php""
                     >

                    <button style="margin-left: 45%;
margin-right: 30%" type="submit" class="btn btn-danger" formtarget="_blank" >
                        <b> Print Timetable <b>

                    </button>
                </form>
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





