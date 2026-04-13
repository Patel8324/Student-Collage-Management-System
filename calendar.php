<?php
@ob_start();
@session_start();
include('include/config.php');
include('include/header.php');
include('include/navbar.php');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Calendar</h4>
            </div>
            <div class="card-body">
              <div class="fc-overflow">
                <div id="myEvent"></div>
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