<?php

// include 'session.php';
include 'connection.php';
session_start();
var_dump($_SESSION);
// $user_name = $_SESSION['user_name'];
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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img7.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-5">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-4">
                                    <h2 class='text-uppercase text-center mb-4'>Profile</h2>
                                    <table>
                                        <tr class="py-2">
                                            <td class="px-4 py-2">
                                                <span for="name">Name</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><?php echo $user[1] . " " . $user[2] ?></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <label for="name">Profile Picture</label>
                                            </td>
                                            <td class="px-4 py-2">
                                                <img style="max-height: 300px; max-width: 250px;" src="images/<?php echo $details[2] ?>" alt="profile picture">
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="mail">Email</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><?php echo $user[3] ?></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="phone">Phone No.</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><?php echo $user[5] ?></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="gender">Gender</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><?php echo $details[6] ?></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="hobbies">Hobbies</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><?php echo $details[7] . ", " . $details[8] ?></span>
                                            </td>
                                        </tr>
                                        <tr class="py-4">
                                            <td class="px-4 py-2">
                                                <span for="address">Address</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <span><?php echo $details[3] . ", " . $details[4] . ", " . $details[5] ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="mt-4 mb-8 d-flex justify-content-around">
                                        <a href="index.php?msg=login" name='complete' class="btn btn-primary">Go Back</a>
                                        <a href='Updateprofile.php' class="btn btn-primary">Update Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>