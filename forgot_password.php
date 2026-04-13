<?php
include('include/config.php');

if (isset($_POST['continue'])) {

    $email = trim($_POST['email']);
    if (empty($email)) {
        echo "<script>alert('Email is required');</script>";
    } else {
        $stmt = $conn->prepare("SELECT id FROM students WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            header("location:reset_password.php?id=" . $row['id']);
            exit;
        } else {
            echo "<script>alert('Email not found');</script>";
        }
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
                                <h2>Forgot Password</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="email">
                                                <h4>Enter your Email Address</h4>
                                            </label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                placeholder="Enter your email" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="continue"
                                                class="btn btn-primary btn-lg btn-block">
                                                Continue
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