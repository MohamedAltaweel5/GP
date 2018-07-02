<!DOCTYPE html>
<html>
<head>
  
  <title>Add Grades</title>
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
        Add Grades
        <small>table</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">add Grades</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box" style="padding:20px;">
            <div class="box-header">
              <h3 class="box-title">Add Grades</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            
            <form class="form-horizontal" method="post" enctype="multipart/form-data">                                                                                          
                  <div class="col-md-4 form-group">
                  <label>Select Course</label>
                  <select class="form-control" name="course_id" >
                      <?php foreach ($courses as $course) {?>
                    <option value="<?php echo $course['course_id'] ?>"><?php echo $course['course_name']; ?></option>
                      <?php } ?>
                  </select>                 
                  </div>
                <div class="clearfix"></div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Upload Sheet</label>
                  <input type="file" name="gradesheet" multiple="" id="exampleInputFile">

                  <p class="help-block">CSV.</p>
                </div>                                
                 <div class="box-footer">
                <input type="submit" name="submit" value="Upload" class="btn btn-primary">
              </div>
            </form>
            <br/>
            <br/>
            <br/>
            <div class="box">
            
            
            
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

