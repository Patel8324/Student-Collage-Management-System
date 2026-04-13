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
	$sql = "UPDATE `faculty` SET
			`status`=0 WHERE id='$c_id'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: faculty_list.php');
}

//student
if (isset($_GET['student_id'])) {

	$c_id = $_GET['student_id'];

	// SQL query that sets the status
	// to 1 to indicate activation.
	$sql = "UPDATE `students` SET
			`status`=0 WHERE id='$c_id'";

	// Execute the query
	mysqli_query($conn, $sql);

	header('location: student_list.php');
}
