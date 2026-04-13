<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');


?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <?php
      if ($d == "admin") {
        ?>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">All Form</h5>
                      <h2 class="mb-3 font-18">
                        <?php
                        $count = 'select id from form order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                        ?>
                      </h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/1.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">All Faculty</h5>
                      <h2 class="mb-3 font-18">
                        <?php
                        $count = 'select id from faculty order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                        ?>
                      </h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/1.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">All Students</h5>
                      <h2 class="mb-3 font-18">
                        <?php
                        $count = 'select id from students order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                        ?>
                      </h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/1.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      } else if ($d == "faculty") {
        if ($fetch['faculty_roll_id'] == 1) {
          ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">All Faculty</h5>
                          <h2 class="mb-3 font-18">
                            <?php
                            $i = 0;
                            $queryf = "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'";
                            $queryfprofile = mysqli_query($conn, $queryf);
                            while ($rowf = mysqli_fetch_array($queryfprofile)) {
                              if (!$rowf == null) {
                                if ($rowf['department'] == "Computer") {
                                  $count = 'select * from faculty_sub where department="Computer" order by id';
                                  $count_run = mysqli_query($conn, $count);
                                  $row = mysqli_num_rows($count_run);
                                  $i++;
                                } else if ($rowf['department'] == "IT") {
                                  $count = 'select * from faculty_sub where department="IT" order by id';
                                  $count_run = mysqli_query($conn, $count);
                                  $row = mysqli_num_rows($count_run);
                                  $i++;
                                } else if ($rowf['department'] == "Electrical") {
                                  $count = 'select * from faculty_sub where department="Electrical" order by id';
                                  $count_run = mysqli_query($conn, $count);
                                  $row = mysqli_num_rows($count_run);
                                  $i++;
                                } else if ($rowf['department'] == "Mechanical") {
                                  $count = 'select * from faculty_sub where department="Mechanical" order by id';
                                  $count_run = mysqli_query($conn, $count);
                                  $row = mysqli_num_rows($count_run);
                                  $i++;
                                } else if ($rowf['department'] == "Civil") {
                                  $count = 'select * from faculty_sub where department="Civil" order by id';
                                  $count_run = mysqli_query($conn, $count);
                                  $row = mysqli_num_rows($count_run);
                                  $i++;
                                } else if ($rowf['department'] == "EC") {
                                  $count = 'select * from faculty_sub where department="EC" order by id';
                                  $count_run = mysqli_query($conn, $count);
                                  $row = mysqli_num_rows($count_run);
                                  $i++;
                                }
                              } else {
                                echo "Complite Your Profile";
                              }
                            }
                            echo $i;
                            ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">All Students</h5>
                          <h2 class="mb-3 font-18">
                            <?php
                            $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                            if (!$f == null) {
                              if ($f['department'] == "Computer") {
                                $count = 'select * from students where department="Computer" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "IT") {
                                $count = 'select * from students where department="IT" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "Electrical") {
                                $count = 'select * from students where department="Electrical" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "Mechanical") {
                                $count = 'select * from students where department="Mechanical" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "Civil") {
                                $count = 'select * from students where department="Civil" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "EC") {
                                $count = 'select * from students where department="EC" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              }
                            } else {
                              echo "Complite Your Profile";
                            }
                            ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">All Form</h5>
                          <h2 class="mb-3 font-18">
                            <?php
                            $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                            if (!$f == null) {
                              if ($f['department'] == "Computer") {
                                $count = 'select * from form where department="Computer" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "IT") {
                                $count = 'select * from form where department="IT" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "Electrical") {
                                $count = 'select * from form where department="Electrical" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "Mechanical") {
                                $count = 'select * from form where department="Mechanical" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "Civil") {
                                $count = 'select * from form where department="Civil" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              } else if ($f['department'] == "EC") {
                                $count = 'select * from form where department="EC" order by id';
                                $count_run = mysqli_query($conn, $count);
                                $row = mysqli_num_rows($count_run);
                                echo $row;
                              }
                            } else {
                              echo "Complite Your Profile";
                            }
                            ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        } else if ($fetch['faculty_roll_id'] == 2) {
          ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">All Students</h5>
                          <h2 class="mb-3 font-18">
                          <?php
                          $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                          if (!$f == null) {
                            if ($f['department'] == "Computer") {
                              $count = 'select * from students where department="Computer" and current_semester=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "IT") {
                              $count = 'select * from students where department="IT" and current_semester=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "Electrical") {
                              $count = 'select * from students where department="Electrical" and current_semester=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "Mechanical") {
                              $count = 'select * from students where department="Mechanical" and current_semester=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "Civil") {
                              $count = 'select * from students where department="Civil" and current_semester=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "EC") {
                              $count = 'select * from students where department="EC" and current_semester=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            }
                          } else {
                            echo "Complite Your Profile";
                          }
                          ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">All Form</h5>
                          <h2 class="mb-3 font-18">
                          <?php
                          $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                          if (!$f == null) {
                            if ($f['department'] == "Computer") {
                              $count = 'select * from form where department="Computer" and sem=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "IT") {
                              $count = 'select * from form where department="IT" and sem=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "Electrical") {
                              $count = 'select * from form where department="Electrical" and sem=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "Mechanical") {
                              $count = 'select * from form where department="Mechanical" and sem=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "Civil") {
                              $count = 'select * from form where department="Civil" and sem=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            } else if ($f['department'] == "EC") {
                              $count = 'select * from form where department="EC" and sem=' . $f['sem'] . ' order by id';
                              $count_run = mysqli_query($conn, $count);
                              $row = mysqli_num_rows($count_run);
                              echo $row;
                            }
                          } else {
                            echo "Complite Your Profile";
                          }
                          ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <?php
        } else {
          ?>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">All Students</h5>
                      <h2 class="mb-3 font-18">
                      <?php
                      $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                      if (!$f == null) {
                        if ($f['department'] == "Computer") {
                          $count = 'select * from students where department="Computer" and current_semester=' . $f['sem'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "IT") {
                          $count = 'select * from students where department="IT" and current_semester=' . $f['sem'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "Electrical") {
                          $count = 'select * from students where department="Electrical" and current_semester=' . $f['sem'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "Mechanical") {
                          $count = 'select * from students where department="Mechanical" and current_semester=' . $f['sem'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "Civil") {
                          $count = 'select * from students where department="Civil" and current_semester=' . $f['sem'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "EC") {
                          $count = 'select * from students where department="EC" and current_semester=' . $f['sem'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        }
                      } else {
                        echo "Complite Your Profile";
                      }
                      ?>
                      </h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/1.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">All Form</h5>
                      <h2 class="mb-3 font-18">
                      <?php
                      $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                      if (!$f == null) {
                        if ($f['department'] == "Computer") {
                          $count = 'select * from form where userid=' . $_SESSION['id'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "IT") {
                          $count = 'select * from form where userid=' . $_SESSION['id'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "Electrical") {
                          $count = 'select * from form where userid=' . $_SESSION['id'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "Mechanical") {
                          $count = 'select * from form where userid=' . $_SESSION['id'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "Civil") {
                          $count = 'select * from form where userid=' . $_SESSION['id'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        } else if ($f['department'] == "EC") {
                          $count = 'select * from form where userid=' . $_SESSION['id'] . ' order by id';
                          $count_run = mysqli_query($conn, $count);
                          $row = mysqli_num_rows($count_run);
                          echo $row;
                        }
                      } else {
                        echo "Complite Your Profile";
                      }
                      ?>
                      </h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/1.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
    <?php
        }
      } else {
        ?>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">All Form</h5>
                  <h2 class="mb-3 font-18">
                    <?php
                    $f = mysqli_fetch_array(mysqli_query($conn, "select * from students where id='" . $_SESSION['id'] . "'"));
                    if (!$f == null) {
                      if ($f['department'] == "Computer") {
                        $count = 'select * from form where department="Computer" and sem=' . $f['current_semester'] . ' order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                      } else if ($f['department'] == "IT") {
                        $count = 'select * from form where department="IT" and sem=' . $f['current_semester'] . ' order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                      } else if ($f['department'] == "Electrical") {
                        $count = 'select * from form where department="Electrical" and sem=' . $f['current_semester'] . ' order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                      } else if ($f['department'] == "Mechanical") {
                        $count = 'select * from form where department="Mechanical" and sem=' . $f['current_semester'] . ' order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                      } else if ($f['department'] == "Civil") {
                        $count = 'select * from form where department="Civil" and sem=' . $f['current_semester'] . ' order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                      } else if ($f['department'] == "EC") {
                        $count = 'select * from form where department="EC" and sem=' . $f['current_semester'] . ' order by id';
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                        echo $row;
                      }
                    } else {
                      echo "Complite Your Profile";
                    }
                    ?>
                  </h2>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="assets/img/banner/1.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <?php
      }
      ?>

<?php
if ($d == "admin") {
  ?>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Faculty Table</h4>
        <div class="card-header-form">
          <form>
            <div class="input-group">
            </div>
          </form>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th class="text-center">
                <div class="custom-checkbox custom-checkbox-table custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                    id="checkbox-all">
                  <label>#</label>
                </div>
              </th>
              <th>Faculty Name</th>
              <th>Mobile Number</th>
              <th>Email</th>
              <th>Join Date</th>
              <th>Create Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php
            $i = 0;
            $queryuser = "select * from faculty order by id desc limit 3";
            $queryuserprofile = mysqli_query($conn, $queryuser);
            while ($row = mysqli_fetch_array($queryuserprofile)) {
              ?>
              <tr>
                <td class="p-0 text-center">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                  </div>
                </td>
                <td><?= $row['faculty_name']; ?></td>
                <td><?= $row['mobile_number']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['date_of_joining']; ?></td>
                <td><?= $row['create_date']; ?></td>
                <td>
                  <?php
                  if ($row['status'] == 1) {
                    ?>
                    <div class="badge badge-success">Active</div>
                    <?php
                  } else {
                    ?>
                    <div class="badge badge-warning">Deactive</div>
                    <?php
                  }
                  ?>
                </td>
                <td><a href="faculty_list.php" class="btn btn-outline-primary">Detail</a></td>
              </tr>
              <?php
              $i++;
            }
            ?>
            <tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Student Table</h4>
        <div class="card-header-form">
          <form>
            <div class="input-group">
            </div>
          </form>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th class="text-center">
                <div class="custom-checkbox custom-checkbox-table custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                    id="checkbox-all2">
                  <label>#</label>
                </div>
              </th>
              <th>Enrollment No</th>
              <th>Student Name</th>
              <th>Mobile Number</th>
              <th>Email</th>
              <th>Department</th>
              <th>Current Semester</th>
              <th>Create Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php
            $queryuser = "select * from students order by id desc limit 3";
            $queryuserprofile = mysqli_query($conn, $queryuser);
            while ($row = mysqli_fetch_array($queryuserprofile)) {
              ?>
              <tr>
                <td class="p-0 text-center">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                  </div>
                </td>
                <td><?= $row['enrollment_no']; ?></td>
                <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                </td>
                <td><?= $row['contact_no']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['current_semester']; ?></td>
                <td><?= $row['date']; ?></td>
                <td>
                  <?php
                  if ($row['status'] == 1) {
                    ?>
                    <div class="badge badge-success">Active</div>
                    <?php
                  } else {
                    ?>
                    <div class="badge badge-warning">Deactive</div>
                    <?php
                  }
                  ?>
                </td>
                <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
              </tr>
              <?php
              $i++;
            }
            ?>
            <tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>All Form</h4>
        <div class="card-header-form">
          <form>
            <div class="input-group">
            </div>
          </form>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th class="text-center">
                <div class="custom-checkbox custom-checkbox-table custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                    id="checkbox-all">
                  <label>#</label>
                </div>
              </th>
              <th>Form Name</th>
              <th>department</th>
              <th>Semester</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
            <?php
            $queryuser = "select * from form order by id desc limit 3";
            $queryuserprofile = mysqli_query($conn, $queryuser);
            while ($row = mysqli_fetch_array($queryuserprofile)) {
              ?>
              <tr>
                <td class="p-0 text-center">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                  </div>
                </td>
                <td><?= $row['frmname']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['sem']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><a href="show_all_form.php" class="btn btn-outline-primary">Detail</a></td>
              </tr>
              <?php
              $i++;
            }
            ?>
            <tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php
} else if ($d == "faculty") {
  if ($fetch['faculty_roll_id'] == 1) {
    ?>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Faculty Table</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th class="text-center">
                    <div class="custom-checkbox custom-checkbox-table custom-control">
                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                        id="checkbox-all">
                      <label>#</label>
                    </div>
                  </th>
                  <th>Faculty Name</th>
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>Join Date</th>
                  <th>Create Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
                $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                if (!$f == null) {
                  if ($f['department'] == "Computer") {
                    $i = 0;
                    $queryuser1 = "select * from faculty_sub where department='Computer' order by id desc limit 3";
                    $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                    while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                      $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                            <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td><?= $row['faculty_name']; ?></td>
                        <td><?= $row['mobile_number']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['date_of_joining']; ?></td>
                        <td><?= $row['create_date']; ?></td>
                        <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                            <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                            <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                        </td>
                        <td><a href="faculty_list.php" class="btn btn-outline-primary">Detail</a></td>
                      </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "IT") {
                    $i = 0;
                    $queryuser1 = "select * from faculty_sub where department='IT' order by id desc limit 3";
                    $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                    while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                      $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['faculty_name']; ?></td>
                          <td><?= $row['mobile_number']; ?></td>
                          <td><?= $row['email']; ?></td>
                          <td><?= $row['date_of_joining']; ?></td>
                          <td><?= $row['create_date']; ?></td>
                          <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                              <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                              <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                          </td>
                          <td><a href="faculty_list.php" class="btn btn-outline-primary">Detail</a></td>
                        </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Electrical") {
                    $i = 0;
                    $queryuser1 = "select * from faculty_sub where department='Electrical' order by id desc limit 3";
                    $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                    while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                      $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['faculty_name']; ?></td>
                            <td><?= $row['mobile_number']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['date_of_joining']; ?></td>
                            <td><?= $row['create_date']; ?></td>
                            <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                            </td>
                            <td><a href="faculty_list.php" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Mechanical") {
                    $i = 0;
                    $queryuser1 = "select * from faculty_sub where department='Mechanical' order by id desc limit 3";
                    $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                    while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                      $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['faculty_name']; ?></td>
                              <td><?= $row['mobile_number']; ?></td>
                              <td><?= $row['email']; ?></td>
                              <td><?= $row['date_of_joining']; ?></td>
                              <td><?= $row['create_date']; ?></td>
                              <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                  <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                  <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                              </td>
                              <td><a href="faculty_list.php" class="btn btn-outline-primary">Detail</a></td>
                            </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Civil") {
                    $i = 0;
                    $queryuser1 = "select * from faculty_sub where department='Civil' order by id desc limit 3";
                    $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                    while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                      $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['faculty_name']; ?></td>
                                <td><?= $row['mobile_number']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['date_of_joining']; ?></td>
                                <td><?= $row['create_date']; ?></td>
                                <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                    <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                    <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                </td>
                                <td><a href="faculty_list.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "EC") {
                    $i = 0;
                    $queryuser1 = "select * from faculty_sub where department='EC' order by id desc limit 3";
                    $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                    while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                      $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['faculty_name']; ?></td>
                                  <td><?= $row['mobile_number']; ?></td>
                                  <td><?= $row['email']; ?></td>
                                  <td><?= $row['date_of_joining']; ?></td>
                                  <td><?= $row['create_date']; ?></td>
                                  <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                      <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                      <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                  </td>
                                  <td><a href="faculty_list.php" class="btn btn-outline-primary">Detail</a></td>
                                </tr>
                      <?php
                      $i++;
                    }
                  }
                } else {
                  echo "Complite Your Profile";
                }
                ?>
                <tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Student Table</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th class="text-center">
                    <div class="custom-checkbox custom-checkbox-table custom-control">
                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                        id="checkbox-all">
                      <label>#</label>
                    </div>
                  </th>
                  <th>Enrollment No</th>
                  <th>Student Name</th>
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>Department</th>
                  <th>Current Semester</th>
                  <th>Create Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
                if (!$f == null) {
                  if ($f['department'] == "Computer") {
                    $queryuser = "select * from students where department='Computer' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                            <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td><?= $row['enrollment_no']; ?></td>
                        <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                        </td>
                        <td><?= $row['contact_no']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td><?= $row['current_semester']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                            <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                            <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                        </td>
                        <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                      </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "IT") {
                    $queryuser = "select * from students where department='IT' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['enrollment_no']; ?></td>
                          <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                          </td>
                          <td><?= $row['contact_no']; ?></td>
                          <td><?= $row['email']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <td><?= $row['current_semester']; ?></td>
                          <td><?= $row['date']; ?></td>
                          <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                              <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                              <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                          </td>
                          <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                        </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Electrical") {
                    $queryuser = "select * from students where department='Electrical' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['enrollment_no']; ?></td>
                            <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                            </td>
                            <td><?= $row['contact_no']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['current_semester']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                            </td>
                            <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Mechanical") {
                    $queryuser = "select * from students where department='Mechanical' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['enrollment_no']; ?></td>
                              <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                              </td>
                              <td><?= $row['contact_no']; ?></td>
                              <td><?= $row['email']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['current_semester']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                  <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                  <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                              </td>
                              <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                            </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Civil") {
                    $queryuser = "select * from students where department='Civil' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['enrollment_no']; ?></td>
                                <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                </td>
                                <td><?= $row['contact_no']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['current_semester']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                    <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                    <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                </td>
                                <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "EC") {
                    $queryuser = "select * from students where department='EC' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['enrollment_no']; ?></td>
                                  <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                  </td>
                                  <td><?= $row['contact_no']; ?></td>
                                  <td><?= $row['email']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['current_semester']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                      <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                      <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                  </td>
                                  <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                                </tr>
                      <?php
                      $i++;
                    }
                  }
                } else {
                  echo "Complite Your Profile";
                }
                ?>
                <tr>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>All Form</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th class="text-center">
                    <div class="custom-checkbox custom-checkbox-table custom-control">
                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                        id="checkbox-all">
                      <label>#</label>
                    </div>
                  </th>
                  <th>Form Name</th>
                  <th>department</th>
                  <th>Semester</th>
                  <th>Create Date</th>
                  <th>Action</th>
                </tr>
                <?php
                if (!$f == null) {
                  if ($f['department'] == "Computer") {
                    $queryuser = "select * from form where department='Computer' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                            <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td><?= $row['frmname']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td><?= $row['sem']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                      </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "IT") {
                    $queryuser = "select * from students where department='IT' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['frmname']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <td><?= $row['sem']; ?></td>
                          <td><?= $row['date']; ?></td>
                          <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                        </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Electrical") {
                    $queryuser = "select * from students where department='Electrical' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['frmname']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>

                          </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Mechanical") {
                    $queryuser = "select * from students where department='Mechanical' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['frmname']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['sem']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                            </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Civil") {
                    $queryuser = "select * from students where department='Civil' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['frmname']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['sem']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "EC") {
                    $queryuser = "select * from students where department='EC' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['frmname']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['sem']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                                </tr>
                      <?php
                      $i++;
                    }
                  }
                } else {
                  echo "Complite Your Profile";
                }

                ?>
                <tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php
  } else if ($fetch['faculty_roll_id'] == 2) {
    ?>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Student Table</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th class="text-center">
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                          id="checkbox-all">
                        <label>#</label>
                      </div>
                    </th>
                    <th>Enrollment No</th>
                    <th>Student Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Current Semester</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                <?php
                $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                if (!$f == null) {
                  if ($f['department'] == "Computer") {
                    $i = 0;
                    $queryuser = "select * from students where department='Computer' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['enrollment_no']; ?></td>
                          <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                          </td>
                          <td><?= $row['contact_no']; ?></td>
                          <td><?= $row['email']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <td><?= $row['current_semester']; ?></td>
                          <td><?= $row['date']; ?></td>
                          <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                              <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                              <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                          </td>
                          <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                        </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "IT") {
                    $i = 0;
                    $queryuser = "select * from students where department='IT' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['enrollment_no']; ?></td>
                            <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                            </td>
                            <td><?= $row['contact_no']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['current_semester']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                            </td>
                            <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Electrical") {
                    $i = 0;
                    $queryuser = "select * from students where department='Electrical' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['enrollment_no']; ?></td>
                              <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                              </td>
                              <td><?= $row['contact_no']; ?></td>
                              <td><?= $row['email']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['current_semester']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                  <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                  <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                              </td>
                              <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                            </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Mechanical") {
                    $i = 0;
                    $queryuser = "select * from students where department='Mechanical' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['enrollment_no']; ?></td>
                                <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                </td>
                                <td><?= $row['contact_no']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['current_semester']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                    <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                    <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                </td>
                                <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Civil") {
                    $i = 0;
                    $queryuser = "select * from students where department='Civil' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['enrollment_no']; ?></td>
                                  <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                  </td>
                                  <td><?= $row['contact_no']; ?></td>
                                  <td><?= $row['email']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['current_semester']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                      <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                      <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                  </td>
                                  <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                                </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "EC") {
                    $i = 0;
                    $queryuser = "select * from students where department='EC' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                  <tr>
                                    <td class="p-0 text-center">
                                      <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                        <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                      </div>
                                    </td>
                                    <td><?= $row['enrollment_no']; ?></td>
                                    <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                    </td>
                                    <td><?= $row['contact_no']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['department']; ?></td>
                                    <td><?= $row['current_semester']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                        <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                        <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                    </td>
                                    <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                                  </tr>
                      <?php
                      $i++;
                    }
                  }
                } else {
                  echo "Complite Your Profile";
                }
                ?>
                  <tr>
                </table>
              </div>
            </div>
          </div>
        </div>


        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Form</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th class="text-center">
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                          id="checkbox-all">
                        <label>#</label>
                      </div>
                    </th>
                    <th>Form Name</th>
                    <th>department</th>
                    <th>Semester</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                <?php
                if (!$f == null) {
                  if ($f['department'] == "Computer") {
                    $queryuser = "select * from form where department='Computer' and sem='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['frmname']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <td><?= $row['sem']; ?></td>
                          <td><?= $row['date']; ?></td>
                          <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                        </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "IT") {
                    $queryuser = "select * from students where department='IT' and sem='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['frmname']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Electrical") {
                    $queryuser = "select * from students where department='Electrical' and sem='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['frmname']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['sem']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>

                            </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Mechanical") {
                    $queryuser = "select * from students where department='Mechanical' and sem='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['frmname']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['sem']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Civil") {
                    $queryuser = "select * from students where department='Civil' and sem='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['frmname']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['sem']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                                </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "EC") {
                    $queryuser = "select * from students where department='EC' and sem='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                  <tr>
                                    <td class="p-0 text-center">
                                      <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                        <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                      </div>
                                    </td>
                                    <td><?= $row['frmname']; ?></td>
                                    <td><?= $row['department']; ?></td>
                                    <td><?= $row['sem']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                                  </tr>
                      <?php
                      $i++;
                    }
                  }
                } else {
                  echo "Complite Your Profile";
                }

                ?>
                  <tr>
                </table>
              </div>
            </div>
          </div>
        </div>
    <?php
  } else {
    ?>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Form</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th class="text-center">
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                          id="checkbox-all">
                        <label>#</label>
                      </div>
                    </th>
                    <th>Form Name</th>
                    <th>department</th>
                    <th>Semester</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                <?php
                $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                if (!$f == null) {
                  if ($f['department'] == "Computer") {
                    $i = 0;
                    $queryuser = "select * from form where userid='" . $_SESSION['id'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['frmname']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <td><?= $row['sem']; ?></td>
                          <td><?= $row['date']; ?></td>
                          <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                        </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "IT") {
                    $i = 0;
                    $queryuser = "select * from form where userid='" . $_SESSION['id'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['frmname']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Electrical") {
                    $i = 0;
                    $queryuser = "select * from form where userid='" . $_SESSION['id'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['frmname']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['sem']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>

                            </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Mechanical") {
                    $i = 0;
                    $queryuser = "select * from form where userid='" . $_SESSION['id'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['frmname']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['sem']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Civil") {
                    $i = 0;
                    $queryuser = "select * from form where userid='" . $_SESSION['id'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['frmname']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['sem']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                                </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "EC") {
                    $i = 0;
                    $queryuser = "select * from form where userid='" . $_SESSION['id'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                  <tr>
                                    <td class="p-0 text-center">
                                      <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                        <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                      </div>
                                    </td>
                                    <td><?= $row['frmname']; ?></td>
                                    <td><?= $row['department']; ?></td>
                                    <td><?= $row['sem']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td><a href="form_list.php" class="btn btn-outline-primary">Detail</a></td>
                                  </tr>
                      <?php
                      $i++;
                    }
                  }
                } else {
                  echo "Complite Your Profile";
                }

                ?>
                  <tr>
                </table>
              </div>
            </div>
          </div>
        </div>


        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Student Table</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th class="text-center">
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                          id="checkbox-all">
                        <label>#</label>
                      </div>
                    </th>
                    <th>Enrollment No</th>
                    <th>Student Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Current Semester</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                <?php

                if (!$f == null) {
                  if ($f['department'] == "Computer") {

                    $queryuser = "select * from students where department='Computer' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['enrollment_no']; ?></td>
                          <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                          </td>
                          <td><?= $row['contact_no']; ?></td>
                          <td><?= $row['email']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <td><?= $row['current_semester']; ?></td>
                          <td><?= $row['date']; ?></td>
                          <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                              <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                              <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                          </td>
                          <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                        </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "IT") {
                    $queryuser = "select * from students where department='IT' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['enrollment_no']; ?></td>
                            <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                            </td>
                            <td><?= $row['contact_no']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['current_semester']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                            </td>
                            <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Electrical") {
                    $queryuser = "select * from students where department='Electrical' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['enrollment_no']; ?></td>
                              <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                              </td>
                              <td><?= $row['contact_no']; ?></td>
                              <td><?= $row['email']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['current_semester']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                  <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                  <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                              </td>
                              <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                            </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Mechanical") {
                    $queryuser = "select * from students where department='Mechanical' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['enrollment_no']; ?></td>
                                <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                </td>
                                <td><?= $row['contact_no']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['current_semester']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                    <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                    <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                </td>
                                <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "Civil") {
                    $queryuser = "select * from students where department='Civil' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['enrollment_no']; ?></td>
                                  <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                  </td>
                                  <td><?= $row['contact_no']; ?></td>
                                  <td><?= $row['email']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['current_semester']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                      <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                      <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                  </td>
                                  <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                                </tr>
                      <?php
                      $i++;
                    }
                  } else if ($f['department'] == "EC") {
                    $queryuser = "select * from students where department='EC' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                      ?>
                                  <tr>
                                    <td class="p-0 text-center">
                                      <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                        <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                      </div>
                                    </td>
                                    <td><?= $row['enrollment_no']; ?></td>
                                    <td><?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                    </td>
                                    <td><?= $row['contact_no']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['department']; ?></td>
                                    <td><?= $row['current_semester']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                                        <div class="badge badge-success">Active</div>
                          <?php
                          } else {
                            ?>
                                        <div class="badge badge-warning">Deactive</div>
                          <?php
                          }
                          ?>
                                    </td>
                                    <td><a href="student_list.php" class="btn btn-outline-primary">Detail</a></td>
                                  </tr>
                      <?php
                      $i++;
                    }
                  }
                } else {
                  echo "Complite Your Profile";
                }
                ?>
                  <tr>
                </table>
              </div>
            </div>
          </div>
        </div>
    <?php
  }
} else {
  ?>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Form</h4>
          <div class="card-header-form">
            <form>
              <div class="input-group">
              </div>
            </form>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped">
              <tr>
                <th class="text-center">
                  <div class="custom-checkbox custom-checkbox-table custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                      id="checkbox-all">
                    <label>#</label>
                  </div>
                </th>
                <th>Form Name</th>
                <th>department</th>
                <th>Semester</th>
                <th>Create Date</th>
                <th>Action</th>
              </tr>
              <?php
              $f = mysqli_fetch_array(mysqli_query($conn, "select * from students where id='" . $_SESSION['id'] . "'"));
              if (!$f == null) {
                if ($f['department'] == "Computer") {
                  $i = 0;
                  $queryuser = "select * from form where department='Computer' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                  $queryuserprofile = mysqli_query($conn, $queryuser);
                  while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                    <tr>
                      <td class="p-0 text-center">
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                          <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td><?= $row['frmname']; ?></td>
                      <td><?= $row['department']; ?></td>
                      <td><?= $row['sem']; ?></td>
                      <td><?= $row['date']; ?></td>
                      <td><a href="show_all_form.php" class="btn btn-outline-primary">Detail</a></td>
                    </tr>
                    <?php
                    $i++;
                  }
                } else if ($f['department'] == "IT") {
                  $i = 0;
                  $queryuser = "select * from students where department='IT' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                  $queryuserprofile = mysqli_query($conn, $queryuser);
                  while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                            <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td><?= $row['frmname']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td><?= $row['sem']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><a href="show_all_form.php" class="btn btn-outline-primary">Detail</a></td>
                      </tr>
                    <?php
                    $i++;
                  }
                } else if ($f['department'] == "Electrical") {
                  $i = 0;
                  $queryuser = "select * from students where department='Electrical' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                  $queryuserprofile = mysqli_query($conn, $queryuser);
                  while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['frmname']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <td><?= $row['sem']; ?></td>
                          <td><?= $row['date']; ?></td>
                          <td><a href="show_all_form.php" class="btn btn-outline-primary">Detail</a></td>

                        </tr>
                    <?php
                    $i++;
                  }
                } else if ($f['department'] == "Mechanical") {
                  $i = 0;
                  $queryuser = "select * from students where department='Mechanical' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                  $queryuserprofile = mysqli_query($conn, $queryuser);
                  while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['frmname']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="show_all_form.php" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                    <?php
                    $i++;
                  }
                } else if ($f['department'] == "Civil") {
                  $i = 0;
                  $queryuser = "select * from students where department='Civil' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                  $queryuserprofile = mysqli_query($conn, $queryuser);
                  while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['frmname']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['sem']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td><a href="show_all_form.php" class="btn btn-outline-primary">Detail</a></td>
                            </tr>
                    <?php
                    $i++;
                  }
                } else if ($f['department'] == "EC") {
                  $i = 0;
                  $queryuser = "select * from students where department='EC' and current_semester='" . $f['sem'] . "' order by id desc limit 3";
                  $queryuserprofile = mysqli_query($conn, $queryuser);
                  while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['frmname']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['sem']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><a href="show_all_form.php" class="btn btn-outline-primary">Detail</a></td>
                              </tr>
                    <?php
                    $i++;
                  }
                }
              } else {
                echo "Complite Your Profile";
              }

              ?>
              <tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
}
?>
</section>

<?php

include('include/setting.php');
include('include/footer.php');

?>