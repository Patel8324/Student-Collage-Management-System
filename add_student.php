<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');

if ($d != "admin" && $d != "faculty") {
  header('location:login.php');
  exit;
}

if (isset($_POST['submit'])) {

  $first_name = trim($_POST['first_name']);
  $middle_name = trim($_POST['middle_name']);
  $last_name = trim($_POST['last_name']);
  $error = "";
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $contact_no = trim($_POST['contact_no']);
  $enrollment_no = trim($_POST['enrollment_no']);
  // Enrollmenr_no
  if (empty($enrollment_no)) {
    $error = "Enrollment number is required";
  } elseif (!preg_match("/^[0-9]{12}$/", $enrollment_no)) {
    $error = "Enrollment number must be 12 digits";
  }

  //Email
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format";
  }

  // Password
  elseif (strlen($password) < 8) {
    $error = "Password must be at least 8 characters long";
  } elseif (!preg_match("/[A-Z]/", $password)) {
    $error = "Password must contain at least one uppercase letter";
  } elseif (!preg_match("/[a-z]/", $password)) {
    $error = "Password must contain at least one lowercase letter";
  } elseif (!preg_match("/[0-9]/", $password)) {
    $error = "Password must contain at least one number";
  } elseif (!preg_match("/[\W]/", $password)) {
    $error = "Password must contain at least one special character";
  }
  // Contact No
  elseif (empty($contact_no)) {
    $error = "Mobile number is required";
  } elseif (!preg_match("/^[0-9]{10}$/", $contact_no)) {
    $error = "Mobile number must be exactly 10 digits";
  }
  if ($error != "") {
    echo "<script>alert('$error');</script>";
  } else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $department = trim($_POST['department']);
    $admission_year = trim($_POST['admission_year']);
    $current_semester = trim($_POST['current_semester']);




    $ucount = mysqli_num_rows(mysqli_query($conn, "select enrollment_no from students where  enrollment_no='" . $enrollment_no . "'"));

    if ($ucount >= 1) {
      echo '<script>alert("Student Already Registered Please Check Enrollment No");</script>';
      //echo '<script>window.location.href = "add_Student.php";</script>';
    } else {
      $query = "insert into students set enrollment_no='" . $enrollment_no . "',first_name='" . $first_name . "',middle_name='" . $middle_name . "',last_name='" . $last_name . "',password='" . $hashed_password . "',department='" . $department . "',admission_year='" . $admission_year . "',current_semester='" . $current_semester . "',email='" . $email . "',contact_no='" . $contact_no . "'";
      if (mysqli_query($conn, $query)) {
        //copy($temp,"img/products/".$newname);
        echo '<script>alert("Student Registered successfully");</script>';
        echo '<script>window.location.href = "student_list.php";</script>';
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
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
              <h3>Add Student</h3>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-2">
                    <label for="first_name">Student <label style="color:red;"> First Name </label></label>
                    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="F-Name"
                      required>
                  </div>
                  <div class="form-group col-2">
                    <label for="middle_name">Student <label style="color:red;"> Middle Name </label></label>
                    <input id="middle_name" type="text" class="form-control" name="middle_name" placeholder="M-Name"
                      required>
                  </div>
                  <div class="form-group col-2">
                    <label for="last_name">Student <label style="color:red;">Last Name</label> </label>
                    <input id="last_name" type="text" class="form-control" name="last_name" placeholder="L-Name"
                      required>
                  </div>
                  <div class="form-group col-2">
                    <label for="enrollment_no">Enrollment No <label style="color:red;"> (12 digits)</label></label>
                    <input id="enrollment_no" type="text" maxlength="12" class="form-control" name="enrollment_no"
                      placeholder="2024XXXXXX78" required>
                  </div>
                  <div class="form-group col-3">
                    <label for="admission_year">Admission Year <label style="color:red;"> (4 digits)</label></label>
                    <input id="admission_year" type="text" class="form-control" maxlength="4" name="admission_year"
                      placeholder="2X24" required>
                  </div>
                </div>

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

                  <div class="form-group col-2">
                    <label>Semester</label>
                    <select name="current_semester" class="form-control selectric" required>
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


                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="email">Student E-mail <label style="color:red;"> (@gmail.com)</label> </label>
                    </label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Enter your Email"
                      required>
                  </div>
                  <div class="form-group col-5">
                    <label for="password">Password <label style="color:red;">
                        (Password must be 8+ chars, include uppercase, lowercase, number & special character)
                      </label></label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                      required>
                  </div>
                  <div class="form-group col-6">
                    <label for="contact_no">Contact No. <label style="color:red;"> (10 digits)</label></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-phone"></i>
                        </div>
                      </div>
                      <input name="contact_no" type="text" maxlength="10" class="form-control" placeholder="99XXX XXX24"
                        required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="submit" type="submit">Submit</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
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