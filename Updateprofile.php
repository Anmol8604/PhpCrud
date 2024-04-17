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

if (isset($_POST['update'])) {
    $flag = true;
    // To concat all errors
    $error = "";

    // First Name Validation
    $fname = trim($_POST['fname']);
    if (empty($fname)) {
        $flag = false;
        $error .= "First Name is required<br>";
    } else {
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
    } else if (!preg_match("/^[0-9]*$/", $phone)) {
        $error .= "Only numbers allowed in Phone <br>";
        $flag = false;
    }

    $image = $_FILES['image'];
    $image_name = $image['name'];
    // if (empty($image_name[0])) {
    //     $flag = false;
        // $error .= "Please upload an image" . $image_name[0];
    // }
    // City Validation
    $city = trim($_POST['city']);
    if (empty($city)) {
        $flag = false;
        $error .= "Please fill the city<br>";
    }
    // State Validation
    $state = trim($_POST['state']);
    if ($state == "Choose...") {
        $flag = false;
        $error .= "Please select a state<br>";
    }
    // Zip Validation
    $zip = trim($_POST['zip']);
    if (empty($zip)) {
        $flag = false;
        $error .= "Please fill the zip<br>";
    } elseif (!preg_match("/^[0-9]{6}$/", $zip)) {
        $flag = false;
        $error .= "Zip should be of 6 digits<br>";
    }
    // Gender Validation 
    if (!isset($_POST['gender'])) {
        $flag = false;
        $error .= "Please select your Gender<br>";
    }
    // Hobbies Validation
    if (!isset($_POST['hobbies']) || count($_POST['hobbies']) != 2) {
        $flag = false;
        $error .= "Please select any two hobbies<br>";
    }

    if (!$flag) {
        echo "<div style='z-index:1; max-width: 400px; min-width: 300px;' class='modal-dialog position-absolute top-0 end-0 me-4'>
        <div class='modal-content'>
            <div class='modal-header  d-flex justify-content-between'>
                <h1 class='modal-title fs-5' id='exampleModalLabel'>Fix these Errors</h1>
                <a href='asignup.php' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'></a>
            </div>
            <div class='modal-body'>
                $error
            </div>
        </div>
        </div>";
    } else {
        $hobbies = $_POST['hobbies'];
        $msg = "UPDATE users SET fname = '$fname', lname = '$lname', phone = $phone, email = '$email' WHERE id = $id;";
        $conn->query($msg);
        $msg2 = "";
        if(!empty($image_name[0])){
            $msg2 = "UPDATE user_details SET image = '$image_name[0]', gender = '$_POST[gender]', hobbie1 = '$hobbies[0]', hobbie2 = '$hobbies[1]', state = '$state', city = '$city', zip = '$zip' WHERE user_id = $id;";
        }
        else{
            $msg2 = "UPDATE user_details SET gender = '$_POST[gender]', hobbie1 = '$hobbies[0]', hobbie2 = '$hobbies[1]', state = '$state', city = '$city', zip = $zip WHERE user_id = $id;";
        }
        $conn->query($msg2);
        header("Location: index.php?msg=Updated");

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img7.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-8">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-4">
                                    <!-- <h2 class=" text-uppercase text-center mt-2"><?php echo $user_name . " " ?><img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2> -->
                                    <h2 class='text-uppercase text-center mb-4'>Update your profile</h2>
                                    <form class="row g-3 mt-4" method="post" enctype="multipart/form-data">
                                        <!-- Upload profile picture -->
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="mb-2">
                                                    <label class="form-label" for="form3Example1cg">First Name</label>
                                                    <input type="text" id="form3Example1cg" value="<?php echo $user[2] ?>" class="form-control" name="fname" />
                                                </div>

                                                <div class="mb-2 ">
                                                    <label class="form-label" for="form3Example2cg">Last Name</label>
                                                    <input type="text" name="lname" id="form3Example2cg" value="<?php echo $user[3] ?>" class="form-control" />
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="form3Example4cg">Email</label>
                                                    <input type="mail" name="email" id="form3Example4cg" value="<?php echo $user[4] ?>" class="form-control" />
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label" for="form3Example4cdg">Phone No.</label>
                                                    <input type="tel" name="phone" id="form3Example4cdg" value="<?php echo $user[6] ?>" class="form-control" />
                                                </div>
                                                <!-- City -->
                                                <div class="mb-2">
                                                    <label for="inputCity" class="form-label">City</label>
                                                    <input type="text" name="city" class="form-control" value="<?php echo $details[3] ?>" id="inputCity">
                                                </div>

                                                <!-- State -->
                                                <div class="mb-2">
                                                    <label for="inputState" class="form-label">State</label>
                                                    <select id="inputState" name="state" class="form-select">
                                                        <option value="Choose...">Choose...</option>
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
                                                            if ($state == $details[4]) {
                                                                echo "<option value=\"$state\" selected>$state</option>";
                                                            } else {
                                                                echo "<option value=\"$state\">$state</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- Zip -->
                                                <div class="">
                                                    <label for="inputZip" class="form-label">Zip</label>
                                                    <input type="text" name="zip" class="form-control" value="<?php echo $details[5] ?>" id="inputZip">
                                                </div>

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-4 d-flex flex-column justify-content-between">
                                                <div class="">
                                                    <label for="photo">Profile Image :</label><br>
                                                    <input type="file" name="image[]" id="imageupdate">
                                                    <img style="max-width:250px; max-height:250px;" src="images/<?php echo $details[2]; ?>" class="uImg" alt="<?php echo $details[2]; ?>">
                                                </div>
                                                <div class="">
                                                    <label class="form-label">Gender</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($details[6] == 'male') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" <?php if ($details[6] == 'female') {
                                                                                                            echo 'checked';
                                                                                                        } ?> name="gender" id="female" value="female">
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" <?php if ($details[6] == 'other') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                        <label class="form-check-label" for="other">
                                                            Other
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <label class="form-label">Select Any two Hobbies</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" <?php if ($details[7] == 'reading' || $details[8] == 'reading') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> id="reading" value="reading">
                                                        <label class="form-check-label" for="reading">
                                                            Reading
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="writing" value="writing" <?php if ($details[7] == 'writing' || $details[8] == 'writing') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                        <label class="form-check-label" for="writing">
                                                            Writing
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="coding" value="coding" <?php if ($details[7] == 'coding' || $details[8] == 'coding') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                        <label class="form-check-label" for="coding">
                                                            Coding
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="singing" value="singing" <?php if ($details[7] == 'singing' || $details[8] == 'singing') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                        <label class="form-check-label" for="singing">
                                                            Singing
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit button -->
                                    </form>
                                    <div class="mt-4 mb-8 d-flex justify-content-around">
                                        <button name='update' onclick="update(event)" type="submit" class="btn btn-primary">Update</button>
                                        <a href="index.php" class="btn btn-primary"> Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        function update(event) {
            event.preventDefault();
            jQuery.ajax({
                url: 'updateprofile.php',
                type: 'post',
                data: " ",
                success: function() {
                    console.log("data");
                }
            });
        }

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
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>