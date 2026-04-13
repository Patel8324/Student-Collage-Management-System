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
  $faculty_name = trim($_POST['faculty_name']);
  $error = "";
  $email = trim($_POST['email']);
  $password = ($_POST["password"]);
  $contact_no = trim($_POST['contact_no']);

  //Email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
  }


  $work_address = trim($_POST['work_address']);
  $date_of_joining = trim($_POST['date_of_joining']);
  $pos = trim($_POST['pos']);

  $ucount = mysqli_num_rows(mysqli_query($conn, "select mobile_number from faculty where  mobile_number='" . $contact_no . "'"));

  if ($ucount >= 1) {
    echo '<script>alert("Faculty Already Registered Please Check Contact No");</script>';
    //echo '<script>window.location.href = "add_faculty.php";</script>';
  } else {


    $query = "insert into faculty set faculty_name='" . $faculty_name . "',email='" . $email . "',password='" . $hashed_password . "',mobile_number='" . $contact_no . "',address_work='" . $work_address . "',date_of_joining='" . $date_of_joining . "',faculty_roll_id='" . $pos . "'";
    if (mysqli_query($conn, $query)) {
      //copy($temp,"img/products/".$newname);
      echo '<script>alert("Faculty Registered successfully");</script>';
      echo '<script>window.location.href = "faculty_list.php";</script>';
    } else {
      echo "Error: " . mysqli_error($conn);
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
              <h3>Add Faculty</h3>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Faculty Name <label style="color:red;">(First Name - Middle Name - Last Name)</label></label>
                    <input type="text" name="faculty_name" class="form-control" placeholder="Name" required>
                  </div>
                  <div class="form-group col-6">
                    <label>Select position <label style="color:red;"> * </label></label>
                    <select name="pos" class="form-control" required>
                      <?php
                      if ($d == "admin") {
                        ?>
                        <option value="1">HOD</option>
                        <?php
                      }
                      ?>
                      <option value="2">Class Cordinater</option>
                      <option value="3">Faculty</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>E-mail <label style="color:red;"> (@gmail.com)</label></label>
                    <input name="email" type="email" class="form-control" placeholder="Enter your Email" required>
                  </div>
                  <div class="form-group col-6">
                    <label>Password <label style="color:red;">
                        (Password must be 8+ chars, include uppercase, lowercase, number & special character)
                      </label></label>
                    <input name="password" type="text" class="form-control" placeholder="Password" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Phone Number <label style="color:red;"> (10 digits)</label></label>
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
                  <div class="form-group col-6">
                    <label>Date of Joining <label style="color:red;"> * </label></label>
                    <input name="date_of_joining" type="date" class="form-control" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="work_address">Work Address</label>
                    <textarea id="work_address" type="text" class="form-control" name="work_address"
                      required></textarea>
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