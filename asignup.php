<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin SignUp Page</title>
    <link href="MyCss/assets/style.css" rel="stylesheet">
    <script src="MyCss/assets/style.js"></script>
</head>

<body>
    <?php
    include 'connection.php';
    if (isset($_POST['submit'])) {
        // To check if all fields are valid
        $flag = true;
        // To concat all errors
        $error = "";

        // First Name Validation
        $fname = trim($_POST['fname']);
        if (empty($fname)) {
            $flag = false;
            $error .= "First Name is required<br>";
        }else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
                $error .= "Only letters and white space allowed in Name <br>";
                $flag = false;
            } elseif (strlen($fname) > 20 || strlen($fname) < 3) {
                $error .= "Name must be between 3 to 20 characters <br>";
                $flag = false;
            }
        }

        // Last Name Validation
        $lname = trim($_POST['lname']);
        if (empty($lname)) {
            $flag = false;
            $error .= "Last Name is required<br>";
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
                $error .= "Only letters and white space allowed inName <br>";
                $flag = false;
            } elseif (strlen($lname) > 20 || strlen($lname) < 3) {
                $error .= "Name must be between 3 to 20 characters <br>";
                $flag = false;
            }
        }

        // Password Validation
        $pass1 = trim($_POST['password']);
        if (empty($pass1)) {
            $flag = false;
            $error .= "Password is required<br>";
        } else {
            if (strlen($pass1) <= 6) {
                $flag = false;
                $error .= "Your Password Must Contain At Least 6 Characters!";
            } elseif (!preg_match("#[0-9]+#", $pass1)) {
                $flag = false;
                $error .= "Your Password Must Contain At Least 1 Number!";
            } elseif (!preg_match("#[A-Z]+#", $pass1)) {
                $flag = false;
                $error .= "Your Password Must Contain At Least 1 Capital Letter!";
            } elseif (!preg_match("#[a-z]+#", $pass1)) {
                $flag = false;
                $error .= "Your Password Must Contain At Least 1 Lowercase Letter!";
            }
        }

        // Confirm Password Validation
        $pass2 = trim($_POST['password2']);
        if($pass1 != $pass2){
            $flag = false;
            $error .= "Passwords do not match<br>";
        }

        // Email Validation
        $email = trim($_POST['email']);
        if (empty($email)) {
            $flag = false;
            $error .= "Email is required<br>";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error .= "Invalid email format <br>";
                $flag = false;
            }
        }

        // Phone Validation
        $phone = trim($_POST['phone']);
        if (empty($phone)) {
            $flag = false;
            $error .= "Phone is required<br>";
        } else if(!preg_match("/^[0-9]*$/", $phone)) {
            $error .= "Only numbers allowed in Phone <br>";
            $flag = false;
        }

        // Terms and Conditions Validation
        if (!isset($_POST['terms'])) {
            $flag = false;
            $error .= "Please accept terms and conditions";
        }else{
            $sql = "Select * from users where email = '$email'";
            $data1 = $conn->query($sql);
            if($data1->num_rows>0){
                $flag = false;
                $error .= "Email already exists";
            }
        }   
        if (!$flag) {
            echo "<div style='z-index:1; max-width: 400px; min-width: 300px;' class='modal-dialog position-absolute top-0 end-0 me-4'>";
            echo "<div class='modal-content'>";
            echo "    <div class='modal-header  d-flex justify-content-between'>";
            echo "        <h1 class='modal-title fs-5' id='exampleModalLabel'>Fix these Errors</h1>";
            echo "        <a href='asignup.php' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'></a>";
            echo "    </div>";
            echo "    <div class='modal-body'>";
            echo "        $error";
            echo "    </div>";
            echo "</div>";
            echo "</div>";
        } 
        else{
            $sql = "INSERT INTO users (user_type, fname, lname, email, password, phone) VALUES (1, '$fname', '$lname', '$email', '$pass1', '$phone')";
            $conn->query($sql);
            $user = $conn->insert_id;
            $sql = "INSERT INTO Role (user_id, user_Role) VALUES ($user, 'Admin')";
            header("Location: alogin.php?msg=NewUser");
        }
    }
    ?>
    <section class="vh-100 bg-image" style="background-image: url('MyCss/images/bg.jpg'); height: 100%;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 position-relative">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h2 class=" text-uppercase text-center mb-5 mt-4">Create an account<img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2>
                                <form action="" method="post">
                                    <div class="d-flex">
                                        <div data-mdb-input-init class="form-outline mb-2 me-1 w-50">
                                            <label class="form-label" for="form3Example1cg">First Name</label>
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="fname" />
                                        </div>
                                        
                                        <div data-mdb-input-init class="form-outline mb-2 ms-1 w-50">
                                            <label class="form-label" for="form3Example2cg">Last Name</label>
                                            <input type="text" name="lname" id="form3Example2cg" class="form-control form-control-lg" />
                                        </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                                    </div>
                                    <div class="d-flex">
                                        <div data-mdb-input-init class="form-outline me-1 mb-2 w-50">
                                            <label class="form-label" for="form3Example4cg">Password</label>
                                            <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                                        </div>
                                        
                                        <div data-mdb-input-init class="form-outline ms-1 mb-2 w-50">
                                            <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                            <input type="password" name="password2" id="form3Example4cdg" class="form-control form-control-lg" />
                                        </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="form3Example5cdg">Phone </label>
                                        <input type="tel" name="phone" id="form3Example5cdg" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-2">
                                        <input class="form-check-input me-2" type="checkbox" name="terms[]" value="Terms" id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3cg">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button style="background-color: #1cc88a;" name="submit" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="alogin.php" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>