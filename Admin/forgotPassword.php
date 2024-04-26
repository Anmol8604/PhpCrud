<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../MyCss/assets/style.css">
    <link href="../MyCss/assets/font.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../MyCss/assets/style.js"></script>
    <script src="../MyCss/assets/jquery.js"></script>
</head>
<?php
if (isset($_POST['reset'])) {
    include 'connection.php';
    $email = $_POST['email'];
    $flag = true;
    $error = "";
    if (empty($email)) {
        $flag = false;
        $error .= "Please fill all the fields<br>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = false;
        $error .= "Invalid email format<br>";
    }
    if (!$flag) {
        echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
        <strong>Error!</strong> ' . $error . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        $msg = "SELECT * FROM users WHERE email='$email' && user_type= 1 ";
        $result = $conn->query($msg);
        if (!$result->num_rows > 0) {
            echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
            <strong>Error!</strong> Invalid email
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
            $details = $result->fetch_array();
            $token = bin2hex(random_bytes(50));
            $link = "http://Project2.test/Admin/resetPassword.php?token=" . $token;
            session_start();
            $_SESSION['link'] = $link;
            $_SESSION['email'] = $email;
            include 'forgotmail.php';
            $query = "UPDATE users SET token='$token' WHERE email='$email'";
            $conn->query($query);
            echo '<div style="z-index: 1;" id="popUp" class="alert my-8 position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
            <strong>Success!</strong> Password reset link has been sent to your email
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            // header("Location: login.php?msg=linkSent");
        }
    }
}
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />
                                    <div class="text-center mt-2">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <button type="submit" name="reset" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#popUp').fadeOut('slow');
        }, 5000);
    </script>
</body>

</html>