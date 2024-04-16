<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'session.php';
    if (isset($_POST['complete'])) {
        include 'connection.php';

        $flag = true;
        $error = "<br>";

        // Image Validation
        $image = $_FILES['image'];
        $image_name = $image['name'];
        if (empty($image_name[0])) {
            $flag = false;
            $error .= "Please upload an image<br>";
        }
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

        if (!$flag){
            echo '<div class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
            <strong>Error!</strong> ' . $error . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else{
            $gender = $_POST['gender'];
            $hobbies = $_POST['hobbies'];
            $msg = "INSERT INTO user_details (user_id, image, city, state, zip, gender, hobbie1, hobbie2) VALUES ($id, '$image_name[0]', '$city', '$state', $zip, '$gender', '$hobbies[0]', '$hobbies[1]');";
            $msg2 = 'SELECT * FROM user_details where user_id = '.$id;
            $data1 = $conn->query($msg2);
            if($data1->num_rows>0){
                header("Location: updateprofile.php");
            }
            else if($conn->query($msg) === TRUE) {
                header("Location: index.php?msg=ProfileCompleted");
            }
        }
    }

    ?>

    <main>
        <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img7.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-4">
                                    <!-- <h2 class=" text-uppercase text-center mt-2"><?php echo $user_name . " " ?><img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2> -->
                                    <h2 class='text-uppercase text-center mb-4'>Complete your profile</h2>
                                    <form class="row g-3 mt-4" method="post" enctype="multipart/form-data">
                                        <!-- Upload profile picture -->
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mb-2">
                                                    <label for="formFile" class="form-label">Upload profile picture</label>
                                                    <input class="form-control" name="image[]" type="file" id="formFile">
                                                </div>
                                                <!-- City -->
                                                <div class="mb-2">
                                                    <label for="inputCity" class="form-label">City</label>
                                                    <input type="text" name="city" class="form-control" id="inputCity">
                                                </div>

                                                <!-- State -->
                                                <div class="mb-2">
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
                                                </div>
                                                <!-- Zip -->
                                                <div class="">
                                                    <label for="inputZip" class="form-label">Zip</label>
                                                    <input type="text" name="zip" class="form-control" id="inputZip">
                                                </div>

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-3 d-flex flex-column justify-content-between">
                                                <!-- Gender radio buttons -->
                                                <div class="">
                                                    <label class="form-label">Gender</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                                        <label class="form-check-label" for="other">
                                                            Other
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Hobbies -->
                                                <div class="">
                                                    <label class="form-label">Select Any two Hobbies</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="reading" value="reading">
                                                        <label class="form-check-label" for="reading">
                                                            Reading
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="writing" value="writing">
                                                        <label class="form-check-label" for="writing">
                                                            Writing
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="coding" value="coding">
                                                        <label class="form-check-label" for="coding">
                                                            Coding
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="singing" value="singing">
                                                        <label class="form-check-label" for="singing">
                                                            Singing
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Submit button -->
                                        <div class="mt-4 mb-8 d-flex justify-content-around">
                                            <button name='complete' type="submit" class="btn btn-primary">Complete</button>
                                        </div>
                                    </form>
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