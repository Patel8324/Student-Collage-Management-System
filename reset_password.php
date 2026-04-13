<?php
include('include/config.php');

if (!isset($_GET['id'])) {
    header("location:login_student.php");
    exit;
}

$id = $_GET['id'];

if (isset($_POST['reset'])) {

    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    //  Empty check
    if (empty($password) || empty($cpassword)) {
        echo "<script>alert('All fields are required');</script>";
    }

    //  Password match check
    elseif ($password != $cpassword) {
        echo "<script>alert('Passwords do not match');</script>";
    }

    //  Strong password validation
    elseif (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters');</script>";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        echo "<script>alert('Must contain uppercase letter');</script>";
    } elseif (!preg_match("/[a-z]/", $password)) {
        echo "<script>alert('Must contain lowercase letter');</script>";
    } elseif (!preg_match("/[0-9]/", $password)) {
        echo "<script>alert('Must contain number');</script>";
    } elseif (!preg_match("/[\W]/", $password)) {
        echo "<script>alert('Must contain special character');</script>";
    } else {
        //  Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //  Secure query
        $stmt = $conn->prepare("UPDATE students SET password=? WHERE id=?");
        $stmt->bind_param("si", $hashed_password, $id);
        $stmt->execute();

        echo "<script>alert('Password updated successfully'); window.location='login_student.php';</script>";
    }
}
?>


<!--main-->
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forgot Password</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/SSIT.png' />
</head>

<body onLoad="my_code()" ;>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2>New Password</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="password">
                                                <h4>Create new password</h4>
                                            </label>
                                            <input id="password" type="password" class="form-control" name="password"
                                                placeholder="new password" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">
                                                <h4>Confirm your password</h4>
                                            </label>
                                            <input id="cpassword" type="password" class="form-control" name="cpassword"
                                                placeholder="Confirm new password" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="reset" class="btn btn-primary btn-lg btn-block">
                                                Reset Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>

</html>