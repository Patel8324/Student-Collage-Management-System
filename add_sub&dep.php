<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');

if ($d == "student") {
  header('location:login.php');
}

if (isset($_POST['submit'])) {
  $sub_cod = trim($_POST['sub_cod']);
  $sub_name = trim($_POST['sub_name']);
  $department = trim($_POST['department']);
  $sem = trim($_POST['sem']);
  $faculty_id = trim($_POST['faculty_id']);

  if ($d == "faculty") {
    if ($fetch['faculty_roll_id'] != 1) {
      $faculty_id = $_SESSION['id'];
    }
  }

  $query = "insert into faculty_sub set sub_cod='" . $sub_cod . "',sub_name='" . $sub_name . "',department='" . $department . "',faculty_id='" . $faculty_id . "',sem='" . $sem . "'";
  if (mysqli_query($conn, $query)) {
    //copy($temp,"img/products/".$newname);
    echo '<script>alert("Subject and department Add successfully");</script>';
    echo '<script>window.location.href = "sub&dep_list.php";</script>';
  }
}
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Add Subject And department</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-6">
                    <label for="sub_cod">Subject Cod</label>
                    <input id="sub_cod" type="text" class="form-control" name="sub_cod">
                  </div>
                  <div class="form-group col-6">
                    <label for="sub_name">Subject Name</label>
                    <input id="sub_name" type="text" class="form-control" name="sub_name">
                  </div>

                  <?php
                  if ($d == "admin" || $d == "faculty") {
                    if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
                  ?>
                      <div class="form-group col-4">
                      <?php
                    } else {
                      ?>
                        <div class="form-group col-6">
                        <?php
                      }
                    } else {
                        ?>
                        <div class="form-group col-6">
                        <?php
                      }
                        ?>

                        <label>Department</label>
                        <select name="department" class="form-control selectric" required>
                          <option value="Computer">Computer</option>
                          <option value="IT">IT</option>
                          <option value="Electrical">Electrical</option>
                          <option value="Mechanical">Mechanical</option>
                          <option value="Civil">Civil</option>
                          <option value="EC">EC</option>
                        </select>
                        </div>
                        <?php
                        if ($d == "admin" || $d == "faculty") {
                          if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
                        ?>
                            <div class="form-group col-4">
                            <?php
                          } else {
                            ?>
                              <div class="form-group col-6">
                              <?php
                            }
                          } else {
                              ?>
                              <div class="form-group col-6">
                              <?php
                            }
                              ?>

                              <label>Semester</label>
                              <select name="sem" class="form-control selectric" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <?php
                                if ($d == "faculty") {
                                  if ($fetch['faculty_roll_id'] == 1) {
                                ?>
                                    <option value="All">All</option>
                                <?php
                                  }
                                }
                                ?>
                              </select>
                              </div>
                              <?php
                              if ($d == "admin" || $d == "faculty") {
                                if ($d == "admin") {
                              ?>
                                  <div class="form-group col-4">
                                    <label>Faculty Name</label>
                                    <select name="faculty_id" value="<?= $fetch3['sem']; ?>" class="form-control selectric">
                                      <?php
                                      $queryuser = "select * from faculty order by id desc";
                                      $queryuserprofile = mysqli_query($conn, $queryuser);
                                      while ($row = mysqli_fetch_array($queryuserprofile)) {
                                      ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['faculty_name'] ?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                <?php
                                } else if ($fetch['faculty_roll_id'] == 1) {
                                ?>
                                  <div class="form-group col-4">
                                    <label>Faculty Name</label>
                                    <select name="faculty_id" value="<?= $fetch3['sem']; ?>" class="form-control selectric">
                                      <?php
                                      $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                                      if (!$f == null) {
                                        if ($f['department'] == "Computer") {
                                          $i = 0;
                                          $queryuser2 = "select * from faculty_sub where department='Computer' order by id desc";
                                          $queryuserprofile2 = mysqli_query($conn, $queryuser2);
                                          while ($row2 = mysqli_fetch_array($queryuserprofile2)) {
                                            $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row2['faculty_id'] . "'"));
                                      ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['faculty_name'] ?></option>
                                          <?php
                                          }
                                          $i++;
                                          ?>
                                    </select>
                                  </div>
                                  <?php
                                        } else if ($f['department'] == "IT") {
                                          $i = 0;
                                          $queryuser2 = "select * from faculty_sub where department='IT' order by id desc";
                                          $queryuserprofile2 = mysqli_query($conn, $queryuser2);
                                          while ($row2 = mysqli_fetch_array($queryuserprofile2)) {
                                            $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row2['faculty_id'] . "'"));
                                  ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['faculty_name'] ?></option>
                                  <?php
                                          }
                                          $i++;
                                  ?>
                                  </select>
                              </div>
                              <?php
                                        } else if ($f['department'] == "Electrical") {
                                          $i = 0;
                                          $queryuser2 = "select * from faculty_sub where department='Electrical' order by id desc";
                                          $queryuserprofile2 = mysqli_query($conn, $queryuser2);
                                          while ($row2 = mysqli_fetch_array($queryuserprofile2)) {
                                            $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row2['faculty_id'] . "'"));
                              ?>
                                <option value="<?= $row['id'] ?>"><?= $row['faculty_name'] ?></option>
                              <?php
                                          }
                                          $i++;
                              ?>
                              </select>
                            </div>
                            <?php
                                        } else if ($f['department'] == "Mechanical") {
                                          $i = 0;
                                          $queryuser2 = "select * from faculty_sub where department='Mechanical' order by id desc";
                                          $queryuserprofile2 = mysqli_query($conn, $queryuser2);
                                          while ($row2 = mysqli_fetch_array($queryuserprofile2)) {
                                            $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row2['faculty_id'] . "'"));
                            ?>
                              <option value="<?= $row['id'] ?>"><?= $row['faculty_name'] ?></option>
                            <?php
                                          }
                                          $i++;
                            ?>
                            </select>
                        </div>
                        <?php
                                        } else if ($f['department'] == "Civil") {
                                          $i = 0;
                                          $queryuser2 = "select * from faculty_sub where department='Civil' order by id desc";
                                          $queryuserprofile2 = mysqli_query($conn, $queryuser2);
                                          while ($row2 = mysqli_fetch_array($queryuserprofile2)) {
                                            $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row2['faculty_id'] . "'"));
                        ?>
                          <option value="<?= $row['id'] ?>"><?= $row['faculty_name'] ?></option>
                        <?php
                                          }
                                          $i++;
                        ?>
                        </select>
                      </div>
                      <?php
                                        } else if ($f['department'] == "EC") {
                                          $i = 0;
                                          $queryuser2 = "select * from faculty_sub where department='EC' order by id desc";
                                          $queryuserprofile2 = mysqli_query($conn, $queryuser2);
                                          while ($row2 = mysqli_fetch_array($queryuserprofile2)) {
                                            $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row2['faculty_id'] . "'"));
                      ?>
                        <option value="<?= $row['id'] ?>"><?= $row['faculty_name'] ?></option>
              <?php
                                          }
                                          $i++;
                                        }
                                      }
                                    }
                                  }
              ?>
              </select>
                </div>
            </div>
            <div class="row">
              <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" name="submit" type="submit">Submit</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</section>
</div>



<?php

include('include/setting.php');
include('include/footer.php');

?>