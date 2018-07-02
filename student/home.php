<!DOCTYPE html>
<html>
<head>
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student's Home </title>
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
    

    <!-- Main content -->
    <center><img src="dist/img/logo.png"></center>
    <h4 id="ann">Study of post-graduate courses at Faculty of Computers and Information, Helwan University, will start on 11/10/2018</h4>
    <div style="float: left;width:50%">
    <h3 style="font-family: monospace;color: #2670a7">Latest News:</h3>
    <h4 style="font-family:Arial; font-size: 20px; margin-left: 15px;">
-
Helwan University President Inaugurates Third Stage of Kasr Ainy Emergency Hospital 185
</h4>
<br>
<h4 style="font-family:Arial; font-size: 20px; margin-left: 15px;">
-Helwan University President Joins Hostel Students in Ramadan Iftar
Elkhosht Signs Letter of Intent with American Universities Coalition to Establish Center for Scientific Excellence in Agriculture</h4>
<br>
<h4 style="font-family:Arial; font-size: 20px; margin-left: 15px;">
-Helwan University President Signs Cooperation Protocol with Ambassador of Spain in Cairo in Recruiting Spanish Professor to Teach at Cairo University


Back
</h4>
    
</div>


<div style="float: right;width: 50%" align="right">
    <img src="dist/img/inhelwan.jpg"  style="height: 200px; width: 200px">
    <img src="dist/img/4.jpg"  style="height: 200px; width: 200px">
 
</div>

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
