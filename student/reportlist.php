<!DOCTYPE html>
<html>
<head>
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  
  <title>Reports List</title>
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
        Reports List
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
              <h3 class="box-title">Reports List</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Report Title</th>                                                      
                  <th>Report Date</th>
                  
                  
                  
                </tr>
                </thead>
                <tbody>
                    <?php 
            include 'Database.php';
            $con=new Database();
            $student_username=$_SESSION['user'];
            $sql="SELECT report_id,report_title,report_date FROM report,student WHERE report.student_id=student.student_id AND student.student_username=$student_username ORDER BY report_date DESC";
            $data=mysqli_query($con->conn,$sql);
            
            while($row=mysqli_fetch_assoc($data)){
              $rep_id=$row['report_id'];
              ?>
              <tr>
              <td><a href="report.php?rep_id=<?php echo $rep_id ?>"> <?php echo $row['report_title'] ?></a></td>
                  <td><?php echo $row["report_date"]?></td> 
                  
                </tr> 
                <?php }?>
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





