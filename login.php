<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<?php
include 'connection.php';

if (isset($_POST['login'])) {
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
        $details = $result->fetch_array();
        $id = $details['id'];
        $msg2 = 'SELECT * FROM user_details where user_id = '.$id;
        $data1 = $conn->query($msg2);
        if($result->num_rows == 0 || $password != $details['password']){
            echo '<div class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
            <strong>Error!</strong> Invalid email or password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        elseif ($data1->num_rows > 0){
            header("Location: index.php?msg=login");
            $user_name = $details['fname'];
            session_start();
            $id = $details['id'];
            // $_SESSION['id'] = $id;
            // var_dump($_SESSION['id']);
            $_SESSION['email'] = $email;
            $_SESSION['user_name'] = $user_name;

        } else {
            header("Location: completeProfile.php");
            $user_name = $details['fname'];
            $id = $details['id'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['user_name'] = $user_name;
        }
    } else {
        echo '<div class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
        <strong>Error!</strong> ' . $error . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
else if(isset($_GET['msg'])){
    if($_GET['msg'] == 'NewUser'){
        echo '<div class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
        <strong>Success!</strong> Account created successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    elseif($_GET['msg'] == 'logout'){
        echo '<div class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
        <strong>Success!</strong> Logged out successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>

<body>
    <section class="vh-100 bg-image" style="background-image: url('images/b54dbc74-4d6a-45e7-9f2f-f9df1e770ed4.jpg');">
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
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init name="login" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Login</button>
                                    </div>
                                    <p class="text-center text-muted mt-3 mb-0">Don't have an account? <a href="signup.php" class="fw-bold text-body"><u>SignUp here</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>