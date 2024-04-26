<?php
include 'auth.php';
include 'connection.php';
$user_name = $_SESSION['user_name'];
$id = $_SESSION['id'];
$msg1 = 'SELECT * FROM user_details where user_id = ' . $id;
$res1 = $conn->query($msg1);
$details = $res1->fetch_array();
$msg2 = 'SELECT * FROM users where id = ' . $id;
$res2 = $conn->query($msg2);
$user = $res2->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../MyCss/assets/style.css">
    <link href="../MyCss/assets/font.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../MyCss/assets/style.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img width="50px" src="https://assets.bootstrapemail.com/logos/light/square.png" alt="">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-1">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link text-black-50" href="index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z" />
                    </svg>
                    <span>Dashboard</span></a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading text-black-50">
                Pages
            </div>
            <li class="nav-item">
                <a class="nav-link text-black-50 collapsed" href="vendor.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z" />
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                    </svg>
                    <span>Vendors</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link text-black-50 collapsed" href="#">
                    <i class="fas fa-clipboard-list fa-fw text-gray-300"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-black-50 collapsed" href="#">
                    <i class="fas fa-clipboard-list fa-fw text-gray-300"></i>
                    <span>Categories</span>
                </a>
            </li>

            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user[2] ?></span>
                                <img class="img-profile rounded-circle" src="../MyCss/images/<?php echo $details[2] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a id='uP' class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    View Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Profile</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 card">
                            <form class="row g-3 mt-4" method="post" enctype="multipart/form-data">
                                <!-- Upload profile picture -->
                                <div class="row">
                                    <div class="col-4 p-4 d-flex flex-column justify-content-between">
                                        <div class="mb-2">
                                            <label for="photo">Profile Image :</label><br>
                                            <input type="file" name="image" id="imageupdate">
                                            <img style="max-width:250px; max-height:250px; cursor: url(MyCss/Images/cursor.png),auto;" src="../MyCss/images/<?php echo $details[2]; ?>" class="uImg" alt="<?php echo $details[2]; ?>">
                                            <span id='image'></span>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="form3Example1cg">First Name</label>
                                            <input type="text" id="form3Example1cg" value="<?php echo $user[2] ?>" class="form-control" name="fname" />
                                            <span id='fname'></span>
                                        </div>
                                        <div class="">
                                            <label class="form-label" for="form3Example2cg">Last Name</label>
                                            <input type="text" name="lname" id="form3Example2cg" value="<?php echo $user[3] ?>" class="form-control" />
                                            <span id='lname'></span>
                                        </div>
                                    </div>
                                    <div class="col-4 p-4 d-flex flex-column justify-content-between">
                                        <div class="mb-2">
                                            <label class="form-label" for="form3Example4cg">Email</label>
                                            <input type="mail" name="email" id="form3Example4cg" value="<?php echo $user[4] ?>" class="form-control" />
                                            <span id='email'></span>
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="form3Example4cdg">Phone No.</label>
                                            <input type="tel" name="phone" id="form3Example4cdg" value="<?php echo $user[6] ?>" class="form-control" />
                                            <span id='phone'></span>
                                        </div>
                                        <!-- City -->
                                        <div class="mb-2">
                                            <label for="inputCity" class="form-label">City</label>
                                            <input type="text" name="city" class="form-control" value="<?php echo $details[3] ?>" id="inputCity">
                                            <span id='city'></span>
                                        </div>

                                        <!-- State -->
                                        <div class="mb-2">
                                            <label for="inputState" class="form-label">State</label>
                                            <select id="inputState" name="state" class="form-select">
                                                <option value="Choose...">Choose...</option>
                                                <?php
                                                $states = [
                                                    "Arunachal Pradesh", "Andhra Pradesh", "Assam", "Bihar", "Chhattisgarh", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttarakhand", "Uttar Pradesh", "West Bengal"
                                                ];

                                                foreach ($states as $state) {
                                                    if ($state == $details[4]) {
                                                        echo "<option value=\"$state\" selected>$state</option>";
                                                    } else {
                                                        echo "<option value=\"$state\">$state</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span id='state'></span>
                                        </div>
                                        <!-- Zip -->
                                        <div class="">
                                            <label for="inputZip" class="form-label">Zip</label>
                                            <input type="text" name="zip" class="form-control" value="<?php echo $details[5] ?>" id="inputZip">
                                            <span id='zip'></span>
                                        </div>
                                    </div>
                                    <div class="col-4 p-4 d-flex flex-column justify-content-between">
                                    <div class="">
                                            <label class="form-label">Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($details[6] == 'male') {echo 'checked';} ?>>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" <?php if ($details[6] == 'female') { echo 'checked';} ?> name="gender"id="female" value="female">
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="other" value="other" <?php if ($details[6] == 'other') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="other">Other</label>
                                            </div>
                                            <span id='gender'></span>
                                        </div>
                                        <div class="">
                                            <label class="form-label">Select Any two Hobbies</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" <?php if ($details[7] == 'reading' || $details[8] == 'reading') { echo 'checked'; } ?> id="reading" value="reading">
                                                <label class="form-check-label" for="reading">Reading</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="writing" value="writing" <?php if ($details[7] == 'writing' || $details[8] == 'writing') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="writing">Writing</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="coding" value="coding" <?php if ($details[7] == 'coding' || $details[8] == 'coding') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="coding">Coding</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="singing" value="singing" <?php if ($details[7] == 'singing' || $details[8] == 'singing') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="singing">Singing</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="dancing" value="dancing" <?php if ($details[7] == 'dancing' || $details[8] == 'dancing') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="coding">Dancing</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="painting" value="painting" <?php if ($details[7] == 'painting' || $details[8] == 'painting') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="painting">Painting</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="cooking" value="cooking" <?php if ($details[7] == 'cooking' || $details[8] == 'cooking') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="coding">Cooking</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]" id="photography" value="photography" <?php if ($details[7] == 'photography' || $details[8] == 'photography') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="photography">Photography</label>
                                            </div>
                                            <span id='hobbie'></span>
                                        </div>
                                    </div>
                                    <!-- Col 3 -->
                                    <!-- Butttons -->
                                    <div class="p-4 d-flex justify-content-around">
                                        <button name='update' onclick="update1()" type="button" class="btn btn-secondary">Update</button>
                                        <a href="profile.php" class="btn btn-secondary">Go Back</a>
                                    </div>
                                </div>
                                <!-- Submit button -->
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="" method="post"><button class="btn btn-secondary" name="logout" type="submit">Logout</button></form>
                    <!-- <a href="help.php">csdfr</a> -->
                </div>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
        document.getElementById('imageupdate').style.display = 'none';
        document.querySelector('.uImg').addEventListener('click', function() {
            document.getElementById('imageupdate').click();
        });

        document.getElementById('imageupdate').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.uImg').src = e.target.result;
            }
            reader.readAsDataURL(file);
        });

        function update1() {
            var formData = new FormData(document.querySelector('form')); // Create a new FormData object 

            let flag = true;
            let fname = formData.get('fname');
            if (fname.length < 3 || fname.length > 20) {

                flag = false;
                document.getElementById('fname').innerHTML = 'First Name must be between 3 to 20 characters';
            } else if (fname == '') {
                flag = false;
                document.getElementById('fname').innerHTML = 'First Name is required';
            } else if (!/^[a-zA-Z-' ]*$/.test(fname)) {
                flag = false;
                document.getElementById('fname').innerHTML = 'Only letters and spaces allowed in Name';
            } else {
                document.getElementById('fname').innerHTML.replace = '';
            }
            let lname = formData.get('lname');
            if (lname == '') {
                flag = false;
                document.getElementById('lname').innerHTML = 'Last Name is required';
            } else if (lname.length < 3 || lname.length > 20) {
                flag = false;
                document.getElementById('lname').innerHTML = 'Last Name must be between 3 to 20 characters';
            } else if (!/^[a-zA-Z-' ]*$/.test(lname)) {
                flag = false;
                document.getElementById('lname').innerHTML = 'Only letters and spaces allowed in Name';
            }
            let email = formData.get('email');
            if (email == '') {
                flag = false;
                document.getElementById('email').innerHTML = 'Email is required';
            } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
                flag = false;
                document.getElementById('email').innerHTML = 'Invalid Email format';
            }
            let phone = formData.get('phone');
            if (phone == '') {
                flag = false;
                document.getElementById('phone').innerHTML = 'Phone is required';
            } else if (!/^[0-9]*$/.test(phone)) {
                flag = false;
                document.getElementById('phone').innerHTML = 'Only numbers allowed in Phone';
            }
            let city = formData.get('city');
            if (city == '') {
                flag = false;
                document.getElementById('city').innerHTML = 'Please fill the city';
            }
            let state = formData.get('state');
            if (state == 'Choose...') {
                flag = false;
                document.getElementById('state').innerHTML = 'Please select a state';
            }
            let zip = formData.get('zip');
            if (zip == '') {
                flag = false;
                document.getElementById('zip').innerHTML = 'Please fill the zip';
            } else if (!/^[0-9]{6}$/.test(zip)) {
                flag = false;
                document.getElementById('zip').innerHTML = 'Zip should be of 6 digits';
            }
            let image = formData.get('image');
            let photo = image['name'];
            // console.log(image['name']);


            let gender = formData.get('gender');
            if (gender == '') {
                flag = false;
                document.getElementById('gender').innerHTML = 'Please select your Gender';
            }
            let hobbies = formData.getAll('hobbies[]');
            if (hobbies.length != 2) {
                flag = false;
                document.getElementById('hobbie').innerHTML = 'Please select any two hobbies';
            }
            // console.log(fname, lname, email, phone, city, state, zip, image, gender, hobbies, hobbies[1]);
            if (flag) {
                jQuery.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: {
                        methodName: 'update',
                        fname: fname,
                        lname: lname,
                        email: email,
                        phone: phone,
                        city: city,
                        state: state,
                        zip: zip,
                        photo: photo,
                        gender: gender,
                        hobbies: hobbies
                    },
                    success: function(res) {
                        console.log(res);
                        if (res == "Updated Successfully") {
                            console.log('Profile Updated');
                            window.location.href = 'profile.php';
                        } else {
                            console.log('Profile Not Updated');
                            document.getElementById('modal').innerHTML = res;
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error: ' + textStatus, errorThrown); // Handle any errors
                    }
                });
            }
        }
    </script>
</body>

</html>