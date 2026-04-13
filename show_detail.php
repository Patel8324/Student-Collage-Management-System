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
    <div class="row ">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <?php
            $queryuser = mysqli_fetch_array(mysqli_query($conn, "select * from form where id='" . $id . "'"));
            ?>
            <h4>Form Name:- <?= $queryuser['frmname']; ?></h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <?php
                $data = mysqli_fetch_array(mysqli_query($conn, "select * from form where id='" . $id . "'"));
                ?>
                <tr>
                  <td>Data:-</td>
                  <?php if ($data['txt'] != null) {
                  ?>
                    <?php
                    $stringParts = explode(";", $data['txt']);
                    foreach ($stringParts as $file) {
                    ?>
                      <td><?php echo $file; ?></td>
                  <?php
                    }
                  }
                  ?>

                  <?php
                  if ($data['rdque'] != null) {
                  ?>
                    <?php $stringParts = explode(";", $data['rdque']);
                    foreach ($stringParts as $file) {
                    ?>
                      <td><?php echo $file; ?></td>
                  <?php
                    }
                  }
                  ?>

                  <?php
                  if ($data['chque'] != null) {
                  ?>
                    <?php $stringParts = explode(";", $data['chque']);
                    foreach ($stringParts as $file) {
                    ?>
                      <td><?php echo $file; ?></td>
                  <?php
                    }
                  }
                  ?>
                </tr>
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