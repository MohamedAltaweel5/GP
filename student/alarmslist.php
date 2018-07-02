<!DOCTYPE html>
<html>
<head>
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alarms List</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php include 'includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="theme.css">

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
        Alarms List
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Reports List</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content" >

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-9" >
          
            
            <div class="tab-content">
          
                <table id="trans2">
                <thead>
                <tr>
                  
                                                                       
                  <th>Alarms Date</th>                 
                  
                </tr>
                </thead>
                <tbody>
                
                   <?php 
            include 'Database.php';
            $con=new Database();
            $student_username = $_SESSION['user'];
            $sql="SELECT alarm_date,alarm_id FROM alarm,student where alarm.student_id=student.student_id AND student.student_username=$student_username ORDER BY alarm_date DESC";
            $data=mysqli_query($con->conn,$sql);
            while($row=mysqli_fetch_assoc($data)){
              $alarm_id=$row["alarm_id"];
              ?>
              <tr>
              <td><a href="alarms.php?alarm_id=<?php echo $alarm_id ?>"> <?php echo $row['alarm_date'] ?></a>
                  </td>
                </tr>
                <?php }?>

              </tbody>
                 </table>

</div>
</div>
</div>
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

  <!-- Control Sidebar -->
  
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
