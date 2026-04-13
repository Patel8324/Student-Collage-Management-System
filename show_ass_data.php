<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
  header('location:login.php');
}

include('include/header.php');
include('include/navbar.php');


$id = trim($_GET['assignment_id']);

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
              $queryass = mysqli_fetch_array(mysqli_query($conn, "select * from assignment where id='" . $id . "'"));
              $queryassdata = mysqli_fetch_array(mysqli_query($conn, "select * from assignment_data where assid='" . $id . "'"));
              $querystd = mysqli_fetch_array(mysqli_query($conn, "select * from students where id='" . $queryassdata['stdid'] . "'"));
              ?>
              <h4>Assignment Name: <?= $queryass['ass_name']; ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Student Name</th>
                      <th>Assignment</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="delete.php?ass_deta_id=<?= $fetch['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      <td>
                        <?php
                        echo $querystd['first_name'] . '    ' . $querystd['middle_name'] . '    ' . $querystd['last_name'];
                        ?>
                      </td>
                      <td><a href="<?= $queryassdata['assignment']; ?>" class="btn btn-outline-primary">Data</a></td>
                      <td>
                        <?php
                        echo $queryassdata['date'];
                        ?>
                      </td>
                    </tr>
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