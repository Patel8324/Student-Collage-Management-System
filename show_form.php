<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');

?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>All Form</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th class="text-center">
                    <div class="custom-checkbox custom-checkbox-table custom-control">
                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                      <label>#</label>
                    </div>
                  </th>
                  <th>Form Name</th>
                  <th>department</th>
                  <th>Semester</th>
                  <th>Create Date</th>
                  <th>Delete</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
                <?php
                $i = 0;
                $queryuser = "select * from form where userid='" . $_SESSION['id'] . "' order by id desc";
                $queryuserprofile = mysqli_query($conn, $queryuser);
                while ($row = mysqli_fetch_array($queryuserprofile)) {
                ?>
                  <tr>
                    <td class="p-0 text-center">
                      <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                        <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                      </div>
                    </td>
                    <td><?= $row['frmname']; ?></td>
                    <td><?= $row['department']; ?></td>
                    <td><?= $row['sem']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td>
                      <a href="delete.php?form_id=<?= $row['id']; ?>">
                        <div class="badge badge-danger">Delete</div>
                      </a>
                    </td>
                    <td><a href="show_detail.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Detail</a></td>
                    <td><a href="show_data.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Data</a></td>
                  </tr>
                <?php
                  $i++;
                }
                ?>
                <tr>
              </table>
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