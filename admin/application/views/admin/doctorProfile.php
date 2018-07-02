<!DOCTYPE html>
<html>
<head>
  
  <title>Doctor Profile</title>
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
        Doctor Profile
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Doctor Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Doctor Profile</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <div class="box-body">
              
                
                
                <form class="" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                  <label>user Name</label>
                  <input class="form-control" name="doctor_username" value="<?php echo $doctor[0]['doctor_username']; ?>" required="required" placeholder="Enter ..." type="text">
                </div>
                    <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" name="doctor_password" value="<?php echo $doctor[0]['doctor_password']; ?>" required="required" placeholder="Enter ..." type="text">
                </div>
                    <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" name="doctor_email" value="<?php echo $doctor[0]['doctor_email']; ?>" required="required" placeholder="Enter ..." type="text">
                </div>
                    <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" name="doctor_phone" value="<?php echo $doctor[0]['doctor_phone']; ?>" required="required" placeholder="Enter ..." type="text">
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
                        <img src="<?php echo base_url(); ?>Uploads/doctors/<?php echo $doctor[0]['doctor_image']; ?>" width="150px" height="150px">
                    </div>
                  
                    
                      <input name="submit" value="save" type="submit" class="btn btn-danger">
                    
                  
                </form>
                 
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





