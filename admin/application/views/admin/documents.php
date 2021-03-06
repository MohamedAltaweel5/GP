<!DOCTYPE html>
<html>
<head>
  
  <title>Student -  <?php echo $documents[0]['student_fullname']; ?> Documents </title>
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
        <?php echo $documents[0]['student_fullname']; ?> Documents
        <small>table</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $documents[0]['student_fullname']; ?> Documents</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $documents[0]['student_fullname']; ?> Documents</h3>
            </div>
            <!-- /.box-header `document_id`, `document_title`, `document_content`, `document_date`, `document_type`, `student_id`, `admin_id` -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                  <th>document_title</th>                                                      
                  <th>document_date</th>
                  <th>document_type</th>
                  <th>Show Document</th>                  
                </tr>
                </thead>
                <tbody>
                   <!-- `  -->
                   <?php foreach($documents as $document){ ?>
                <tr> 
                    <td><?php echo $document['document_title']; ?></td>
                    <td><?php echo $document['document_date']; ?></td>                       
                    <td><?php echo $document['document_type']; ?></td>                     
                    <td><a href="<?php echo base_url(); ?>Uploads/document/<?php echo $document['document_content']; ?>" target="_blank">Show My Pdf</a></td>                                                            
                    
                </tr>  
                   <?php } ?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>document_title</th>                                                      
                  <th>document_date</th>
                  <th>document_type</th>
                  <th>Show Document</th>                  
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





