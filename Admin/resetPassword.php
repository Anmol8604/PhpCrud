<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../MyCss/assets/style.css">
    <link href="../MyCss/assets/font.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../MyCss/assets/style.js"></script>
    <script src="../MyCss/assets/jquery.js"></script>
</head>
<?php
if(isset($_POST['reset'])){
    include 'connection.php';
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $flag = true;
    $error = "";
    if(empty($email) || empty($pass1) || empty($pass2)){
        $flag = false;
        $error .= "Please fill all the fields<br>";
    }else if($pass1 != $pass2){
        $flag = false;
        $error .= "Passwords do not match<br>";
    }
    if(!$flag){
        echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
        <strong>Error!</strong> '.$error.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        $msg = "SELECT * FROM users WHERE email='$email' && user_type= 1 ";
        $result = $conn->query($msg);
        if(!$result->num_rows > 0){
            echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
            <strong>Error!</strong> Invalid email
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            $details = $result->fetch_array();
            $query = "UPDATE users SET password='".md5($pass1)."', token=null WHERE email='".$email."'";

            echo $query;
            if($conn->query($query)){
                header("Location: login.php?msg=reset");
            }else{
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
                <strong>Error!</strong> Password reset failed../
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
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
                                        <h1 class="h4 text-gray-900 mb-2">Reset your password</h1>
                                        <p class="mb-4">Input your registered email and your new password</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user " id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <input type="password" name="pass1" class="form-control form-control-user my-2" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Your new Password...">
                                            <input type="password" name="pass2" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Confirm your new Password...">
                                        </div>
                                        <button type="submit" name="reset" class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>