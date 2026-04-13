<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');


$id = trim($_GET['form_id']);

?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <?php
              $queryuser = mysqli_fetch_array(mysqli_query($conn, "select * from form where id='" . $id . "'"));
              ?>
              <h4>Form Name: <?= $queryuser['frmname']; ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <?php
                      $data = mysqli_fetch_array(mysqli_query($conn, "select * from form_data where formid='" . $id . "'"));
                      if ($data != null) {
                      ?>
                        <th>Action</th>
                        <th>
                          <?php if ($data['txt'] != null) {
                            $stringParts = explode(",", $data['txt']);
                            $stringPart = explode(":", $stringParts[0]);
                            foreach ($stringPart as $file) {
                          ?>
                        <th><?php echo $file; ?></th><?php
                                                  }
                                                }
                                                    ?>
                    </th>
                    <th>
                      <?php
                        if ($data['rdans'] != null) {
                          $stringParts = explode(",", $data['rdans']);
                          $stringPart = explode(":", $stringParts[0]);
                          foreach ($stringPart as $file) {
                      ?>
                    <th><?php echo $file; ?></th><?php
                                              }
                                            }
                                                ?>
                </th>
                <th>
                  <?php
                        if ($data['chans'] != null) {
                          $stringParts = explode(",", $data['chans']);
                          $stringPart = explode(":", $stringParts[0]);
                          foreach ($stringPart as $file) {
                  ?>
                <th><?php echo $file; ?></th><?php
                                          }
                                        }
                                            ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $queryform = "select * from form_data where formid='" . $id . "'";
                        $queryformdata = mysqli_query($conn, $queryform);
                        while ($data = mysqli_fetch_array($queryformdata)) {
                    ?>
                      <tr>
                        <td><a href="delete.php?form_delete_id=<?= $fetch['id']; ?>&formid=<?= $id; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                        <td>
                          <?php
                          if ($data['txt'] != null) {
                            $stringParts = explode(",", $data['txt']);
                            $stringPart = explode(";", $stringParts[1]);
                            foreach ($stringPart as $file) {
                          ?>
                        <td><?php echo $file; ?></td><?php
                                                  }
                                                }
                                                    ?>
                    </td>
                    <td>
                      <?php
                          if ($data['rdans'] != null) {
                            $stringParts = explode(",", $data['rdans']);
                            $stringPart = explode(";", $stringParts[1]);
                            foreach ($stringPart as $file) {
                      ?>
                    <td><?php echo $file; ?></td><?php
                                              }
                                            }
                                                ?>
                </td>
                <td>
                  <?php
                          if ($data['chans'] != null) {
                            $stringParts = explode(",", $data['chans']);
                            $stringPart = explode(";", $stringParts[1]);
                            foreach ($stringPart as $file) {
                  ?>
                <td><?php echo $file; ?></td><?php
                                          }
                                        }
                                            ?>
            </td>
                      </tr>
                  <?php
                        }
                      }
                  ?>
                  </tbody>
                </table>
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