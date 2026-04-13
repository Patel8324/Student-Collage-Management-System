<?php
@ob_start();
@session_start();
include('include/config.php');

if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:index.php');
}

include('include/header.php');
include('include/navbar.php');

if (isset($_POST['submit'])) {
  $department = trim($_POST['department']);
  $sem = trim($_POST['sem']);
  $ass_name = trim($_POST['ass_name']);
  $urlspd = "assets/Material/";

  if ($_FILES['news_image']['name'] != '') {
    $filename = $_FILES['news_image']['name'];
    $size = $_FILES['news_image']['size'];
    $temp = $_FILES['news_image']['tmp_name'];
    $type = $_FILES['news_image']['type'];
    $ext = strtolower(end(explode('.', $filename)));
    $extension = array("jpeg", "jpg", "png", "pdf", "docx" , "xlsx");
    $newname = rand() . '.' . $ext;


    if (!in_array($ext, $extension)) {
      echo '<script>alert("please select Jpeg,Jpg,Png,Pdf,Docx");</script>';
      $flag = 0;
    } else
        if ($size > 51200000) {
      echo '<script>alert("please upload below 5mb");</script>';
      $flag = 0;
    } else {
      move_uploaded_file($temp, "assets/Material/" . $newname);

      $flag = 1;
    }
  }

  $result = $urlspd . $newname;
  if ($flag == 1) {
    $query = "insert into material set userid='" . $_SESSION['id'] . "',mat_name='" . $ass_name . "',department='" . $department . "',sem='" . $sem . "',material='" . $result . "'";
    if (mysqli_query($conn, $query)) {
      //copy($temp,"img/products/".$newname);
      echo '<script>alert("Material Create successfully");</script>';
      echo '<script>window.location.href = "show_material.php";</script>';
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
              <h4>Add Material</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-3">
                    <label>Department Name</label>
                    <select name="department" class="form-control selectric">
                      <?php
                      if ($d == "faculty") {
                        $query = "SELECT department FROM faculty_sub Where faculty_id='" . $_SESSION['id'] . "'";
                        $query_run = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($query_run)) {
                          echo "<option value='" . $row['department'] . "'>" . $row['department'] . "</option>";
                        }
                      } else {
                      ?>
                        <option value="All">All</option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-3">
                    <label>Select Semester</label>
                    <select name="sem" class="form-control selectric">
                      <?php
                      if ($d == "faculty") {
                        $query = "SELECT sem FROM faculty_sub Where faculty_id='" . $_SESSION['id'] . "'";
                        $query_run = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($query_run)) {
                          echo "<option value='" . $row['sem'] . "'>" . $row['sem'] . "</option>";
                        }
                      } else {
                      ?>
                        <option value="All">All</option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="frmname">Material Name</label>
                    <input id="frmname" type="text" class="form-control" name="ass_name" required>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Material</label>
                  <div class="col-sm-12 col-md-7">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload">Choose File</label>
                      <input type="file" name="news_image"/>
                    </div>
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

<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/summernote/summernote-bs4.js"></script>
<script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
<?php

include('include/setting.php');
include('include/footer.php');

?>