<?php

// include 'session.php';
include 'connection.php';
include 'auth.php';
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
    <title>Profile</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="MyCss/assets/style.css">
    <link href="MyCss/assets/font.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="MyCss/assets/style.js"></script>
</head>

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Pages
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="vendor.php">
                    <i class="fas fa-clipboard-list fa-fw text-gray-300"></i>
                    <span>Vendors</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
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
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 ">
                            <div class="card d-flex">
                                <div class="card-body p-4 d-flex justify-content-around">
                                    <table class="col-5">
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <label for="name">Profile Picture</label>
                                            </td>
                                            <td class="px-4 py-2">
                                                <img style="max-height: 300px; max-width: 250px;" src="Mycss/images/<?php echo $details[2] ?>" alt="profile picture">
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="col-5">
                                        <tr class="py-2">
                                            <td class="px-4 py-2">
                                                <span for="name">Name</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><strong><?php echo $user[2] . " " . $user[3] ?></strong></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="mail">Email</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><strong><?php echo $user[4] ?></strong></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="phone">Phone No.</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><strong><?php echo $user[6] ?></strong></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="gender">Gender</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><strong><?php echo $details[6] ?></strong></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="hobbies">Hobbies</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><strong><?php echo $details[7] . ", " . $details[8] ?></strong></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="address">Address</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><strong><?php echo $details[3] . ", " . $details[4] . ", " . $details[5] ?></strong></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="p-4 d-flex justify-content-around">
                                    <a href='Updateprofile.php' class="btn btn-success">Update Profile</a>
                                </div>
                            </div>
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
</body>

</html>