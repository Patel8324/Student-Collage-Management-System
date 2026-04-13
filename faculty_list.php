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
  if (!$d == "admin" || !$fetch['faculty_roll_id'] == 1) {
    header('location:login.php');
  }
}

?>
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Faculty Table</h4>
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
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                        <label>#</label>
                      </div>
                    </th>
                    <th>Faculty Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Join Date</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                if ($d == "admin") {
                  $i = 0;
                  $queryuser = "select * from faculty order by id desc";
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
                        <td><?= $row['faculty_name']; ?></td>
                        <td><?= $row['mobile_number']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['date_of_joining']; ?></td>
                        <td><?= $row['create_date']; ?></td>
                        <td>
                          <?php
                          if ($row['status'] == 1) {
                          ?>
                            <a href="activate.php?faculty_id=<?= $row['id']; ?>">
                              <div class="badge badge-success">Active</div>
                            </a>
                          <?php
                          } else {
                          ?>
                            <a href="deactivate.php?faculty_id=<?= $row['id']; ?>">
                              <div class="badge badge-warning">Deactivate</div>
                            </a>
                          <?php
                          }
                          ?>
                        </td>
                        <td>
                          <a href="delete.php?faculty_id=<?= $row['id']; ?>">
                            <div class="badge badge-danger">Delete</div>
                          </a>
                        </td>
                        <td><a href="edit_faculty.php?faculty_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                      </tr>
                    </tbody>
                    <?php
                    $i++;
                  }
                } else {
                  $f = mysqli_fetch_array(mysqli_query($conn, "select * from faculty_sub where faculty_id='" . $_SESSION['id'] . "'"));
                  if (!$f == null) {
                    if ($f['department'] == "Computer") {
                      $i = 0;
                      $queryuser1 = "select * from faculty_sub where department='Computer' order by id desc limit 3";
                      $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                      while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                        $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                    ?>
                        <tbody>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['faculty_name']; ?></td>
                            <td><?= $row['mobile_number']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['date_of_joining']; ?></td>
                            <td><?= $row['create_date']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == 1) {
                              ?>
                                <a href="activate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-success">Active</div>
                                </a>
                              <?php
                              } else {
                              ?>
                                <a href="deactivate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-warning">Deactivate</div>
                                </a>
                              <?php
                              }
                              ?>
                            </td>
                            <td>
                              <a href="delete.php?faculty_id=<?= $row['id']; ?>">
                                <div class="badge badge-danger">Delete</div>
                              </a>
                            </td>
                            <td><a href="edit_faculty.php?faculty_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                          </tr>
                        </tbody>
                      <?php
                        $i++;
                      }
                    } else if ($f['department'] == "IT") {
                      $i = 0;
                      $queryuser1 = "select * from faculty_sub where department='IT' order by id desc limit 3";
                      $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                      while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                        $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                        <tbody>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['faculty_name']; ?></td>
                            <td><?= $row['mobile_number']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['date_of_joining']; ?></td>
                            <td><?= $row['create_date']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == 1) {
                              ?>
                                <a href="activate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-success">Active</div>
                                </a>
                              <?php
                              } else {
                              ?>
                                <a href="deactivate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-warning">Deactivate</div>
                                </a>
                              <?php
                              }
                              ?>
                            </td>
                            <td>
                              <a href="delete.php?faculty_id=<?= $row['id']; ?>">
                                <div class="badge badge-danger">Delete</div>
                              </a>
                            </td>
                            <td><a href="edit_faculty.php?faculty_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                          </tr>
                        </tbody>
                      <?php
                        $i++;
                      }
                    } else if ($f['department'] == "Electrical") {
                      $i = 0;
                      $queryuser1 = "select * from faculty_sub where department='Electrical' order by id desc limit 3";
                      $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                      while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                        $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                        <tbody>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['faculty_name']; ?></td>
                            <td><?= $row['mobile_number']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['date_of_joining']; ?></td>
                            <td><?= $row['create_date']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == 1) {
                              ?>
                                <a href="activate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-success">Active</div>
                                </a>
                              <?php
                              } else {
                              ?>
                                <a href="deactivate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-warning">Deactivate</div>
                                </a>
                              <?php
                              }
                              ?>
                            </td>
                            <td>
                              <a href="delete.php?faculty_id=<?= $row['id']; ?>">
                                <div class="badge badge-danger">Delete</div>
                              </a>
                            </td>
                            <td><a href="edit_faculty.php?faculty_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                          </tr>
                        </tbody>
                      <?php
                        $i++;
                      }
                    } else if ($f['department'] == "Mechanical") {
                      $i = 0;
                      $queryuser1 = "select * from faculty_sub where department='Mechanical' order by id desc limit 3";
                      $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                      while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                        $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                        <tbody>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['faculty_name']; ?></td>
                            <td><?= $row['mobile_number']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['date_of_joining']; ?></td>
                            <td><?= $row['create_date']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == 1) {
                              ?>
                                <a href="activate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-success">Active</div>
                                </a>
                              <?php
                              } else {
                              ?>
                                <a href="deactivate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-warning">Deactivate</div>
                                </a>
                              <?php
                              }
                              ?>
                            </td>
                            <td>
                              <a href="delete.php?faculty_id=<?= $row['id']; ?>">
                                <div class="badge badge-danger">Delete</div>
                              </a>
                            </td>
                            <td><a href="edit_faculty.php?faculty_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                          </tr>
                        </tbody>
                      <?php
                        $i++;
                      }
                    } else if ($f['department'] == "Civil") {
                      $i = 0;
                      $queryuser1 = "select * from faculty_sub where department='Civil' order by id desc limit 3";
                      $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                      while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                        $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                        <tbody>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['faculty_name']; ?></td>
                            <td><?= $row['mobile_number']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['date_of_joining']; ?></td>
                            <td><?= $row['create_date']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == 1) {
                              ?>
                                <a href="activate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-success">Active</div>
                                </a>
                              <?php
                              } else {
                              ?>
                                <a href="deactivate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-warning">Deactivate</div>
                                </a>
                              <?php
                              }
                              ?>
                            </td>
                            <td>
                              <a href="delete.php?faculty_id=<?= $row['id']; ?>">
                                <div class="badge badge-danger">Delete</div>
                              </a>
                            </td>
                            <td><a href="edit_faculty.php?faculty_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                          </tr>
                        </tbody>
                      <?php
                        $i++;
                      }
                    } else if ($f['department'] == "EC") {
                      $i = 0;
                      $queryuser1 = "select * from faculty_sub where department='EC' order by id desc limit 3";
                      $queryuserprofile1 = mysqli_query($conn, $queryuser1);
                      while ($row1 = mysqli_fetch_array($queryuserprofile1)) {
                        $row = mysqli_fetch_array(mysqli_query($conn, "select * from faculty where id='" . $row1['faculty_id'] . "'"));
                      ?>
                        <tbody>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['faculty_name']; ?></td>
                            <td><?= $row['mobile_number']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['date_of_joining']; ?></td>
                            <td><?= $row['create_date']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == 1) {
                              ?>
                                <a href="activate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-success">Active</div>
                                </a>
                              <?php
                              } else {
                              ?>
                                <a href="deactivate.php?faculty_id=<?= $row['id']; ?>">
                                  <div class="badge badge-warning">Deactivate</div>
                                </a>
                              <?php
                              }
                              ?>
                            </td>
                            <td>
                              <a href="delete.php?faculty_id=<?= $row['id']; ?>">
                                <div class="badge badge-danger">Delete</div>
                              </a>
                            </td>
                            <td><a href="edit_faculty.php?faculty_id=<?= $row['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                          </tr>
                        </tbody>
                <?php
                        $i++;
                      }
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