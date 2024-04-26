<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login Page</title>
    <link href="../MyCss/assets/style.css" rel="stylesheet">
    <script src="../MyCss/assets/style.js"></script>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url(../MyCss/images/bg.jpg);">
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

                                    <p class="text-end text-muted mb-0"><a href="forgotPassword.php" class="fw-bold text-body">Forgot Password?</a></p>
                                    <div class="d-flex mt-3 justify-content-center">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init name="login" class="btn btn-secondary" style="color: white;">Login</button>
                                    </div>
                                    <p class="text-center text-muted mt-3 mb-0">Don't have an account? <a href="signup.php" class="fw-bold text-body"><u>SignUp here</u></a></p>
                                    </div>
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