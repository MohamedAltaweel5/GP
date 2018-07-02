<!DOCTYPE html>
<html>
<head>
  
  <title>Students</title>
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Students</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Students</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>  
                  <th>username</th>                                                      
                  <th>full name</th>
                  <th>password</th>                  
                  <th>email</th>
                  <th>phone</th>                  
                  <th>status</th>
                  <th>department</th>
                  <th>program</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                   <!-- `student_id`, `student_username`, `student_fullname`, `student_password`, `student_email`, `student_phone`, `student_lastlogin`, `status_id`, `department_id`, `program_id`, `date_reg`, `G.P.A`, `thesis   -->
                   <?php foreach($students as $student){ ?>
                <tr> 
                    <td><?php echo $student['student_id']; ?></td>
                    <td><?php echo $student['student_username']; ?></td>                       
                    <td><?php echo $student['student_fullname']; ?></td>                     
                    <td><?php echo $student['student_password']; ?></td>
                    <td><?php echo $student['student_email']; ?></td> 
                    <td><?php echo $student['student_phone']; ?></td>
                    <td><?php echo $student['status_name']; ?></td>
                    <td><?php echo $student['department_name']; ?></td>
                    <td><?php echo $student['program_name']; ?></td>                    
                    <td><a href="<?php echo base_url(); ?>admin/students/studentProfile/<?php echo $student['student_id'] ?>" class="btn btn-danger">profile</a> <a href="<?php echo base_url(); ?>admin/students/addDocuments/<?php echo $student['student_id'] ?>" class="btn btn-primary">Add Documents</a> <a href="<?php echo base_url(); ?>admin/students/addAlarm/<?php echo $student['student_id'] ?>" class="btn btn-primary">Add Alarm</a> <?php if($student['status_id'] = 1 AND $student['status_id'] = 2){ ?><a href="<?php echo base_url(); ?>admin/students/addReport/<?php echo $student['student_id'] ?>" class="btn btn-primary">Add Report</a> <a href="<?php echo base_url(); ?>admin/students/report/<?php echo $student['student_id'] ?>" class="btn btn-primary">Reports</a><?php } ?> <a href="<?php echo base_url(); ?>admin/students/document/<?php echo $student['student_id'] ?>" class="btn btn-primary">Documents</a> <?php if($student['status_id'] != 3 and $student['status_id'] != 4){ ?> <a href="<?php echo base_url(); ?>admin/doctors/addDoctorStudents/<?php echo $student['student_id']; ?>" class="btn btn-danger">add Doctor</a> <?php } ?></td>
                </tr>  
                   <?php } ?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>id</th>  
                  <th>username</th>                                                      
                  <th>full name</th>
                  <th>password</th>                  
                  <th>email</th>
                  <th>phone</th>                  
                  <th>status</th>
                  <th>department</th>
                  <th>program</th>
                  <th>action</th>
                </tr>
                </tfoot>
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





