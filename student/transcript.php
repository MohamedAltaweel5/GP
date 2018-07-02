<!DOCTYPE html>
<html>
<head>
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  
  <title>Transcript</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php include 'includes/head.php'; ?>
   <link rel="stylesheet" type="text/css" href="theme.css"> 
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
          Transcript
        </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transcript</li>
      </ol> -->
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transcript</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->


  <?php 
  $student_username = $_SESSION['user'];
            include 'Database.php';
            $con=new Database();
            $sql="SELECT student_username FROM student WHERE student_username=$student_username";
            $data=mysqli_query($con->conn,$sql);
            $row=mysqli_fetch_assoc($data);
            $sql2="SELECT department.department_name FROM student,department WHERE department.department_id=student.department_id AND student_username=$student_username";
            $data2=mysqli_query($con->conn,$sql2);
            $row2=mysqli_fetch_assoc($data2);
            $sql3="SELECT `G.P.A` FROM student WHERE student_username=$student_username";
            $data3=mysqli_query($con->conn,$sql3);
            $row3=mysqli_fetch_assoc($data3);
            ?> 
               <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                
                </thead>
                <tbody>
                
                <tr>
                  <th>Student ID</th> 
                  <td><?php echo($row["student_username"])?></td>
                </tr>               
                
                <tr>
                  <th>Department</th> 
                  <td><?php echo($row2["department_name"]);?></td>
                </tr>
                <tr>
                  <th>G.P.A</th> 
                  <td><?php echo($row3["G.P.A"]);?></td>
                </tr>
                
                </tbody>

              </table>
</div>
            
              <table id="trans">
                <thead>
                <tr>
                  
                  <th>Code</th>                                                      
                  <th>Subject Name</th>
                  <th>Hours</th>
                  <th>Total</th> 
                  <th>Grade</th>                 
                  
                </tr>
                </thead>
                <tbody>
                   
              <?php 
            $sql="SELECT course.course_code,course.course_name,course.course_hours,grade.grade_mark,grade.grade_value FROM grade,course WHERE course.course_id=grade.course_id AND student_username= $student_username";
            $data=mysqli_query($con->conn,$sql);
            while($row=mysqli_fetch_assoc($data))
            {
               echo"
                      <tr>
                          <td>".$row["course_code"]."</td>                       
                          <td>".$row["course_name"]."</td> 
                          <td>".$row["course_hours"]."</td>
                          <td>".$row["grade_mark"]."</td>
                          <td>".$row["grade_value"]."</td>
                      </tr>";
            }
               ?>
               
                </tbody>
                
              </table>
            <form action="PDF/print_transcript.php""
                     >
                    <button id="print" type="submit" class="btn btn-danger" formtarget="_blank" >
                        <b> Print Trascript <b>

                    </button>
                </form>
        
             <!--  <button type="submit" class="btn btn-danger" action="PDF/print_timetable.php" method="post" style="position: relative;left: 43%;">Print Transcript</button> -->
                
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





