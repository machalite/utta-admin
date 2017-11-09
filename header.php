<?php
//login validation, displays header and sidebar menu

  //fetch strings to display
  include_once ("strings.php");

  @session_start();

  //Prevent user entering without log in
  //check if session is empty (no login)
  if(empty($_SESSION['username']) OR empty($_SESSION['password']))
  {
    //redirect to login.php
    header('Location: login.php');
  }
?>
<html>
  <head>
  	<!-- META TAG-->
  	<meta charset="UTF-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="description" content="Administration page for UTTA bot" />
  	<meta name="keywords" content="UTTA, bot, line, university, time-table,
    scheduling, machalite, php" />
  	<!-- END OF META TAG -->

  	<!-- CSS -->
    <!-- Snackbar -->
  	<link href="css/snackbar.css" rel="stylesheet">
  	<!-- Bootstrap -->
  	<link href="css/bootstrap.css" rel="stylesheet">
  	<!-- Font Awesome -->
  	<link href="css/font-awesome.css" rel="stylesheet">
  	<!-- Bootstrap-Wysiwyg -->
  	<link href="css/prettify.min.css" rel="stylesheet">
  	<!-- Custom Theme Style -->
  	<link href="css/custom.css" rel="stylesheet">
  	<!-- Datatables -->
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="css/scroller.bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/bootstrap.min.css" />
    <link type="text/css" href="css/bootstrap-timepicker.min.css" />

  	<!-- END OF CSS -->

    <!-- displays favicon -->
  	<link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
    <!-- displays title -->
  	<title><?php echo $headerTitle;?></title>
  </head>

  <body class="nav-md">
    <div class="container body">
  		<div class="main_container">
  			<div class="col-md-3 left_col">
  				<div class="left_col scroll-view">
  					<div class="navbar nav_title" style="border: 0;">
  						<a href="index.php" class="site_title">
  							<i class="fa fa-home"></i>
                <?php echo $sidebarTitle;?>
  						</a>
  					</div>

  					<div class="clearfix"></div>
  					<br />

  					<!-- SIDEBAR MENU -->
  					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  						<div class="menu_section">
  							<h3><?php echo $sidebarMenu;?></h3>
  							<ul class="nav side-menu">

                  <hr>

  								<li>
  									<a href="faculty.php"><i class="fa fa-university"></i>
                      <?php echo $sidebarFaculty;?></a>
  								</li>

  								<li>
  									<a href="department.php"><i class="fa fa-graduation-cap"></i>
                      <?php echo $sidebarDepartment;?> </a>
  								</li>

  								<li>
  									<a href="course.php"><i class="fa fa-book"></i>
                      <?php echo $sidebarCourse;?> </a>
  								</li>

                  <li>
                    <a href="year.php"><i class="fa fa-pencil"></i>
                      <?php echo $sidebarYear;?> </a>
                  </li>

                  <li>
                    <a href="class.php"><i class="fa fa-calendar"></i>
                      <?php echo $sidebarClass;?> </a>
                  </li>

                  <li>
                    <a href="off_class.php"><i class="fa fa-thumb-tack"></i>
                      <?php echo $sidebarOffClass;?> </a>
                  </li>

                  <hr>

                  <li>
                    <a href="student.php"><i class="fa  fa-male"></i>
                      <?php echo $sidebarStudent;?> </a>
                  </li>

                  <li>
                    <a href="lecturer.php"><i class="fa  fa-suitcase"></i>
                      <?php echo $sidebarLecturer;?> </a>
                  </li>

                  <hr>

                  <li>
                    <a href="building.php"><i class="fa fa-building"></i>
                      <?php echo $sidebarBuilding;?> </a>
                  </li>

                  <li>
                    <a href="room.php"><i class="fa fa-check-square "></i>
                      <?php echo $sidebarRoom?> </a>
                  </li>

                  <hr>

                  <li>
                    <a href="user.php"><i class="fa fa-user"></i>
                      <?php echo $sidebarUser;?> </a>
                  </li>

                  <li>
                    <a href="activity_log.php"><i class="fa fa-list-ul "></i>
                      <?php echo $sidebarActivityLog?> </a>
                  </li>

                  <li>
                    <a href="usage_log.php"><i class="fa fa-list-ul "></i>
                      <?php echo $sidebarUsageLog?> </a>
                  </li>

  							</ul>
  						</div>
  					</div>
  					<!-- END OF SIDEBAR MENU -->
  				</div>
  			</div>

  			<!-- TOP NAVIGATION -->
  			<div class="top_nav">
  				<div class="nav_menu">
  					<nav class="" role="navigation">
  						<div class="nav toggle">
  							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
  						</div>

  						<ul class="nav navbar-nav navbar-right">
  							<li class="">
  								<a href="javascript:;" class="user-profile dropdown-toggle"
                  data-toggle="dropdown" aria-expanded="false">

  									<!-- displays logo and username on the right top -->
  									<img src="img/logo.png" alt="">
  									<?php echo $_SESSION['username']; ?>
  									<span class=" fa fa-angle-down"></span>
  								</a>

                  <!-- dropdown menu content -->
  								<ul class="dropdown-menu dropdown-usermenu pull-right">
  									<li><a href="help.php">
                      <i class="fa fa-question-circle pull-right"></i>
                      <?php echo $headerHelp?></a></li>
  									<li><a href="logout.php">
                      <i class="fa fa-sign-out pull-right"></i>
                      <?php echo $headerLogout?></a></li>
  								</ul>
  							</li>
  						</ul>
  					</nav>
  				</div>
  			</div>
      </div>
  			<!-- END OF TOP NAVIGATION -->
