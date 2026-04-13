<?php
@ob_start();
@session_start();
include('include/config.php');

if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:index.php');
}

include('include/header.php');
include('include/navbar.php');

$id = $_GET['assignment_id'];
$fetch = mysqli_fetch_array(mysqli_query($conn, "select * from assignment where id='" . $id . "'"));


if (isset($_POST['submit'])) {
  $ass_name = trim($_POST['ass_name']);
  $urlspd = "assets/Assignment/";

  if ($_FILES['news_image']['name'] != '') {
    $filename = $_FILES['news_image']['name'];
    $size = $_FILES['news_image']['size'];
    $temp = $_FILES['news_image']['tmp_name'];
    $type = $_FILES['news_image']['type'];
    $ext = strtolower(end(explode('.', $filename)));
    $extension = array("jpeg", "jpg", "png", "pdf", "docx");
    $newname = rand() . '.' . $ext;


    if (!in_array($ext, $extension)) {
      echo '<script>alert("please select Jpeg,Jpg,Png,Pdf,Docx");</script>';
      $flag = 0;
    } else
        if ($size > 51200000) {
      echo '<script>alert("please upload below 5mb");</script>';
      $flag = 0;
    } else {
      move_uploaded_file($temp, "assets/Assignment/" . $newname);

      $flag = 1;
    }
  }

  $result = $urlspd . $newname;
  if ($flag == 1) {
    $query = "insert into assignment_data set stdid='" . $_SESSION['id'] . "',assid='" . $fetch['id'] . "',userid='" . $fetch['userid'] . "',assignment='" . $result . "'";
    if (mysqli_query($conn, $query)) {
      //copy($temp,"img/products/".$newname);
      echo '<script>alert("Assignment Add successfully");</script>';
      echo '<script>window.location.href = "show_all_ass.php";</script>';
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
              <h4>Add Assignment</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-12">
                    <label for="frmname">Assignment Name</label>
                    <input id="frmname" type="text" class="form-control" name="ass_name" value="<?= $fetch['ass_name'] ?>" readonly>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assignment</label>
                  <div class="col-sm-12 col-md-7">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="news_image" id="image-upload" />
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
<?php

include('include/setting.php');
include('include/footer.php');

?>