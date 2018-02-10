<?php
  session_start();
  if(!isset($_SESSION['username']) && $_SESSION['username'] != 'admin')
    header('location: index.php');

  include('../db.php');
  function countNum($dept) {
    global $msqi;
    $sql = "SELECT COUNT(*) as count FROM `registration` WHERE `dept`='$dept'";
    $res = $msqi->query($sql);
    return $res->fetch_assoc()['count'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sambhram Admin Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Sambhram
                    </a>
                </div>
                <ul class="nav">
                    <!--<li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>-->
                    <li class="active">
                        <a class="nav-link" href="registrations.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Registrations</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#"> Registrations </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">Registrations</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="ae-tab" data-toggle="tab" href="#ae" role="tab" aria-controls="ae" aria-selected="true">AE (<?php echo countNum('ae'); ?>)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="cse-tab" data-toggle="tab" href="#cse" role="tab" aria-controls="cse" aria-selected="false">CS/IS (<?php echo countNum('cse'); ?>)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="cv-tab" data-toggle="tab" href="#cv" role="tab" aria-controls="cv" aria-selected="false">CV (<?php echo countNum('cv'); ?>)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="ec-tab" data-toggle="tab" href="#ec" role="tab" aria-controls="ec" aria-selected="false">EC (<?php echo countNum('ec'); ?>)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="me-tab" data-toggle="tab" href="#me" role="tab" aria-controls="me" aria-selected="false">ME (<?php echo countNum('me'); ?>)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="cul-tab" data-toggle="tab" href="#cul" role="tab" aria-controls="cul" aria-selected="false">Cult (<?php echo countNum('cul'); ?>)</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="ae" role="tabpanel" aria-labelledby="ae-tab"><?php $dept="ae"; include('table.php');?></div>
                <div class="tab-pane fade" id="cse" role="tabpanel" aria-labelledby="cse-tab"><?php $dept="cse"; include('table.php');?></div>
                <div class="tab-pane fade" id="cv" role="tabpanel" aria-labelledby="cv-tab"><?php $dept="cv"; include('table.php');?></div>
                <div class="tab-pane fade" id="ec" role="tabpanel" aria-labelledby="ec-tab"><?php $dept="ec"; include('table.php');?></div>
                <div class="tab-pane fade" id="me" role="tabpanel" aria-labelledby="me-tab"><?php $dept="me"; include('table.php');?></div>
                <div class="tab-pane fade" id="cul" role="tabpanel" aria-labelledby="cul-tab"><?php $dept="cul"; include('table.php');?></div>
              </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://github.com/aswathkk">Aswath K</a> | Template By <a href="http://www.creative-tim.com">Creative Tim</a>
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
 
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<!--<script src="assets/js/plugins/bootstrap-switch.js"></script>-->
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<!--<script src="assets/js/plugins/bootstrap-notify.js"></script>-->
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>

</html>