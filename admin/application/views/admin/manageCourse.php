<!DOCTYPE html>
<html>
<head>
  
  <title>Manage Courses</title>
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
        Manage Courses
        <small>table</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Courses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box" style="padding:20px;">
            <div class="box-header">
              <h3 class="box-title">Manage Courses</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            
            <form class="form-horizontal">
                  
                  
                                                      
                  <div class="col-md-4 form-group">
                  <label>Semester</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>                 
                  </div>
                <div class="clearfix"></div>
                <div class="col-md-4 form-group">
                  <label>year</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>                 
                  </div>
                <div class="clearfix"></div>
                <div class="col-md-4 form-group">
                  <label>Stage</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>                 
                  </div>
                <div class="clearfix"></div>
                <div class="col-md-4 form-group">
                  <label>Subject</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>                 
                  </div>
                <div class="clearfix"></div>
                <div class="col-md-4 form-group">
                  <label>Select Doctors</label>
                  <select multiple class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                <div class="clearfix"></div>
                 <div class="box-footer">
                <button type="submit" class="btn btn-primary">add</button>
              </div>
            </form>
            <br/>
            <br/>
            <br/>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Students</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   
                  <th>subject name</th>                                                      
                  <th>Doctor</th>
                  
                </tr>
                </thead>
                <tbody>
                   
                <tr>                     
                    <td>System Analysis</td>
                    <td>tarek</td>                                                               
                </tr>  
                <tr>                     
                    <td>Data Mining </td>
                    <td>mohamed</td>                                                               
                </tr>
               
                </tbody>
                <tfoot>
                <tr>
                   
                  <th>subject name</th>                                                      
                  <th>Doctor</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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





