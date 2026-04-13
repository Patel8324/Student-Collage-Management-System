<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');

if ($d == "student") {
  header('location:login.php');
}

?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Subject And Department List</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                  <tr>
                    <th class="text-center">
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all2">
                        <label>#</label>
                      </div>
                    </th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Department</th>
                    <th>Faculty Name</th>
                    <th>Semester</th>
                    <th>Delete</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                if ($d == "admin" || $d == "faculty") {
                  if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
                    $i = 0;
                    $queryuser = "select * from faculty_sub order by id desc";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                ?>
                      <tbody>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['sub_cod']; ?></td>
                          <td><?= $row['sub_name']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <?php
                          $fetch2 = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row['faculty_id'] . "'"));
                          ?>
                          <td><?= $fetch2['faculty_name']; ?></td>
                          <td><?= $row['sem']; ?></td>
                          <td>
                            <a href="delete.php?subdep_id=<?= $row['id']; ?>">
                              <div class="badge badge-danger">Delete</div>
                            </a>
                          </td>
                          <td><a href="edit_sub&dep.php?subdep_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                        </tr>
                      </tbody>
                    <?php
                      $i++;
                    }
                  } else {
                    $i = 0;
                    $queryuser = "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "' order by id desc";
                    $queryuserprofile = mysqli_query($conn, $queryuser);
                    while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                      <tbody>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                              <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $row['sub_cod']; ?></td>
                          <td><?= $row['sub_name']; ?></td>
                          <td><?= $row['department']; ?></td>
                          <?php
                          $fetch2 = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row['faculty_id'] . "'"));
                          ?>
                          <td><?= $fetch2['faculty_name']; ?></td>
                          <td><?= $row['sem']; ?></td>
                          <td>
                            <a href="delete.php?subdep_id=<?= $row['id']; ?>">
                              <div class="badge badge-danger">Delete</div>
                            </a>
                          </td>
                          <td><a href="edit_sub&dep.php?subdep_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                        </tr>
                      </tbody>
                <?php
                      $i++;
                    }
                  }
                }
                ?>
              </table>
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