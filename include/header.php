<?php
@session_set_cookie_params(1800,"/");
  $d=$_SESSION['id2'];
  $fetch=mysqli_fetch_array(mysqli_query($conn,"select * from $d where id='".$_SESSION['id']."'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SSIT - 
  <?php
    if($d=="admin")
    {
  ?>
      Admin
  <?php
    }
    else if($d=="faculty")
    { 
      if($fetch['faculty_roll_id']==1)
      {
  ?>
        HOD
  <?php
      }
      else if($fetch['faculty_roll_id']==2)
      {
  ?>
        Class Coordinator
  <?php
      }
      else
      {
  ?>
        Faculty
  <?php
      }
    }
    else
    {
  ?>
      Student
  <?php
    }
  ?>

  </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/SSIT.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
              <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>            
          </ul>
        </div>

        <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="bell" class="bell"></i>
              <span class="badge headerBadge1"> 
              <?php 
                $count = 'select id from circular order by id';
                $count_run = mysqli_query($conn, $count);
                $row = mysqli_num_rows($count_run);
                echo $row;
              ?> 
              </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
              Circular                
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
              <?php
              $queryuser="select * from circular order by id desc limit 4";
              $queryuserprofile=mysqli_query($conn,$queryuser);
              while($row=mysqli_fetch_array($queryuserprofile))
              {
              ?>
              
                <a href="<?=$row['circular'];?>" class="dropdown-item"> 
                <span class="dropdown-item-icon bg-success text-white"> 
                  <i class="fas fa-check"></i>
                </span> 
                  <span class="dropdown-item-desc"> <b><?=$row['detail'];?></b> <span class="time"><?=$row['date'];?></span></span>
                </a>
              
              <?php
              }
              ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="show_circular.php">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>        

          <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
            <img alt="image" src="assets/img/users/1.png" class="user-img-radious-style"> 
            <span class="d-sm-none d-lg-inline-block"></span>
          </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello 
  <?php
    if($d=="admin")
    {
  ?>
      Admin
  <?php
    }
    else if($d=="faculty")
    { 
      if($fetch['faculty_roll_id']==1)
      {
  ?>
        HOD
  <?php
      }
      else if($fetch['faculty_roll_id']==2)
      {
  ?>
        Class Coordinator
  <?php
      }
      else
      {
  ?>
        Faculty
  <?php
      }
    }
    else
    {
  ?>
      Student
  <?php
    }
  ?>
              </div>
              <a href="profile.php" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
      </nav>