<?php
@ob_start();
@session_start();
include('include/config.php');
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
	header('location:login.php');
}

//faculty
if (isset($_GET['faculty_id'])) {

	$c_id = $_GET['faculty_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `faculty` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: faculty_list.php');
}

//student
if (isset($_GET['student_id'])) {

	$c_id = $_GET['student_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `students` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: student_list.php');
}

//subdep
if (isset($_GET['subdep_id'])) {

	$c_id = $_GET['subdep_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `faculty_sub` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: sub&dep_list.php');
}

//form
if (isset($_GET['form_id'])) {

	$c_id = $_GET['form_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `form` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_all_form.php');
}

//form data
if (isset($_GET['form_delete_id'])) {

	$c_id = $_GET['form_delete_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `form_data` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_form.php');
}


//delete ass  data
if (isset($_GET['ass_deta_id'])) {

	$c_id = $_GET['ass_deta_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `assignment_data` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_ass_data.php');
}

//delete ass
if (isset($_GET['assignment_id'])) {

	$c_id = $_GET['assignment_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `assignment` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_assignment.php');
}

//delete all ass
if (isset($_GET['assignment_all_id'])) {

	$c_id = $_GET['assignment_all_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `assignment` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_all_ass.php');
}

//delete material
if (isset($_GET['material_id'])) {

	$c_id = $_GET['material_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `material` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_material.php');
}

//delete all material
if (isset($_GET['material_all_id'])) {

	$c_id = $_GET['material_all_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `material` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_all_mat.php');
}

//delete circular
if (isset($_GET['circular_id'])) {

	$c_id = $_GET['circular_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `circular` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_circular.php');
}

//delete support
if (isset($_GET['support_id'])) {

	$c_id = $_GET['support_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "DELETE FROM `suport` WHERE  id='" . $c_id . "'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: show_support_ticket.php');
}

