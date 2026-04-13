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
            <h4>All Material</h4>
            <div class="card-header-material">
              <material>
                <div class="input-group">
                </div>
              </material>
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
                  <th>Material Name</th>
                  <th>Department</th>
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
                  $queryuser = "select * from material order by id desc";
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
                      <td><?= $row['mat_name']; ?></td>
                      <td><?= $row['department']; ?></td>
                      <td><?= $row['sem']; ?></td>
                      <td><?= $row['date']; ?></td>
                      <td>
                        <a href="delete.php?material_all_id=<?= $row['id']; ?>">
                          <div class="badge badge-danger">Delete</div>
                        </a>
                      </td>
                      <td><a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Detail</a></td>
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
                        $queryuser = "select * from material where department='Computer' order by id desc";
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
                            <td><?= $row['mat_name']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "IT") {
                        $i = 0;
                        $queryuser = "select * from material where department='IT' order by id desc";
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
                            <td><?= $row['mat_name']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "Electrical") {
                        $i = 0;
                        $queryuser = "select * from material where department='Electrical' order by id desc";
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
                            <td><?= $row['mat_name']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "Mechanical") {
                        $i = 0;
                        $queryuser = "select * from material where department='Mechanical' order by id desc";
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
                            <td><?= $row['mat_name']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "Civil") {
                        $i = 0;
                        $queryuser = "select * from material where department='Civil' order by id desc";
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
                            <td><?= $row['mat_name']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else if ($f['department'] == "EC") {
                        $i = 0;
                        $queryuser = "select * from material where department='EC' order by id desc";
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
                            <td><?= $row['mat_name']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['sem']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Detail</a></td>
                          </tr>
                    <?php
                          $i++;
                        }
                      }
                    }
                  }
                } else {
                  $i = 0;
                  $queryuser = "select * from material where (department='" . $fetch['department'] . "' AND sem='" . $fetch['current_semester'] . "') OR (department='All' OR sem='All') order by id desc";
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
                      <td><?= $row['mat_name']; ?></td>
                      <td><?= $row['department']; ?></td>
                      <td><?= $row['sem']; ?></td>
                      <td><?= $row['date']; ?></td>
                      <td>
                        <a href="<?= $row['material']; ?>" class="btn btn-outline-primary">Material</a>
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