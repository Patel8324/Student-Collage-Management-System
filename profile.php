<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');

if ($d == "admin") {
  $fetch = mysqli_fetch_array(mysqli_query($conn, "select * from admin where id='" . $_SESSION['id'] . "'"));

  if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "update admin set password='" . $password . "',email='" . $email . "' where id='" . $_SESSION['id'] . "'";

    if (mysqli_query($conn, $query)) {
      //copy($temp,"img/products/".$newname);
      echo '<script>alert("Admin Data Update Successfully");</script>';
      echo '<script>window.location.href = "profile.php";</script>';
    }
  }
} else if ($d == "faculty") {
  $fetch = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $_SESSION['id'] . "'"));

  if (isset($_POST['submit'])) {
    $password = trim($_POST["password"]);
    $address_home = trim($_POST['address_home']);
    $aadharcard_no = trim($_POST['aadharcard_no']);
    $date_of_joining = trim($_POST['date_of_joining']);
    $pancard_no = trim($_POST['pancard_no']);
    $qualification = trim($_POST['qualification']);
    $experience = trim($_POST['experience']);

    $query = "update faculty set password='" . $password . "',address_home='" . $address_home . "',aadharcard_no='" . $aadharcard_no . "',qualification='" . $qualification . "',experience='" . $experience . "',date_of_birth='" . $date_of_birth . "',pancard_no='" . $pancard_no . "' where id='" . $_SESSION['id'] . "'";

    if (mysqli_query($conn, $query)) {
      //copy($temp,"img/products/".$newname);
      echo '<script>alert("Faculty Data Update Successfully");</script>';
      echo '<script>window.location.href = "profile.php";</script>';
    }
  }
} else {
  $fetch = mysqli_fetch_array(mysqli_query($conn, "select * from students where id='" . $_SESSION['id'] . "'"));

  if (isset($_POST['submit'])) {
    $password = trim($_POST['password']);
    $address = trim($_POST['address']);
    $aadharcard_no = trim($_POST['aadharcard_no']);

    $query = "update students set password='" . $password . "',address='" . $address . "',aadharcard_no='" . $aadharcard_no . "' where id='" . $_SESSION['id'] . "'";

    if (mysqli_query($conn, $query)) {
      //copy($temp,"img/products/".$newname);
      echo '<script>alert("Student Data Update Successfully");</script>';
      echo '<script>window.location.href = "profile.php";</script>';
    }
  }
}

