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
            <h4>Student Table</h4>
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
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                          class="custom-control-input" id="checkbox-all2">
                        <label>#</label>
                      </div>
                    </th>
                    <th>Enrollment No</th>
                    <th>Student Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Current Semester</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                $i = 0;
                if ($d == "admin") {
                  $queryuser = "select * from students order by id desc";
                  $queryuserprofile = mysqli_query($conn, $queryuser);
                  while ($row = mysqli_fetch_array($queryuserprofile)) {
                    ?>
                    <tbody>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                              id="checkbox-<?= $i ?>">
                            <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td><?= $row['enrollment_no']; ?></td>
                        <td>
                          <?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['last_name']; ?>
                        </td>
                        <td><?= $row['contact_no']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td><?= $row['current_semester']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td>
                          <?php
                          if ($row['status'] == 1) {
                            ?>
                            <a href="activate.php?student_id=<?= $row['id']; ?>">
                              <div class="badge badge-success">Active</div>
                            </a>
                            <?php
                          } else {
                            ?>
                            <a href="deactivate.php?student_id=<?= $row['id']; ?>">
                              <div class="badge badge-warning">Deactive</div>
                            </a>
                            <?php
                          }
                          ?>
                        </td>
                        <td>
                          <a href="delete.php?student_id=<?= $row['id']; ?>">
                            <div class="badge badge-danger">Delete</div>
                          </a>
                        </td>
                        <td><a href="edit_student.php?student_id=<?= $row['id']; ?>"
                            class="btn btn-outline-primary">Edit</a></td>
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
                      $queryuser = "select * from students where department='Computer' order by id desc";
                      $queryuserprofile = mysqli_query($conn, $queryuser);
                      while ($row = mysqli_fetch_array($queryuserprofile)) {
                        ?>
                        <tbody>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                  id="checkbox-<?= $i ?>">
                                <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $row['enrollment_no']; ?></td>
                            <td>
                              <?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                            </td>
                            <td><?= $row['contact_no']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['current_semester']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td>
                              <?php
                              if ($row['status'] == 1) {
                                ?>
                                <a href="activate.php?student_id=<?= $row['id']; ?>">
                                  <div class="badge badge-success">Active</div>
                                </a>
                                <?php
                              } else {
                                ?>
                                <a href="deactivate.php?student_id=<?= $row['id']; ?>">
                                  <div class="badge badge-warning">Deactive</div>
                                </a>
                                <?php
                              }
                              ?>
                            </td>
                            <td>
                              <a href="delete.php?student_id=<?= $row['id']; ?>">
                                <div class="badge badge-danger">Delete</div>
                              </a>
                            </td>
                            <td><a href="edit_student.php?student_id=<?= $row['id']; ?>"
                                class="btn btn-outline-primary">Edit</a></td>
                          </tr>
                        </tbody>
                        <?php
                        $i++;
                      }
                    } else if ($f['department'] == "IT") {
                      $i = 0;
                      $queryuser = "select * from students where department='IT' order by id desc";
                      $queryuserprofile = mysqli_query($conn, $queryuser);
                      while ($row = mysqli_fetch_array($queryuserprofile)) {
                        ?>
                          <tbody>
                            <tr>
                              <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                    id="checkbox-<?= $i ?>">
                                  <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $row['enrollment_no']; ?></td>
                              <td>
                              <?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                              </td>
                              <td><?= $row['contact_no']; ?></td>
                              <td><?= $row['email']; ?></td>
                              <td><?= $row['department']; ?></td>
                              <td><?= $row['current_semester']; ?></td>
                              <td><?= $row['date']; ?></td>
                              <td>
                                <?php
                                if ($row['status'] == 1) {
                                  ?>
                                  <a href="activate.php?student_id=<?= $row['id']; ?>">
                                    <div class="badge badge-success">Active</div>
                                  </a>
                                <?php
                                } else {
                                  ?>
                                  <a href="deactivate.php?student_id=<?= $row['id']; ?>">
                                    <div class="badge badge-warning">Deactive</div>
                                  </a>
                                <?php
                                }
                                ?>
                              </td>
                              <td>
                                <a href="delete.php?student_id=<?= $row['id']; ?>">
                                  <div class="badge badge-danger">Delete</div>
                                </a>
                              </td>
                              <td><a href="edit_student.php?student_id=<?= $row['id']; ?>"
                                  class="btn btn-outline-primary">Edit</a></td>
                            </tr>
                          </tbody>
                          <?php
                          $i++;
                      }
                    } else if ($f['department'] == "Electrical") {
                      $i = 0;
                      $queryuser = "select * from students where department='Electrical' order by id desc";
                      $queryuserprofile = mysqli_query($conn, $queryuser);
                      while ($row = mysqli_fetch_array($queryuserprofile)) {
                        ?>
                            <tbody>
                              <tr>
                                <td class="p-0 text-center">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                      id="checkbox-<?= $i ?>">
                                    <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td><?= $row['enrollment_no']; ?></td>
                                <td>
                              <?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                </td>
                                <td><?= $row['contact_no']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <td><?= $row['current_semester']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td>
                                <?php
                                if ($row['status'] == 1) {
                                  ?>
                                    <a href="activate.php?student_id=<?= $row['id']; ?>">
                                      <div class="badge badge-success">Active</div>
                                    </a>
                                <?php
                                } else {
                                  ?>
                                    <a href="deactivate.php?student_id=<?= $row['id']; ?>">
                                      <div class="badge badge-warning">Deactive</div>
                                    </a>
                                <?php
                                }
                                ?>
                                </td>
                                <td>
                                  <a href="delete.php?student_id=<?= $row['id']; ?>">
                                    <div class="badge badge-danger">Delete</div>
                                  </a>
                                </td>
                                <td><a href="edit_student.php?student_id=<?= $row['id']; ?>"
                                    class="btn btn-outline-primary">Edit</a></td>
                              </tr>
                            </tbody>
                          <?php
                          $i++;
                      }
                    } else if ($f['department'] == "Mechanical") {
                      $i = 0;
                      $queryuser = "select * from students where department='Mechanical' order by id desc";
                      $queryuserprofile = mysqli_query($conn, $queryuser);
                      while ($row = mysqli_fetch_array($queryuserprofile)) {
                        ?>
                              <tbody>
                                <tr>
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                        id="checkbox-<?= $i ?>">
                                      <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td><?= $row['enrollment_no']; ?></td>
                                  <td>
                              <?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                  </td>
                                  <td><?= $row['contact_no']; ?></td>
                                  <td><?= $row['email']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['current_semester']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td>
                                <?php
                                if ($row['status'] == 1) {
                                  ?>
                                      <a href="activate.php?student_id=<?= $row['id']; ?>">
                                        <div class="badge badge-success">Active</div>
                                      </a>
                                <?php
                                } else {
                                  ?>
                                      <a href="deactivate.php?student_id=<?= $row['id']; ?>">
                                        <div class="badge badge-warning">Deactive</div>
                                      </a>
                                <?php
                                }
                                ?>
                                  </td>
                                  <td>
                                    <a href="delete.php?student_id=<?= $row['id']; ?>">
                                      <div class="badge badge-danger">Delete</div>
                                    </a>
                                  </td>
                                  <td><a href="edit_student.php?student_id=<?= $row['id']; ?>"
                                      class="btn btn-outline-primary">Edit</a></td>
                                </tr>
                              </tbody>
                          <?php
                          $i++;
                      }
                    } else if ($f['department'] == "Civil") {
                      $i = 0;
                      $queryuser = "select * from students where department='Civil' order by id desc";
                      $queryuserprofile = mysqli_query($conn, $queryuser);
                      while ($row = mysqli_fetch_array($queryuserprofile)) {
                        ?>
                                <tbody>
                                  <tr>
                                    <td class="p-0 text-center">
                                      <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                          id="checkbox-<?= $i ?>">
                                        <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                      </div>
                                    </td>
                                    <td><?= $row['enrollment_no']; ?></td>
                                    <td>
                              <?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                    </td>
                                    <td><?= $row['contact_no']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['department']; ?></td>
                                    <td><?= $row['current_semester']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td>
                                <?php
                                if ($row['status'] == 1) {
                                  ?>
                                        <a href="activate.php?student_id=<?= $row['id']; ?>">
                                          <div class="badge badge-success">Active</div>
                                        </a>
                                <?php
                                } else {
                                  ?>
                                        <a href="deactivate.php?student_id=<?= $row['id']; ?>">
                                          <div class="badge badge-warning">Deactive</div>
                                        </a>
                                <?php
                                }
                                ?>
                                    </td>
                                    <td>
                                      <a href="delete.php?student_id=<?= $row['id']; ?>">
                                        <div class="badge badge-danger">Delete</div>
                                      </a>
                                    </td>
                                    <td><a href="edit_student.php?student_id=<?= $row['id']; ?>"
                                        class="btn btn-outline-primary">Edit</a></td>
                                  </tr>
                                </tbody>
                          <?php
                          $i++;
                      }
                    } else if ($f['department'] == "EC") {
                      $i = 0;
                      $queryuser = "select * from students where department='EC' order by id desc";
                      $queryuserprofile = mysqli_query($conn, $queryuser);
                      while ($row = mysqli_fetch_array($queryuserprofile)) {
                        ?>
                                  <tbody>
                                    <tr>
                                      <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                            id="checkbox-<?= $i ?>">
                                          <label for="checkbox-<?= $i ?>" class="custom-control-label">&nbsp;</label>
                                        </div>
                                      </td>
                                      <td><?= $row['enrollment_no']; ?></td>
                                      <td>
                              <?= $row['first_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>&nbsp&nbsp<?= $row['middle_name']; ?>
                                      </td>
                                      <td><?= $row['contact_no']; ?></td>
                                      <td><?= $row['email']; ?></td>
                                      <td><?= $row['department']; ?></td>
                                      <td><?= $row['current_semester']; ?></td>
                                      <td><?= $row['date']; ?></td>
                                      <td>
                                <?php
                                if ($row['status'] == 1) {
                                  ?>
                                          <a href="activate.php?student_id=<?= $row['id']; ?>">
                                            <div class="badge badge-success">Active</div>
                                          </a>
                                <?php
                                } else {
                                  ?>
                                          <a href="deactivate.php?student_id=<?= $row['id']; ?>">
                                            <div class="badge badge-warning">Deactive</div>
                                          </a>
                                <?php
                                }
                                ?>
                                      </td>
                                      <td>
                                        <a href="delete.php?student_id=<?= $row['id']; ?>">
                                          <div class="badge badge-danger">Delete</div>
                                        </a>
                                      </td>
                                      <td><a href="edit_student.php?student_id=<?= $row['id']; ?>"
                                          class="btn btn-outline-primary">Edit</a></td>
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