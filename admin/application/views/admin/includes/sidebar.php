<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>style/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Home</span></a></li>
        <li><a href="<?php echo base_url(); ?>admin/main/myProfile"><i class="fa fa-book"></i> <span>Profile</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Doctors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">                
              <li><a href="<?php echo base_url(); ?>admin/doctors/addDoctor"><i class="fa fa-circle-o"></i>add Doctor</a></li>
                <li><a href="<?php echo base_url(); ?>admin/doctors/doctors"><i class="fa fa-circle-o"></i> All Doctors</a></li>                
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                
              <li><a href="<?php echo base_url(); ?>admin/students/addStudents"><i class="fa fa-circle-o"></i>add Students</a></li>
                <li><a href="<?php echo base_url(); ?>admin/students/students"><i class="fa fa-circle-o"></i> All Students</a></li>                
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>courses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                
              <li><a href="<?php echo base_url(); ?>admin/courses/addCourses"><i class="fa fa-circle-o"></i>add courses</a></li>
              <li><a href="<?php echo base_url(); ?>admin/courses/courses"><i class="fa fa-circle-o"></i>Courses</a></li>
                <li><a href="<?php echo base_url(); ?>admin/courses/addSemesterCourse"><i class="fa fa-circle-o"></i> add semester Courses</a></li>
                <li><a href="<?php echo base_url(); ?>admin/courses/addGrades"><i class="fa fa-circle-o"></i> add Grades</a></li>
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>