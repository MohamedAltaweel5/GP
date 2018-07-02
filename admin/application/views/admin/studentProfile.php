<!DOCTYPE html>
<html>
<head>
  
  <title>Student - <?php echo $student[0]['student_fullname']; ?> Profile</title>
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
        <small>table</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>admin/main/index"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class=""><a href="<?php echo base_url(); ?>admin/students/students">Students</a></li>
        <li class="active"><?php echo $student[0]['student_fullname']; ?> Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">              
              <li class="active"><a href="#settings" data-toggle="tab"><?php echo $student[0]['student_fullname']; ?> Profile</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane
              
              `student_id`, `student_username`, `student_fullname`, `student_password`, `student_email`, `student_phone`, `student_lastlogin`, `status_id`, `department_id`, `program_id`, `date_reg`, `G.P.A`, `thesis`
              -->

              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" method="post" >
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Student Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="student_username" placeholder="Username" value="<?php echo $student[0]['student_username']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Student Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="student_fullname" placeholder="Username" value="<?php echo $student[0]['student_fullname']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputName" name="student_password" placeholder="Password" value="<?php echo $student[0]['student_password']; ?>" >
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Email" name="student_email" value="<?php echo $student[0]['student_email']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="student_phone" placeholder="phone" value="<?php echo $student[0]['student_phone']; ?>">
                    </div>
                  </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Department (<i style="color:red; font-size:12px;"><?php echo $student[0]['department_name']; ?></i>)</label>
                            <select class="form-control col-sm-8" style="width:80%;" name="department_id">
                                <?php foreach ($departments as $department) {?>
                                <option value="<?php echo $department['department_id'] ?>"><?php echo $department['department_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Program (<i style="color:red; font-size:12px;"><?php echo $student[0]['program_name']; ?></i>)</label>
                            <select class="form-control col-sm-8" style="width:80%;" name="program_id">
                                <?php foreach ($programs as $program) {?>
                                <option name="<?php echo $program['program_id']; ?>"><?php echo $program['program_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">status (<i style="color:red; font-size:12px;"><?php echo $student[0]['status_name']; ?></i>)</label>
                            <select class="form-control col-sm-8" style="width:80%;" name="status_id">
                                <?php foreach ($status as $stat) {?>
                                <option name="<?php echo $stat['status_id']; ?>"><?php echo $stat['status_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-danger" name="submit" value="save">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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





