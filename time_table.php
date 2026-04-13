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
            <h4>Time Table</h4>
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
                  <th>Time</th>
                  <th>Sun</th>
                  <th>Mon</th>
                  <th>Tus</th>
                  <th>Wen</th>
                  <th>The</th>
                  <th>Fri</th>
                  <th>Sat</th>
                </tr>

                <tr>
                  <td>09:00 To 10:00</td>
                  <td>-</td>
                  <td>OOP-I(KK)</td>
                  <td rowspan="2">OOP(KK)-C1 <BR> OS(JG)-C2</td>
                  <td rowspan="2">OS(JG)-C1 <BR> COA(RP)-C2</td>
                  <td>Maths</td>
                  <td rowspan="2">COA(RP)-C1 <BR> OOP(KK)-C2</td>
                  <td>-</td>
                </tr>

                <tr>
                  <td>10:00 To 11:00</td>
                  <td>-</td>
                  <td>Maths</td>
                  <td>COA(RP)</td>
                  <td>-</td>
                </tr>

                <tr>
                  <td>11:00 To 11:30</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>

                <tr>
                  <td>11:30 To 12:20</td>
                  <td>-</td>
                  <td>PM(ST)</td>
                  <td>OS(JG)</td>
                  <td>OOP-I(KK)</td>
                  <td>OS(JG)</td>
                  <td>Maths</td>
                  <td>-</td>
                </tr>

                <tr>
                  <td>12:20 To 01:00</td>
                  <td>-</td>
                  <td>OS(JG)</td>
                  <td>Maths</td>
                  <td>COA(RP)</td>
                  <td>OOP-I(KK)</td>
                  <td>OOP-I(KK)</td>
                  <td>-</td>
                </tr>

                <tr>
                  <td>01:00 To 01:30</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>

                <tr>
                  <td>01:30 To 02:20</td>
                  <td>-</td>
                  <td rowspan="2">OS(JG)-C1 <BR> COA(RP)-C2</td>
                  <td>COA()RP</td>
                  <td>PM(ST)</td>
                  <td rowspan="2">COA(RP)-C1 <BR> OOP(KK)-C2</td>
                  <td rowspan="2">OOP-I(KK)-C1 <BR> OS(JG)-C2</td>
                  <td>-</td>
                </tr>

                <tr>
                  <td>02:20 To 03:10</td>
                  <td>-</td>
                  <td>PM(ST)</td>
                  <td>OS(JG)</td>
                  <td>-</td>
                </tr>

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