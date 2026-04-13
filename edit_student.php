<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

$id = trim($_GET['student_id']);
$fetch1 = mysqli_fetch_array(mysqli_query($conn, "select * from students where id='" . $id . "'"));

include('include/header.php');
include('include/navbar.php');

if (!$d == "admin" || !$d == "faculty") {
  if (!$d == "admin" || !$fetch['faculty_roll_id'] == 1 || !$fetch['faculty_roll_id'] == 2) {
    header('location:login.php');
  }
}

if (isset($_POST['submit'])) {
  $enrollment_no = trim($_POST['enrollment_no']);
  $first_name = trim($_POST['first_name']);
  $middle_name = trim($_POST['middle_name']);
  $last_name = trim($_POST['last_name']);
  $password = ($_POST['password']);
  $department = trim($_POST['department']);
  $admission_year = trim($_POST['admission_year']);
  $current_semester = trim($_POST['current_semester']);
  $email = trim($_POST['email']);
  $contact_no = trim($_POST['contact_no']);

  $query = "update students set enrollment_no='" . $enrollment_no . "',first_name='" . $first_name . "',middle_name='" . $middle_name . "',last_name='" . $last_name . "',password='" . $password . "',department='" . $department . "',admission_year='" . $admission_year . "',current_semester='" . $current_semester . "',email='" . $email . "',contact_no='" . $contact_no . "' where id='" . $id . "'";
  if (mysqli_query($conn, $query)) {
    //copy($temp,"img/products/".$newname);
    echo '<script>alert("Student Update successfully");</script>';
    echo '<script>window.location.href = "student_list.php";</script>';
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
              <h4>Edit Student</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-2">
                    <label for="first_name">Student Sur Name</label>
                    <input id="first_name" type="text" value="<?= $fetch1['first_name']; ?>" class="form-control" name="first_name" required>
                  </div>
                  <div class="form-group col-2">
                    <label for="middle_name">Student Name</label>
                    <input id="middle_name" type="text" value="<?= $fetch1['middle_name']; ?>" class="form-control" name="middle_name" required>
                  </div>
                  <div class="form-group col-2">
                    <label for="last_name">Student Last Name</label>
                    <input id="last_name" type="text" value="<?= $fetch1['last_name']; ?>" class="form-control" name="last_name" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="enrollment_no">Enrollment No</label>
                    <input id="enrollment_no" type="text" max="12" min="12" value="<?= $fetch1['enrollment_no']; ?>" class="form-control" name="enrollment_no" required>
                  </div>
                </div>
                <?php
                if ($d == "admin") {
                ?>
                  <div class="row">
                    <div class="form-group col-2">
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
                } else {
                  ?>
                    <div class="row">
                      <div class="form-group col-2">
                        <label>Department</label>
                        <select name="department" class="form-control selectric" required>
                          <?php
                          $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                          if (!$f == null) {
                            if ($f['department'] == "Computer") {
                          ?>
                              <option value="Computer">Computer</option>
                            <?php
                            }
                            if ($f['department'] == "IT") {
                            ?>
                              <option value="IT">IT</option>
                            <?php
                            }
                            if ($f['department'] == "Electrical") {
                            ?>
                              <option value="Electrical">Electrical</option>
                            <?php
                            }
                            if ($f['department'] == "Mechanical") {
                            ?>
                              <option value="Mechanical">Mechanical</option>
                            <?php
                            }
                            if ($f['department'] == "Civil") {
                            ?>
                              <option value="Civil">Civil</option>
                            <?php
                            }
                            if ($f['department'] == "EC") {
                            ?>
                              <option value="EC">EC</option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    <?php
                  }
                    ?>
                    <div class="form-group col-2">
                      <label>Semester</label>
                      <select name="current_semester" value="<?= $fetch1['current_semester']; ?>" class="form-control selectric" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                    </div>
                    <div class="form-group col-4">
                      <label for="admission_year">Admission Year</label>
                      <input id="admission_year" type="text" value="<?= $fetch1['admission_year']; ?>" class="form-control" name="admission_year" required>
                    </div>
                    <div class="form-group col-4">
                      <label for="password">Password</label>
                      <input id="password" type="text" value="<?= $fetch1['password']; ?>" class="form-control" name="password" required>
                    </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="email">Student E-mail</label>
                        <input id="email" type="email" value="<?= $fetch1['email']; ?>" class="form-control" name="email" required>
                      </div>
                      <div class="form-group col-6">
                        <label for="contact_no">Contact No.</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-phone"></i>
                            </div>
                          </div>
                          <input name="contact_no" type="text" max="10" min="10" value="<?= $fetch1['contact_no']; ?>" class="form-control" require>
                        </div>
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