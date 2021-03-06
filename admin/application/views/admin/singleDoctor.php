<!DOCTYPE html>
<html>
<head>
  
  <title>Single Doctor</title>
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
        Single Doctor
        <small>table</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">single Doctor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Single Doctor</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                
                </thead>
                <tbody>
                 <tr>
                  <th>Full Name</th> 
                  <td>DR Ahmed Bahaa</td>
                </tr>
                <tr>
                  <th>Email</th> 
                  <td>dssfjbs@yhavkvl.com</td>
                </tr> 
                <tr>
                  <th>Phone</th> 
                  <td>01013651414</td>
                </tr>
                <tr>
                  <th>Gender</th> 
                  <td>Male</td>
                </tr>
                <tr>
                  <th>Rank</th> 
                  <td>dfjbsdhj</td>
                </tr>
                <tr>
                  <th>Department</th> 
                  <td>information System</td>
                </tr>
                <tr>
                  <th>Doctor Pic</th> 
                  <td><img src="dist/img/user1-128x128.jpg" width="100px" height="100px"/></td>
                </tr>
               
                
                
               
                </tbody>
               
              </table>
                 
            </div>
            <br/>
            <a href="" class="btn btn-primary" style="margin:50px;">Dr Students</a>
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





