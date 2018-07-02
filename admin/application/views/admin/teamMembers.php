<!DOCTYPE html>
<html>
<head>
  
  <title>Team Members</title>
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
        team members
        <small>table</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Team Members</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Team Members</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>name</th>  
                  <th>clinic</th>                                                      
                  <th>name arabic</th>
                  <td>cv</td>
                  <th>image</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($teamMembers as $members) {
                        
                     ?>
                <tr> 
                    <td><?php echo $members['name']; ?></td>
                    <td><?php echo $members['clinic_name']; ?></td>                       
                    <td><?php echo $members['name_ar']; ?></td> 
                    <td><?php echo $members['cv_ar']; ?></td>
                    <td><img src="<?php echo base_url(); ?>Uploads/team/<?php echo $members['image']; ?>" width="150px" height="150px" class="img-responsive"></td>
                    <td><a href="<?php echo base_url(); ?>admin/team/editTeamMembers/<?php echo $members['doctor_id']; ?>" class="btn btn-danger">edit</a><a href="<?php echo base_url(); ?>admin/team/deleteTeamMembers/<?php echo $members['doctor_id']; ?>" class="btn btn-danger">delete</a> </td>
                </tr>  
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>name</th>  
                  <th>clinic</th>                                                      
                  <th>name arabic</th>
                  <td>cv</td>
                  <th>image</th>
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
  <?php include 'includes/aside.php'; ?>
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




