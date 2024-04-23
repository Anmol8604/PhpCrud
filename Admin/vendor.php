<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vendors</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="MyCss/assets/style.css">
    <link href="MyCss/assets/font.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="MyCss/assets/style.js"></script>
    <script src="MyCss/assets/jquery.js"></script>
</head>

<?php
include 'auth.php';
include 'connection.php';
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$user_name = $_SESSION['user_name'];
$msg1 = 'SELECT * FROM user_details where user_id = ' . $id;
$res1 = $conn->query($msg1);
$details = $res1->fetch_array();
$msg2 = 'SELECT * FROM users where id = ' . $id;
$res2 = $conn->query($msg2);
$user = $res2->fetch_array();
$Countryquery = 'SELECT id, name FROM `countries`';
$selectVendor = 'Select users.id, fname, lname, email, Btype, Bname  from users inner join user_details where users.id = user_details.user_id && users.user_type = 2';
$data1 = $conn->query($selectVendor);
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color: #1cc88a;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Pages
            </div>
            <li class="nav-item active">
                <a class="nav-link collapsed" href="vendor.php">
                    <i class="fas fa-clipboard-list fa-fw text-gray-300"></i>
                    <span>Vendors</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="products.php">
                    <i class="fas fa-clipboard-list fa-fw text-gray-300"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
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
                                <img class="img-profile rounded-circle" src="MyCss/images/<?php echo $details[2] ?>">
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
                        <h1 class="h3 mb-0 text-gray-800">Vendors</h1>
                    </div>
                    <!-- Card and Create Vendor -->
                    <div class="d-flex align-items-end mb-4 justify-content-between">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 ps-0 pe-2">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Vendors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data1->num_rows ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="pe-3 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" id="searchVen" class="form-control bg-outline-success border-1 border-success small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#AddVendor">+ Create Vendor</button>
                            </div>
                        </div>
                    </div>

                    <!-- Vendor Table -->
                    <div class="mb-4">
                        <table class="table table-success table-striped">
                            <thead class="table-light">
                                <tr class="table-active">
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Business Type</th>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="venTable">
                                <?php
                                $i = 0;
                                $selectVendor .= ' LIMIT 5';
                                $data2 = $conn->query($selectVendor);
                                while ($res = $data2->fetch_array()) {
                                    echo "<tr'>";
                                    echo "<td class='table-active'>" . ++$i . "</td>";
                                    echo "<td>" . $res['fname'] . " " . $res['lname'] . "</td>";
                                    echo "<td>" . $res['email'] . "</td>";
                                    echo "<td>" . $res['Btype'] . "</td>";
                                    echo "<td>" . $res['Bname'] . "</td>";
                                    echo '<td>
                                        <a href="vendor/view?' . $res['email'] . '"><img src="MyCss/images/eye.png" alt=""></a>
                                        <a href="vendor/edit?' . $res['email'] . '"><img src="MyCss/images/cursor.png" alt=""></a>
                                        <a href="vendor/delete?' . $res['email'] . '"><img src="MyCss/images/delete.png" alt=""></a>
                                    </td>';
                                    echo "</tr>";
                                }
                                ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <nav aria-label="">
                                            <ul class="pagination d-flex justify-content-center">
                                                <?php
                                                $total_pages = $data1->num_rows;
                                                $total_pages = ceil($total_pages / 5);

                                                for ($i = 1; $i <= $total_pages; $i++) {
                                                    echo "<li class='page-item'><a class='page-link' id='pagination1'>" . $i . "</a></li>";
                                                }
                                                ?>
                                            </ul>
                                        </nav>
                                    </td>
                                </tr>
                            </tfoot>
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
                                        $res = $pubConn->query($Countryquery);
                                        $countries = $res->fetch_all();
                                        foreach ($countries as $country) {
                                            echo "<option value=\"$country[0]\">$country[1]</option>";
                                        }
                                        ?>
                                    </select>
                                    <span id="Country"></span>
                                </div>
                                <div data-mdb-input-init class="form-outline ms-1 mb-1 w-50">
                                    <label for="inputState" class="form-label">State</label>
                                    <select id="inputState" name="state" class="form-select">
                                    </select>
                                    <span id="state"></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div data-mdb-input-init class="form-outline me-1 mb-1 w-50">
                                    <label class="form-label" for="inputCity">City</label>
                                    <select id="inputCity" name="City" class="form-select">
                                    </select>
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
                            <!-- Submit button -->
                            <div class="mt-4 mb-8 d-flex justify-content-around">
                                <button name='vendorAdd' onclick="addVendor()" type="button" class="btn btn-success">Add Vendor</button>
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
        document.querySelectorAll('.page-link').forEach(item => {
            item.addEventListener('click', event => {
                jQuery.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        methodName: 'pagination',
                        page: item.innerText
                    },
                    success: function(res) {
                        document.getElementById('venTable').innerHTML = res;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error: ' + textStatus, errorThrown); // Handle any errors
                    }
                });
            })
        });

        document.getElementById('searchVen').addEventListener('change', function() {
            var a = document.getElementById('searchVen').value;
            jQuery.ajax({
                type: 'POST',
                url: 'action.php',
                data: {
                    methodName: 'searchVen',
                    search: a
                },
                success: function(res) {
                    document.getElementById('venTable').innerHTML = res;
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error: ' + textStatus, errorThrown); // Handle any errors
                }

            });
        });

        document.getElementById('inputCountry').addEventListener('change', function() {
            document.getElementById('state').innerHTML = '';
            document.getElementById('city').innerHTML = '';
            document.getElementById('inputState').innerHTML = "<option value='Choose...' selected>Choose...</option>";
            document.getElementById('inputCity').innerHTML = "<option value='Choose...' selected>Choose...</option>";
            if (document.getElementById('inputCountry').value == 'Choose...') {
                document.getElementById('Country').innerHTML = 'Country is required';
            } else {
                var a = document.getElementById('inputCountry').value;
                document.getElementById('Country').innerHTML = '';
                jQuery.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        methodName: 'state',
                        countryVal: a
                    },
                    success: function(res) {
                        var x = "<option value='Choose...' selected>Choose...</option>" + res;
                        document.getElementById('inputState').innerHTML = x;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error: ' + textStatus, errorThrown); // Handle any errors
                    }
                });
            }
        });

        document.getElementById('inputState').addEventListener('change', function() {
            var a = document.getElementById('inputCountry').value;
            var b = document.getElementById('inputState').value;
            document.getElementById('city').innerHTML = '';
            if (a == 'Choose...') {
                document.getElementById('state').innerHTML = 'Country is required';
            } else if (b == 'Choose...') {
                document.getElementById('state').innerHTML = 'State is required';
            } else {
                document.getElementById('Country').innerHTML = '';
                jQuery.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        methodName: 'city',
                        stateVal: b
                    },
                    success: function(res) {
                        var x = "<option value='Choose...' selected>Choose...</option>" + res;
                        document.getElementById('inputCity').innerHTML = x;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error: ' + textStatus, errorThrown); // Handle any errors
                    }
                });
            }
        });


        function addVendor() {
            var formData = new FormData(document.getElementById('venForm')); // Create a new FormData object
            // console.log(formData);
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
            } else {
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
            } else {
                document.getElementById('phone').innerHTML = "";
            }
            // Country
            let country = document.getElementById('inputCountry').options[document.getElementById('inputCountry').selectedIndex].text;
            if (country == null || country == 'Choose...') {
                flag = false;
                document.getElementById('Country').innerHTML = 'Country is required';
            } else {
                document.getElementById('Country').innerHTML = "";
            }
            // State
            let state = document.getElementById('inputState').options[document.getElementById('inputState').selectedIndex].text;
            if (state == null || state == 'Choose...') {
                flag = false;
                document.getElementById('state').innerHTML = 'State is required';
            } else {
                document.getElementById('state').innerHTML = "";
            }
            // City
            let city = document.getElementById('inputCity').options[document.getElementById('inputCity').selectedIndex].text;
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
            } else {
                document.getElementById('businessT').innerHTML = "";
            }
            // Business Name
            let Bname = formData.get('Bname');
            if (Bname == null || Bname == '') {
                flag = false;
                document.getElementById('Bname').innerHTML = 'Business Name is required';
            } else {
                document.getElementById('Bname').innerHTML = "";
            }
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
                        Bname: Bname
                    },
                    success: function(res) {
                        console.log(fname, lname, email, phone, country, state, city, zip, businessT, Bname, res);
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