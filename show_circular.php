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
            <h4>All Circular</h4>
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
                  <th>Circular Detail</th>
                  <th>Create Date</th>
                  <?php
                  if ($d == "admin" || $d == "faculty") {
                    if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
                  ?>
                      <th>Delete</th>
                  <?php
                    }
                  }
                  ?>
                  <th>Action</th>
                </tr>
                <?php
                $i = 0;
                $queryuser = "select * from circular order by id desc";
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
                    <td><?= $row['detail']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <?php
                    if ($d == "admin" || $d == "faculty") {
                      if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
                    ?>
                        <td>
                          <a href="delete.php?circular_id=<?= $row['id']; ?>">
                            <div class="badge badge-danger">Delete</div>
                          </a>
                        </td>
                    <?php
                      }
                    }
                    ?>
                    <td><a href="<?= $row['circular']; ?>" class="btn btn-outline-primary">Detail</a></td>
                  </tr>
                <?php
                  $i++;
                }
                ?>
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