?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card author-box">
            <div class="card-body">
              <div class="author-box-center">
                <img alt="image" src="assets/img/users/1.png" class="rounded-circle author-box-picture">
                <div class="clearfix"></div>
                <div class="author-box-name">
                  <?php
                  if ($d == "admin") {
                    $a = mysqli_fetch_array(mysqli_query($conn, "select * from admin where id='" . $_SESSION['id'] . "'"));
                  ?>
                    <a href="#"><?= $a['name']; ?></a>
                  <?php
                  } else if ($d == "faculty") {
                    $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $_SESSION['id'] . "'"));
                  ?>
                    <a href="#"><?= $f['faculty_name']; ?></a>
                  <?php
                  } else {
                    $s = mysqli_fetch_array(mysqli_query($conn, "select * from students where id='" . $_SESSION['id'] . "'"));
                  ?>
                    <a href="#"><?= $s['first_name']; ?>&nbsp&nbsp<?= $s['middle_name']; ?>&nbsp&nbsp<?= $s['last_name']; ?></a>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Personal Details</h4>
            </div>
            <?php
            if ($d == "admin") {
            ?>
              <div class="card-body">
                <div class="py-4">
                  <p class="clearfix">
                    <span class="float-left">
                      E-mail
                    </span>
                    <span class="float-right text-muted">
                      <?= $a['email']; ?>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Password
                    </span>
                    <span class="float-right text-muted">
                      <?= $a['password']; ?>
                    </span>
                  </p>
                <?php
              } else if ($d == "faculty") {
                ?>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Name
                        </span>
                        <span class="float-right text-muted">
                          <?= $f['faculty_name']; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          <?= $f['mobile_number']; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          <?= $f['email']; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Password
                        </span>
                        <span class="float-right text-muted">
                          <?= $f['password']; ?>
                        </span>
                      </p>
                    <?php
                  } else {
                    ?>
                      <div class="card-body">
                        <div class="py-4">
                          <p class="clearfix">
                            <span class="float-left">
                              Enrollment No.
                            </span>
                            <span class="float-right text-muted">
                              <?= $s['enrollment_no']; ?>
                            </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left">
                              Name
                            </span>
                            <span class="float-right text-muted">
                              <?= $s['middle_name']; ?>
                            </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left">
                              Mail
                            </span>
                            <span class="float-right text-muted">
                              <?= $s['email']; ?>
                            </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left">
                              Password
                            </span>
                            <span class="float-right text-muted">
                              <?= $s['password']; ?>
                            </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left">
                              Phone
                            </span>
                            <span class="float-right text-muted">
                              <?= $s['contact_no']; ?>
                            </span>
                          </p>
                        <?php
                      }
                        ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                      <div class="padding-20">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">


                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">About</a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Setting</a>
                          </li>
                        </ul>
                        <?php
                        if ($d == "admin") {
                        ?>
                          <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                              <div class="row">
                                <div class="col-md-3 col-6 b-r">
                                  <strong>Name</strong>
                                  <br>
                                  <p class="text-muted"><?= $a['name']; ?></p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                  <strong>E-mail</strong>
                                  <br>
                                  <p class="text-muted"><?= $a['email']; ?></p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                  <strong>Password</strong>
                                  <br>
                                  <p class="text-muted"><?= $a['password']; ?></p>
                                </div>
                              </div>
                            </div>
                          <?php
                        } else if ($d == "faculty") {
                          ?>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                <div class="row">
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['faculty_name']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['mobile_number']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>E-mail</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['email']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Password</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['password']; ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Qualification</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['qualification']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Experience</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['experience']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Date Of Birth</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['date_of_birth']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Joining</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['date_of_joining']; ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Pancard No.</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['pancard_no']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Aadharcard No.</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['aadharcard_no']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Home Address</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['address_home']; ?></p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Work Address</strong>
                                    <br>
                                    <p class="text-muted"><?= $f['address_work']; ?></p>
                                  </div>
                                </div>
                              </div>
                            <?php
                          } else {
                            ?>
                              <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                  <div class="row">
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Enrollment No.</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['enrollment_no']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Full Name</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['first_name']; ?>&nbsp&nbsp<?= $s['middle_name']; ?>&nbsp&nbsp<?= $s['last_name']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Mobile</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['contact_no']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>E-mail</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['email']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Password</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['password']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Department</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['department']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Admission Year</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['admission_year']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Current Semester</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['current_semester']; ?></p>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3 col-6 b-r">
                                      <strong>Aadharcard No.</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['aadharcard_no']; ?></p>
                                    </div>
                                    <div class="col-md-9 col-6 b-r">
                                      <strong>Address</strong>
                                      <br>
                                      <p class="text-muted"><?= $s['address']; ?></p>
                                    </div>
                                  </div>
                                </div>
                              <?php
                            }
                              ?>
                              <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" class="needs-validation">
                                  <div class="card-header">
                                    <h4>Edit Profile</h4>
                                  </div>
                                  <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data" action="#">
                                      <?php
                                      if ($d == "admin") {
                                      ?>
                                        <div class="row">
                                          <div class="form-group col-md-6 col-12">
                                            <label>E-mail</label>
                                            <input type="text" name="email" class="form-control" value="<?= $a['email']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                          <div class="form-group col-md-6 col-12">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" value="<?= $a['password']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                        </div>
                                      <?php
                                      } else if ($d == "faculty") {
                                      ?>
                                        <div class="row">
                                          <div class="form-group col-md-6 col-12">
                                            <label>Date Of Birth</label>
                                            <input type="date" class="form-control" name="date_of_birth" value="<?= $f['date_of_birth']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                          <div class="form-group col-md-6 col-12">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password" value="<?= $f['password']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6 col-12">
                                            <label>Qualification</label>
                                            <select name="qualification" value="<?= $f['qualification']; ?>" class="form-control selectric">
                                              <option <?php echo ($f['qualification'] =='NULL')?('selected'):(''); ?>>Select Qualification</option>
                                              <option <?php echo ($f['qualification'] =='UG')?('selected'):(''); ?>>UG</option>
                                              <option <?php echo ($f['qualification'] =='PG')?('selected'):(''); ?>>PG</option>
                                              <option <?php echo ($f['qualification'] =='PhD')?('selected'):(''); ?>>UG</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                          <div class="form-group col-md-6 col-12">
                                            <label>Experience Year</label>
                                            <select name="experience" value="<?= $f['experience']; ?>" class="form-control selectric" required>
                                              <option <?php echo ($f['experience'] =='0-12 Months')?('selected'):(''); ?>>0-12 Months</option>
                                              <option <?php echo ($f['experience'] =='1')?('selected'):(''); ?>>1</option>
                                              <option <?php echo ($f['experience'] =='2')?('selected'):(''); ?>>2</option>
                                              <option <?php echo ($f['experience'] =='3')?('selected'):(''); ?>>3</option>
                                              <option <?php echo ($f['experience'] =='4')?('selected'):(''); ?>>4</option>
                                              <option <?php echo ($f['experience'] =='5')?('selected'):(''); ?>>5</option>
                                              <option <?php echo ($f['experience'] =='6')?('selected'):(''); ?>>6</option>
                                              <option <?php echo ($f['experience'] =='7')?('selected'):(''); ?>>7</option>
                                              <option <?php echo ($f['experience'] =='8')?('selected'):(''); ?>>8</option>
                                              <option <?php echo ($f['experience'] =='9')?('selected'):(''); ?>>9</option>
                                              <option <?php echo ($f['experience'] =='10+')?('selected'):(''); ?>>10+</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6 col-12">
                                            <label>Pancard No.</label>
                                            <input type="text" class="form-control" name="pancard_no" value="<?= $f['pancard_no']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                          <div class="form-group col-md-6 col-12">
                                            <label>Aadharcard No.</label>
                                            <input type="text" class="form-control" name="aadharcard_no" value="<?= $f['aadharcard_no']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-12">
                                            <label>Home Address</label>
                                            <textarea class="form-control summernote-simple" type="text" name="address_home"><?php echo $f['address_home']; ?></textarea>
                                          </div>
                                        </div>
                                      <?php
                                      } else {
                                      ?>
                                        <div class="row">
                                          <div class="form-group col-md-6 col-12">
                                            <label>Aadharcard No</label>
                                            <input type="text" class="form-control" name="aadharcard_no" value="<?= $s['aadharcard_no']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                          <div class="form-group col-md-6 col-12">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password" value="<?= $s['password']; ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-12">
                                            <label>Address</label>
                                            <textarea class="form-control summernote-simple" type="text" name="address"><?php echo $s['address']; ?></textarea>
                                          </div>
                                        </div>
                                      <?php
                                      }
                                      ?>
                                      <div class="card-footer text-right">
                                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
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
  <?php

  include('include/setting.php');
  include('include/footer.php');

  ?>