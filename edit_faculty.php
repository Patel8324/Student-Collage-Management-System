<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');

if (!$d == "admin" || !$d == "faculty") {
  if (!$d == "admin" || !$fetch['faculty_roll_id'] == 1) {
    header('location:login.php');
  }
}

$id = trim($_GET['faculty_id']);
$fetch = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $id . "'"));

if (isset($_POST['submit'])) {
  $faculty_name = trim($_POST['faculty_name']);
  $email = trim($_POST['email']);
  $password = ($_POST["password"]);
  $contact_no = trim($_POST['contact_no']);
  $work_address = trim($_POST['work_address']);
  $date_of_joining = trim($_POST['date_of_joining']);
  $pos = trim($_POST['pos']);

  $query = "update faculty set faculty_name='" . $faculty_name . "',email='" . $email . "',password='" . $password . "',mobile_number='" . $contact_no . "',address_work='" . $work_address . "',date_of_joining='" . $date_of_joining . "',faculty_roll_id='" . $pos . "' where id='" . $id . "'";
  if (mysqli_query($conn, $query)) {
    //copy($temp,"img/products/".$newname);
    echo '<script>alert("Faculty Edit successfully");</script>';
    echo '<script>window.location.href = "faculty_list.php";</script>';
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
              <h4>Edit Faculty</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Faculty Name (Sur Name - Middle Name - Last Name)</label>
                    <input type="text" name="faculty_name" value="<?= $fetch['faculty_name']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group col-6">
                    <label>Select Pos</label>
                    <select name="pos" class="form-control" required>
                      <?php
                      if ($d == "admin") {
                      ?>
                      <option <?php echo ($fetch['faculty_roll_id'] =='1')?('selected'):(''); ?>>HOD</option>
                      <?php
                      }
                      ?>
                      <option <?php echo ($fetch['faculty_roll_id'] =='2')?('selected'):(''); ?>>Class Cordinater</option>
                      <option <?php echo ($fetch['faculty_roll_id'] =='3')?('selected'):(''); ?>>Faculty</option>
                      <!--<option value="2">Class Cordinater</option>
                      <option value="3">Faculty</option>-->
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>E-mail</label>
                    <input name="email" value="<?= $fetch['email']; ?>" type="email" class="form-control" required>
                  </div>
                  <div class="form-group col-6">
                    <label>Password</label>
                    <input name="password" value="<?= $fetch['password']; ?>" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Phone Number</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-phone"></i>
                        </div>
                      </div>
                      <input name="contact_no" max="10" min="10" value="<?= $fetch['mobile_number']; ?>" type="text" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label>Date of Joining</label>
                    <input name="date_of_joining" type="date" value="<?= $fetch['date_of_joining']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="work_address">Work Address</label>
                    <textarea id="work_address" type="text" value="<?= $fetch['address_work']; ?>" class="form-control" name="work_address" required></textarea>
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