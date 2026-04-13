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
  $t = count($_POST['txt']);
  $r = count($_POST['rdque']);
  $c = count($_POST['chque']);
  $frmname = trim($_POST['frmname']);

  if ($t > 0) {
    if (trim($_POST['txt'] != '')) {
      $txt = join(";", $_POST["txt"]);
    }
    //echo "Data inserted successfully";
  }

  if ($r > 0) {
    if (trim($_POST['rdque'] != '') && trim($_POST['rdans'] != '')) {
      $rdque = join(";", $_POST["rdque"]);
      $rdans = join(";", $_POST["rdans"]);
    }
    //echo "Data inserted successfully";
  }

  if ($c > 0) {
    if (trim($_POST['chque'] != '') && trim($_POST['chans'] != '')) {
      $chque = join(";", $_POST["chque"]);
      $chans = join(";", $_POST["chans"]);
    }
    //echo "Data inserted successfully";
  }


  $query = "insert into form set userid='" . $_SESSION['id'] . "',frmname='" . $frmname . "',txt='" . $txt . "',rdque='" . $rdque . "',rdans='" . $rdans . "',chque='" . $chque . "',chans='" . $chans . "',department='" . $department . "',sem='" . $sem . "'";


  $final = mysqli_query($conn, $query);
  if ($final) {
    echo '<script>alert("Form Create Successfully");window.location.assign("show_form.php")</script>';
  } else {

    echo '<script>alert("error")</script>';
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
              <h4>Create Form</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-3">
                    <label>department Name</label>
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
                    <label for="frmname">Form Name</label>
                    <input id="frmname" type="text" class="form-control" name="frmname" required>
                  </div>
                </div>

                <div class="row">
                  <table class="table table-bordered table-hover" id="add_more_visitor_one">
                    <th>Textbox</th>
                    <th>Add/Delete</th>
                    <tr>
                      <td><input type="text" name="txt[]" placeholder="Enter your Que" class="form-control name_list" /></td>
                      <td><button type="button" name="add_one" id="add_one" class="btn btn-primary">Add More</button></td>
                    </tr>

                  </table>



                  <table class="table table-bordered table-hover" id="add_more_visitor2">
                    <th>Radio Button Question</th>
                    <th>Radio Button Answer</th>
                    <th>Add/Delete</th>
                    <tr>
                      <td><input type="text" name="rdque[]" placeholder="Enter your Que" class="form-control name_list" /></td>
                      <td><input type="text" name="rdans[]" placeholder="Enter your Ans" class="form-control" /></td>
                      <td><button type="button" name="add2" id="add2" class="btn btn-primary">Add More</button></td>
                    </tr>
                  </table>




                  <table class="table table-bordered table-hover" id="add_more_visitor3">
                    <th>Checkbox Button Question</th>
                    <th>Checkbox Button Answer</th>
                    <th>Add/Delete</th>
                    <tr>
                      <td><input type="text" name="chque[]" placeholder="Enter your Que" class="form-control name_list" /></td>
                      <td><input type="text" name="chans[]" placeholder="Enter your Ans" class="form-control" /></td>
                      <td><button type="button" name="add3" id="add3" class="btn btn-primary">Add More</button></td>
                    </tr>
                  </table>
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
<!-- for textbox -->
<script type="text/javascript">
  $(document).ready(function() {

    var i = 100000;

    $("#add_one").click(function() {
      i++;
      $('#add_more_visitor_one').append('<tr id="row' + i + '"><td><input type="text" name="txt[]" placeholder="Enter your Que" class="form-control name_list"/></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>

<!-- for Radio -->
<script type="text/javascript">
  $(document).ready(function() {

    var j = 50000;

    $("#add2").click(function() {
      j++;
      $('#add_more_visitor2').append('<tr id="row' + j + '"><td><input type="text" name="rdque[]" placeholder="Enter your Que" class="form-control name_list"/></td><td><input type="text" name="rdans[]" placeholder="Enter your Ans" class="form-control"/></td><td><button type="button" name="remove" id="' + j + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>


<!-- for checkbox -->
<script type="text/javascript">
  $(document).ready(function() {

    var k = 1;

    $("#add3").click(function() {
      k++;
      $('#add_more_visitor3').append('<tr id="row' + k + '"><td><input type="text" name="chque[]" placeholder="Enter your Que" class="form-control name_list"/></td><td><input type="text" name="chans[]" placeholder="Enter your Ans" class="form-control"/></td><td><button type="button" name="remove" id="' + k + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>
</body>


<!-- create-post.html  21 Nov 2019 04:05:03 GMT -->

</html>

<?php

include('include/setting.php');
include('include/footer.php');

?>