<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Post Graduate Sys | Add Doctors</title>
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
        Add Doctor
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Add Doctors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">              
              <li class="active"><a href="#add" data-toggle="tab">Add Doctors</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane 
              `doctor_id`, `doctor_username`, `doctor_password`, `doctor_email`, `doctor_phone`, `doctor_lastlogin`, `department_id`, `rank_id`
              
              
              -->

              <div class="active tab-pane" id="add">
                <form class="" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                  <label>user Name</label>
                  <input class="form-control" name="doctor_username" required="required" placeholder="Enter ..." type="text">
                </div>
                    <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" name="doctor_password" required="required" placeholder="Enter ..." type="text">
                </div>
                    <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" name="doctor_email" required="required" placeholder="Enter ..." type="text">
                </div>
                    <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" name="doctor_phone" required="required" placeholder="Enter ..." type="text">
                </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">department</label>
                            <select class="form-control" name="department_id">
                                <?php foreach ($departments as $department) {?>
                                <option value="<?php echo $department['department_id'] ?>"><?php echo $department['department_name']; ?></option>
                                <?php } ?>                                
                            </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">rank</label>
                            <select class="form-control" name="rank_id">
                                <?php foreach ($ranks as $rank) {?>
                                <option value="<?php echo $rank['rank_id']; ?>"><?php echo $rank['rank_name']; ?></option>   
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile" class="col-sm-2 control-label">Upload Image</label>
                        <input type="file" name="doctor_image" multiple="" id="exampleInputFile">                                                
                    </div>
                  
                    
                      <input name="submit" value="save" type="submit" class="btn btn-danger">
                    
                  
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
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
<script src="<?php echo base_url(); ?>style/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>style/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>style/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>style/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>style/dist/js/demo.js"></script>
</body>
</html>
