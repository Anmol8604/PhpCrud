<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../MyCss/assets/style.css">
    <link href="../MyCss/assets/font.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../MyCss/assets/style.js"></script>
    <script src="../MyCss/assets/jquery.js"></script>
</head>

<?php
include 'connection.php';
include 'auth.php';
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$user_name = $_SESSION['user_name'];
$msg1 = 'SELECT * FROM user_details where user_id = ' . $id;
$res1 = $conn->query($msg1);
$details = $res1->fetch_array();
$msg2 = 'SELECT * FROM users where id = ' . $id;
$res2 = $conn->query($msg2);
$user = $res2->fetch_array();

?>

<body id="page-top">

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
            <li class="nav-item">
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
            <li class="nav-item active">
                <a class="nav-link text-black-50 collapsed" href="products.php">
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
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                    </div>
                    <!-- Card and Create Vendor -->
                    <div class="d-flex align-items-end mb-4 justify-content-between">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 ps-0 pe-2">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Products</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#AddVendor">+ Create Vendor</button>
                            </div>
                        </div>
                    </div>

                    <!-- Vendor Table -->
                    <div class="mb-4">
                        <table class="table ">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Zip</th>
                                    <th scope="col">Business Type</th>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td scope="col">Name</td>
                                    <td scope="col">Email</td>
                                    <td scope="col">Phone</td>
                                    <td scope="col">Address</td>
                                    <td scope="col">Zip</td>
                                    <td scope="col">Business Type</td>
                                    <td scope="col">Business Name</td>
                                    <td scope="col">Type</td>
                                    <td scope="col">Actions</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

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
    <!-- Add Vendor Modal -->
    <div class="modal fade" id="AddVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="col-12  position-relative">
                    <!-- <div class="card" style="border-radius: 15px;"> -->
                    <div class="card-body">
                        <h2 class=" text-uppercase text-center mb-3 mt-2">Add New Vendor<img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2>
                        <form id="venForm" class="row g-3" method="post" enctype="multipart/form-data">
                            <!-- Upload profile picture -->
                            <div class="d-flex">
                                <div data-mdb-input-init class="form-outline mb-1 me-1 w-50">
                                    <label class="form-label" for="form3Example1cg">First Name</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control" name="fname" />
                                    <span id='fname'></span>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-1 ms-1 w-50">
                                    <label class="form-label" for="form3Example2cg">Last Name</label>
                                    <input type="text" name="lname" id="form3Example2cg" class="form-control form-control" />
                                    <span id='lname'></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                    <label class="form-label" for="form3Example4cg">Email</label>
                                    <input type="email" name="email" id="form3Example4cg" class="form-control form-control" />
                                    <span id='email'></span>
                                </div>

                                <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                    <label class="form-label" for="form3Example4cdg">Phone</label>
                                    <input type="tel" name="phone" id="form3Example4cdg" class="form-control form-control" />
                                    <span id='phone'></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                    <label for="inputCountry" class="form-label">Country</label>
                                    <select id="inputCountry" name="Country" class="form-select">
                                        <option value="Choose..." selected>Choose...</option>
                                        <?php
                                        $countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];

                                        foreach ($countries as $country) {
                                            echo "<option value=\"$country\">$country</option>";
                                        }
                                        ?>
                                    </select>
                                    <span id="Country"></span>
                                </div>
                                <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                    <label for="inputState" class="form-label">State</label>
                                    <select id="inputState" name="state" class="form-select">
                                        <option value="Choose..." selected>Choose...</option>
                                        <?php
                                        $states = [
                                            "Arunachal Pradesh",
                                            "Andhra Pradesh",
                                            "Assam",
                                            "Bihar",
                                            "Chhattisgarh",
                                            "Goa",
                                            "Gujarat",
                                            "Haryana",
                                            "Himachal Pradesh",
                                            "Jharkhand",
                                            "Karnataka",
                                            "Kerala",
                                            "Madhya Pradesh",
                                            "Maharashtra",
                                            "Manipur",
                                            "Meghalaya",
                                            "Mizoram",
                                            "Nagaland",
                                            "Odisha",
                                            "Punjab",
                                            "Rajasthan",
                                            "Sikkim",
                                            "Tamil Nadu",
                                            "Telangana",
                                            "Tripura",
                                            "Uttarakhand",
                                            "Uttar Pradesh",
                                            "West Bengal"
                                        ];

                                        foreach ($states as $state) {
                                            echo "<option value=\"$state\">$state</option>";
                                        }
                                        ?>
                                    </select>
                                    <span id="state"></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                    <label class="form-label" for="Example4cg">City</label>
                                    <input type="text" name="city" id="Example4cg" class="form-control form-control" />
                                    <span id='city'></span>
                                </div>
                                <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" name="zip" class="form-control" id="inputZip">
                                    <span id='zip'></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                    <label for="inputBT" class="form-label">Business Type</label>
                                    <select id="inputBT" name="businessT" class="form-select">
                                        <option value="Choose..." selected>Choose...</option>
                                        <?php
                                        $Btypes = [
                                            "Startups",
                                            "Franchises",
                                            "Microenterprise", "Small and Medium-sized Enterprises", "Family-Owned Businesses"
                                        ];

                                        foreach ($Btypes as $type) {
                                            echo "<option value=\"$type\">$type</option>";
                                        }
                                        ?>
                                    </select>
                                    <span id="businessT"></span>
                                </div>
                                <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                    <label class="form-label" for="form3Example">Business Name</label>
                                    <input type="text" name="Bname" id="form3Example" class="form-control form-control" />
                                    <span id="Bname"></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div data-mdb-input-init class="form-outline mb-1 w-50">
                                    <label for="inputVT" class="form-label">Vendor Type</label>
                                    <select id="inputVT" name="vendorT" class="form-select">
                                        <option value="Choose..." selected>Choose...</option>
                                        <?php
                                        $vType = ["Retailers", "Wholesalers", "Distributors", "Manufacturers", "Suppliers"];

                                        foreach ($vType as $v) {
                                            echo "<option value=\"$v\">$v</option>";
                                        }
                                        ?>
                                    </select>
                                    <span id="vendorT"></span>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <div class="mt-4 mb-8 d-flex justify-content-around">
                                <button name='vendorAdd' onclick="addVendor()" type="button" class="btn btn-secondary">Add Vendor</button>
                            </div>
                        </form>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>


    <script>

        function addVendor() {
            var formData = new FormData(document.getElementById('venForm')); // Create a new FormData object
            console.log(formData);
            let flag = true;
            // First Name
            let fname = formData.get('fname');
            if (fname == null || fname == '') {
                flag = false;
                document.getElementById('fname').innerHTML = 'First Name is required';
            } else if (fname.length < 3 || fname.length > 20) {
                flag = false;
                document.getElementById('fname').innerHTML = 'First Name must be between 3 to 20 characters';
            } else if (!/^[a-zA-Z-' ]*$/.test(fname)) {
                flag = false;
                document.getElementById('fname').innerHTML = 'Only letters and spaces allowed in Name';
            } else {
                document.getElementById('fname').innerHTML = "";
            }
            // Last Name
            let lname = formData.get('lname');
            if (lname == null || lname == '') {
                flag = false;
                document.getElementById('lname').innerHTML = 'Last Name is required';
            } else if (lname.length < 3 || lname.length > 20) {
                flag = false;
                document.getElementById('lname').innerHTML = 'Last Name must be between 3 to 20 characters';
            } else if (!/^[a-zA-Z-' ]*$/.test(lname)) {
                flag = false;
                document.getElementById('lname').innerHTML = 'Only letters and spaces allowed in Name';
            } else {
                document.getElementById('lname').innerHTML = "";
            }

            // Email
            let email = formData.get('email');
            if (email == null || email == '') {
                flag = false;
                document.getElementById('email').innerHTML = 'Email is required';
            } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
                flag = false;
                document.getElementById('email').innerHTML = 'Invalid Email format';
            }else {
                document.getElementById('email').innerHTML = "";
            }
            // Phone
            let phone = formData.get('phone');
            if (phone == null || phone == '') {
                flag = false;
                document.getElementById('phone').innerHTML = 'Phone is required';
            } else if (!/^[0-9]*$/.test(phone)) {
                flag = false;
                document.getElementById('phone').innerHTML = 'Only numbers allowed in Phone';
            }
            else {
                document.getElementById('phone').innerHTML = "";
            }
            // Country
            let country = formData.get('Country');
            if (country == null || country == 'Choose...') {
                flag = false;
                document.getElementById('Country').innerHTML = 'Country is required';
            } else {
                document.getElementById('Country').innerHTML = "";
            }
            // State
            let state = formData.get('state');
            if (state == null || state == 'Choose...') {
                flag = false;
                document.getElementById('state').innerHTML = 'State is required';
            } else {
                document.getElementById('state').innerHTML = "";
            }
            // City
            let city = formData.get('city');
            if (city == null || city == '') {
                flag = false;
                document.getElementById('city').innerHTML = 'City is required';
            } else {
                document.getElementById('city').innerHTML = "";
            }
            // Zip
            let zip = formData.get('zip');
            if (zip == null || zip == '') {
                flag = false;
                document.getElementById('zip').innerHTML = 'Zip is required';
            } else if (!/^[0-9]*$/.test(zip)) {
                flag = false;
                document.getElementById('zip').innerHTML = 'Only numbers allowed in Zip';
            } else {
                document.getElementById('zip').innerHTML = "";
            }
            // Business Type
            let businessT = formData.get('businessT');
            if (businessT == null || businessT == 'Choose...') {
                flag = false;
                document.getElementById('businessT').innerHTML = 'Business Type is required';
            }
            // Business Name
            let Bname = formData.get('Bname');
            if (Bname == null || Bname == '') {
                flag = false;
                document.getElementById('Bname').innerHTML = 'Business Name is required';
            }
            // Vendor Type
            let vendorT = formData.get('vendorT');
            if (vendorT == null || vendorT == 'Choose...') {
                flag = false;
                document.getElementById('vendorT').innerHTML = 'Vendor Type is required';
            }

            console.log(fname, lname, email, phone, country, state, city, zip, businessT, Bname, vendorT, flag);
            if (flag) {
                jQuery.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: {
                        methodName: 'addVendor',
                        fname: fname,
                        lname: lname,
                        email: email,
                        phone: phone,
                        country: country,
                        state: state,
                        city: city,
                        zip: zip,
                        businessT: businessT,
                        Bname: Bname,
                        vendorT: vendorT
                    },
                    success: function(res) {    
                        window.location.href = 'vendor.php';
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error: ' + textStatus, errorThrown); // Handle any errors
                    }
                });
            }
        }
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>