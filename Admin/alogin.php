<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login Page</title>
    <link href="MyCss/assets/style.css" rel="stylesheet">
    <script src="MyCss/assets/style.js"></script>
</head>
<?php
include 'connection.php';
if (isset($_POST['alogin'])) {
    $email = $_POST['email'];
    $password = $_POST['post'];
    $flag = true;
    $error = "";

    if (empty($email) || empty($password)) {
        $flag = false;
        $error .= "Please fill all the fields<br>";
    }

    if ($flag) {
        $msg = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($msg);
        if (!$result->num_rows > 0) {
            echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
            <strong>Error!</strong> Invalid email or password
            <button type="button" class="btn-close" data-bs-d
            ismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            $details = $result->fetch_array();
            $id = $details['id'];
            $msg2 = 'SELECT * FROM user_details where user_id = ' . $id;
            $data1 = $conn->query($msg2);
            if ($result->num_rows == 0 || $password != $details['password']) {
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
            <strong>Error!</strong> Invalid email or password
            <button type="button" class="btn-close" data-bs-d
            ismiss="alert" aria-label="Close"></button>
          </div>';
            } elseif ($data1->num_rows > 0) {
                session_start();
                $user_name = $details['fname'];
                $id = $details['id'];
                $_SESSION['ltime'] = time();
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['user_name'] = $user_name;
                header("Location: index.php");
            } else {
                session_start();
                $user_name = $details['fname'];
                $id = $details['id'];
                $_SESSION['id'] = $id;
                $_SESSION['ltime'] = (int)time();
                $_SESSION['email'] = $email;
                $_SESSION['user_name'] = $user_name;
                header("Location: completeProfile.php");
            }
        }
    } else {
        echo '<div  id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
        <strong>Error!</strong> ' . $error . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
} else if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'NewUser') {
        echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
        <strong>Success!</strong> Account created successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } elseif ($_GET['msg'] == 'logout') {
        echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
        <strong>Success!</strong> Logged out successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>

<body>
    <section class="vh-100 bg-image" style="background-image: url(MyCss/images/bg.jpg);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h2 class=" text-uppercase text-center mb-4 mt-4">Sign In <img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2>
                                <form method="post">
                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" name='email' id="form3Example3cg" class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" name='post' id="form3Example4cg" class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex mt-3 justify-content-center">
                                        <button style="background-color: #1cc88a;" type="submit" data-mdb-button-init data-mdb-ripple-init name="alogin" class="btn btn-success" style="color: white;">Login</button>
                                    </div>
                                    <p class="text-center text-muted mt-3 mb-0">Don't have an account? <a href="asignup.php" class="fw-bold text-body"><u>SignUp here</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        setTimeout(() => {
            document.getElementById('popUp').style.display = 'none';
        }, 3000);
    </script>
</body>

</html>