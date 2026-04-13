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
  if (!$d == "admin" || !$fetch['faculty_roll_id'] == 1 || !$fetch['faculty_roll_id'] == 2) {
    header('location:login.php');
  }
}

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
                  <?php
                  if ($d == "admin") {
                  ?>
                    <th>Delete</th>
                  <?php
                  }
                  ?>
                  <th>Action</th>
                </tr>
                <?php
                if ($d == "admin") {
                  $i = 0;
                  $queryuser = "select * from form order by id desc";
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
                    </tr>
                    <?php
                    $i++;
                  }
                } else if ($d == "faculty") {
                  if ($fetch['faculty_roll_id'] == 1 || $fetch['faculty_roll_id'] == 2) {
                    $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                    if (!$f == null) {
                      if ($f['department'] == "Computer") {
                        $i = 0;
                        $queryuser = "select * from form where department='Computer' order by id desc";
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
                            <td><a href="show_detail.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "IT") {
                        $i = 0;
                        $queryuser = "select * from form where department='IT' order by id desc";
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
                            <td><a href="show_detail.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "Electrical") {
                        $i = 0;
                        $queryuser = "select * from form where department='Electrical' order by id desc";
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
                            <td><a href="show_detail.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "Mechanical") {
                        $i = 0;
                        $queryuser = "select * from form where department='Mechanical' order by id desc";
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
                            <td><a href="show_detail.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "Civil") {
                        $i = 0;
                        $queryuser = "select * from form where department='Civil' order by id desc";
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
                            <td><a href="show_detail.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "EC") {
                        $i = 0;
                        $queryuser = "select * from form where department='EC' order by id desc";
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
                            <td><a href="show_detail.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                    <?php
                          $i++;
                        }
                      }
                    }
                  }
                } else {
                  $i = 0;
                  $queryuser = "select * from form where (department='" . $fetch['department'] . "' AND sem='" . $fetch['current_semester'] . "') OR (department='All' OR sem='All') order by id desc";
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
                        <?php
                        $que = mysqli_fetch_array(mysqli_query($conn, "select * from form_data where formid='" . $row['id'] . "' AND stdid='" . $_SESSION['id'] . "'"));
                        if ($que != null) {
                        ?>
                          <a href="#" class="btn btn-outline-primary">Add Data</a>
                        <?php
                        } else {
                        ?>
                          <a href="form_add_data.php?form_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Add Data</a>
                        <?php
                        }
                        ?>
                      </td>
                    </tr>
                <?php
                    $i++;
                  }
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