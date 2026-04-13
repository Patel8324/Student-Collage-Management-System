<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');

$id = $_GET['form_id'];
$fetch = mysqli_fetch_array(mysqli_query($conn, "select * from form where id='" . $id . "'"));

if (isset($_POST['submit'])) {
  if ($fetch['txt'] != '') {
    $txt = "";
    $txt = implode(';', $_POST['txt']);
    $htxt = "";
    $htxt = implode(':', $_POST['htxt']);
    $txt = $htxt . ',' . $txt;
  }
  if ($fetch['rdque'] != '') {
    $rdque = "";
    $rdque = implode(';', $_POST['rdque']);
    $hrd = "";
    $hrd = implode(':', $_POST['hrd']);
    $rdque = $hrd . ',' . $rdque;
  }
  if ($fetch['chque'] != '') {
    $chque = "";
    $chque = implode(';', $_POST['chque']);
    $chk = "";
    $chk = implode(':', $_POST['chk']);
    $chque = $chk . ',' . $chque;
  }

  $query = "insert into form_data set userid='" . $fetch['userid'] . "',stdid='" . $_SESSION['id'] . "',formid='" . $fetch['id'] . "',txt='" . $txt . "',rdans='" . $rdque . "',chans='" . $chque . "'";

  $final = mysqli_query($conn, $query);
  if ($final) {
    echo '<script>alert("Data Submitted Successfully");window.location.assign("show_all_form.php")</script>';
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
              <h4>Add Form Data</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <div class="row">
                  <div class="form-group col-12">
                    <label for="frmname">Form Name</label>
                    <input id="frmname" type="text" class="form-control" name="frmname" value="<?= $fetch['frmname']; ?>" readonly>
                  </div>
                </div>

                <?php
                if ($fetch['txt'] != null) {
                  $record = explode(";", $fetch['txt']);
                  foreach ($record as $file) {
                ?>
                    <div class="form-group col-12">
                      <label><?= $file; ?></label>
                      <input type="hidden" value="<?= $file; ?>" name="htxt[]">
                      <input name="txt[]" class="form-control" type="text">

                    </div>
                <?php
                  }
                }
                ?>

                <?php
                if ($fetch['rdque'] != null) {
                  $record = explode(";", $fetch['rdque']);
                  $b = sizeof($record);
                  for ($j = 0; $j < $b; $j++) {
                ?>
                    <div class="form-group col-12">
                      <lable class="d-block"><?= $record[$j]; ?></lable>
                      <input type="hidden" value="<?= $record[$j]; ?>" name="hrd[]<?= $j; ?>">
                      <?php
                      $recor = explode(";", $fetch['rdans']);
                      $a = sizeof($recor);
                      $i = $j;
                      for ($i; $i < $a; $i++) {
                        $reco = explode(",", $recor[$i]);
                        foreach ($reco as $fi) {
                      ?>
                          <div class="form-check">
                            <input name="rdque[]<?= $j; ?>" value="<?= $fi; ?>" class="form-check-input" type="radio" id="rdque[]<?= $j; ?>">
                            <label class="form-check-label" for="exampleRadios1">
                              <?= $fi; ?>
                            </label>
                          </div>
                      <?php
                        }
                        goto b;
                      }
                      b:;
                      $i = 1 + $i;
                      ?>
                    </div>
                <?php
                  }
                }
                ?>


                <?php
                if ($fetch['chque'] != null) {
                  $record = explode(";", $fetch['chque']);
                  $b = sizeof($record);
                  for ($j = 0; $j < $b; $j++) {
                ?>
                    <div class="form-group col-12">
                      <lable class="d-block"><?= $record[$j]; ?></lable>
                      <input type="hidden" value="<?= $record[$j]; ?>" name="chk[]">
                      <?php
                      $recor = explode(";", $fetch['chans']);
                      $a = sizeof($recor);
                      $i = $j;
                      for ($i; $i < $a; $i++) {
                        $reco = explode(",", $recor[$i]);
                        foreach ($reco as $fi) {
                      ?>
                          <div class="form-check">
                            <input name="chque[]" value="<?= $fi; ?>" class="form-check-input" type="checkbox" id="chque[]">
                            <label class="form-check-label" for="defaultCheck1">
                              <?= $fi; ?>
                            </label>
                          </div>
                      <?php
                        }
                        goto a;
                      }
                      a:;
                      $i = 1 + $i;
                      ?>
                    </div>
                <?php
                  }
                }
                ?>

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