<!DOCTYPE html>
<html>
<head>
  <?php
  
  session_start();
  require('authorize.php'); 
  ?>
  <title>Reports</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php include 'includes/head.php'; ?>
 <link rel="stylesheet" type="text/css" href="theme.css"> 

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
Reports        
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reports</h3>
            </div>
            <!-- /.box-header   `name`, `name_ar`, `job_title`, `job_title_ar`, `cv_content`, `cv_content_ar`, `image` -->
            <?php 
            include 'Database.php';
            $con=new Database();
            $student_username=$_SESSION['user'];
            $rep_id=$_GET['rep_id'];
            $sql="SELECT student_fullname,date_reg,department.department_name FROM student,department WHERE student.department_id=department.department_id AND student_username=
            $student_username";
            $data=mysqli_query($con->conn,$sql);
            $row=mysqli_fetch_assoc($data);
            $sql3="SELECT status_id FROM student WHERE student_username=$student_username";
            $data3=mysqli_query($con->conn,$sql3);
            $row3=mysqli_fetch_assoc($data3);
            $status=$row3["status_id"];
            $sql2="SELECT doctor_username,report_content FROM doctorreport,doctor,student WHERE doctorreport.doctor_id=doctor.doctor_id AND student_username=$student_username AND report_id=$rep_id ";
            $dd=array();
            $data2=mysqli_query($con->conn,$sql2);
            while($row2=mysqli_fetch_array($data2)){
              $dd[]=$row2;
              
            
             }
             $first=$dd[0]['doctor_username'];
             $second=$dd[1]['doctor_username'];
             $firstCon=$dd[0]['report_content'];
             $secondCon=$dd[1]['report_content'];

             $thirdcon=$dd[2]['report_content'];
             $third=$dd[2]['doctor_username'];
      


            ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                
                </thead>
                <tbody>
                
                <tr>
                  <th>Student Name</th> 
                  <td><?php echo($row["student_fullname"]);?></td>
                </tr>               
                
                <tr>
                  <th>Department</th> 
                  <td><?php echo($row["department_name"]);?></td>
                </tr>
                <tr>
                  <th>Date of Registeration</th> 
                  <td><?php echo($row["date_reg"]);?></td>
                </tr>
                
                </tbody>

              </table>
              <br>
                <br>
                <br>
                <br>
                <form>
                  
                   <h4 style="display: inline; position: relative;top:-420px;left:132px;">
                    <?php  echo "DR:" .$first;?></h4>
                    <textarea id="editor2" disabled=""  rows="20" cols="45">    
                      <?php echo $firstCon; ?>                                   
                    </textarea>
                  
                  <h4 style="display: inline; position: relative;top:-420px;left:172px;">
                    <?php  echo "DR:". $second?></h4>
                    <textarea id="editor2" disabled=""  rows="20" cols="45"> 
                       <?php echo $secondCon; ?>

                    </textarea>
                    <?php if($status==2){
                      ?>
                    <h4 style="margin-left: 36%;">
                    <?php  echo "DR:". $third?></h4>
                    <textarea  style="margin-left: 36%;" disabled=""  rows="20" cols="45"> 
                       <?php echo $thirdcon;}?>
                    </textarea>
                    
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





