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
    <link href="MyCss/assets/style.css" rel="stylesheet">
    <script src="MyCss/assets/style.js"></script>
    <script src="MyCss/assets/jquery.js"></script>
    <link href="MyCss/assets/font.css" rel="stylesheet">
</head>

<body>
    <main>
        <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img7.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div id="modal">

                    </div>
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
                                                    <span id='fname'></span>
                                                </div>

                                                <div class="mb-2 ">
                                                    <label class="form-label" for="form3Example2cg">Last Name</label>
                                                    <input type="text" name="lname" id="form3Example2cg" value="<?php echo $user[3] ?>" class="form-control" />
                                                    <span id='lname'></span>
                                                </div>
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
                                            <div class="col-1"></div>
                                            <!-- Col 3 -->
                                            <div class="col-4 d-flex flex-column justify-content-between">
                                                <div class="">
                                                    <label for="photo">Profile Image :</label><br>
                                                    <input type="file" name="image" id="imageupdate">
                                                    <img style="max-width:250px; max-height:250px; cursor: url(MyCss/Images/cursor.png),auto;" src="MyCss/images/<?php echo $details[2]; ?>" class="uImg" alt="<?php echo $details[2]; ?>">
                                                    <span id='image'></span>
                                                </div>
                                                <div class="">
                                                    <label class="form-label">Gender</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($details[6] == 'male') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                        <label class="form-check-label" for="male">Male</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" <?php if ($details[6] == 'female') {
                                                                                                            echo 'checked';
                                                                                                        } ?> name="gender" id="female" value="female">
                                                        <label class="form-check-label" for="female">Female</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" <?php if ($details[6] == 'other') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                        <label class="form-check-label" for="other">Other</label>
                                                    </div>
                                                    <span id='gender'></span>
                                                </div>
                                                <div class="">
                                                    <label class="form-label">Select Any two Hobbies</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" <?php if ($details[7] == 'reading' || $details[8] == 'reading') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> id="reading" value="reading">
                                                        <label class="form-check-label" for="reading">Reading</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="writing" value="writing" <?php if ($details[7] == 'writing' || $details[8] == 'writing') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                        <label class="form-check-label" for="writing">Writing</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="coding" value="coding" <?php if ($details[7] == 'coding' || $details[8] == 'coding') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                        <label class="form-check-label" for="coding">Coding</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="singing" value="singing" <?php if ($details[7] == 'singing' || $details[8] == 'singing') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                        <label class="form-check-label" for="singing">Singing</label>
                                                    </div>
                                                    <span id='hobbie'></span>
                                                </div>
                                            </div>
                                            <!-- Butttons -->
                                            <div class="mt-4 mb-8 d-flex justify-content-around">
                                                <button name='update' onclick="update1()" type="button" class="btn btn-success">Update</button>
                                                <a  href="profile.php" class="btn btn-success">Go Back</a>
                                            </div>
                                        </div>
                                        <!-- Submit button -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
                        if (res > 0) {
                            window.location.href = 'profile.php';
                        } else {
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