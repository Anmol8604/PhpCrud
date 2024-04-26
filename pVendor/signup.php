<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendor SignUp Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="MyCss/assets/style.css" rel="stylesheet">
    <script src="MyCss/assets/style.js"></script>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('images/b54dbc74-4d6a-45e7-9f2f-f9df1e770ed4.jpg'); height: 100%;">
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
                                        <button name="submit" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-block btn-lg gradient-custom-4">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

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