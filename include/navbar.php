<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php"> <img alt="image" src="assets/img/SSIT.png" class="header-logo" /> <span class="logo-name">
          <?php
          if ($d == "admin") {
            ?>
            SSIT - Admin
            <?php
          } else if ($d == "faculty") {
            if ($fetch['faculty_roll_id'] == 1) {
              ?>
                SSIT - HOD
              <?php
            } else if ($fetch['faculty_roll_id'] == 2) {
              ?>
                  <h6>SSIT - Class Coordinator</h6>
              <?php
            } else {
              ?>
                  SSIT - Faculty
              <?php
            }
          } else {
            ?>
              SSIT - Student
            <?php
          }
          ?>
        </span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">
        <h5>Main</h5>
      </li>
      <li class="dropdown active">
        <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>


      <?php
      if ($d == "admin" || $d == "faculty") {
        if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
          ?>
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span> Manage
                Faculty</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="add_faculty.php">Create Faculty</a></li>
              <li><a class="nav-link" href="faculty_list.php">Show All Faculty</a></li>
            </ul>
          </li>
          <?php
        }
      }
      ?>
      <?php
      if ($d == "admin" || $d == "faculty") {
        if ($d == "admin" || $fetch['faculty_roll_id'] == 1 || $fetch['faculty_roll_id'] == 2) {
          ?>
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Manage
                Student</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="add_student.php">Add Student</a></li>
              <li><a class="nav-link" href="student_list.php">Show All Student</a></li>
            </ul>
          </li>
          <?php
        }
      }
      ?>
      <?php
      if ($d == "faculty" || $d == "admin") {
        ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Subject And
              department</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="add_sub&dep.php">Add Sub & Dep</a></li>
            <li><a class="nav-link" href="sub&dep_list.php">Show All Sub & Dep</a></li>
          </ul>
        </li>

        <li class="menu-header">
          <h5>Form</h5>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Form</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create_form.php">Create Form</a></li>
            <li><a class="nav-link" href="show_form.php">Show Form</a></li>
          </ul>
        </li>
        <?php
      }
      ?>
      <?php
      if ($d == "students" || $d == "faculty" || $d == "admin") {
        if ($d == "students" || $d == "admin") {
          ?>
          <li><a class="nav-link" href="show_all_form.php"><i data-feather="file"></i><span>Show All Form</span></a></li>
          <?php
        } else {
          if ($fetch['faculty_roll_id'] == 1 || $fetch['faculty_roll_id'] == 2) {
            ?>
            <li><a class="nav-link" href="show_all_form.php"><i data-feather="file"></i><span>Show All Form</span></a></li>
            <?php
          }
        }
      }
      ?>
      <?php
      if ($d == "faculty" || $d == "admin") {
        ?>
        <li class="menu-header">
          <h5>Assignment & Material</h5>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i class="far fa-file-pdf"></i><span>Assignment</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create_assignment.php">Add Assignment</a></li>
            <li><a class="nav-link" href="show_assignment.php">Show Assignment</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              class="material-icons">assignment</i><span>Material</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create_material.php">Add Material</a></li>
            <li><a class="nav-link" href="show_material.php">Show Material</a></li>
          </ul>
        </li>
        <?php
      }
      ?>
      <?php
      if ($d == "students" || $d == "faculty" || $d == "admin") {
        if ($d == "students" || $d == "admin") {
          ?>
          <li><a class="nav-link" href="show_all_ass.php"><i class="far fa-file-pdf"></i><span>Show All
                Assignment</span></a></li>
          <li><a class="nav-link" href="show_all_mat.php"><i class="material-icons">assignment</i><span>Show All
                Material</span></a></li>
          <?php
        } else {
          if ($fetch['faculty_roll_id'] == 1 || $fetch['faculty_roll_id'] == 2) {
            ?>
            <li><a class="nav-link" href="show_all_ass.php"><i class="far fa-file-pdf"></i><span>Show All
                  Assignment</span></a></li>
            <li><a class="nav-link" href="show_all_mat.php"><i class="material-icons">assignment</i><span>Show All
                  Material</span></a></li>
            <?php
          }
        }
      }
      ?>

      <li class="menu-header">
        <h5>Circular</h5>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-history"></i><span>Circular</span></a>
        <ul class="dropdown-menu">
          <?php
          if ($d == "faculty" || $d == "admin") {
            if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
              ?>
              <li><a class="nav-link" href="add_circular.php">Add Circular</a></li>
              <?php
            }
          }
          ?>
          <li><a class="nav-link" href="show_circular.php">Show Circular</a></li>
        </ul>
      </li>

      <li class="menu-header">
        <h5>Support Ticket's</h5>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-award"></i><span>Support
            Ticket's</span></a>
        <ul class="dropdown-menu">
          <?php
          if ($d == "faculty" || $d == "admin") {
            if ($d == "admin" || $fetch['faculty_roll_id'] == 1) {
              ?>
              <li><a class="nav-link" href="show_support_ticket.php">Show Support Ticket's</a></li>
              <?php
            }
          }
          ?>
          <li><a class="nav-link" href="add_support_ticket.php">Add Support Ticket</a></li>
        </ul>
      </li>

      <li class="menu-header">
        <h5>About</h5>
      </li>
      <li><a class="nav-link" href="blank.php"><i data-feather="file"></i><span>Privacy Policy</span></a></li>
      <li><a class="nav-link" href="blank.php"><i data-feather="file"></i><span>Terms And Condition</span></a></li>

      <li><a class="nav-link" href="#">
          <center>
            <h6><span>Copyright &copy 2025-2026</span>
              <h6>
          </center>
        </a></li>
    </ul>
  </aside>
</div>