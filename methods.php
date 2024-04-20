<?php
function update($id){
    $flag = true;
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

    $image = $_POST['photo'];

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
        $res = "<div style='z-index:1; max-width: 400px; min-width: 300px;' class='modal-dialog position-absolute top-0 end-0 me-4'>
            <div class='modal-content'>
            <div class='modal-header  d-flex justify-content-between'>
                <h1 class='modal-title fs-5' id='exampleModalLabel'>Fix these Errors</h1>
            </div>
            <div class='modal-body'>
                    $error
                </div>
            </div>
            </div>";
        echo $res;
    } else {
        include 'connection.php';
        $hobbies = $_POST['hobbies'];
        $msg = "UPDATE users SET fname = '$fname', lname = '$lname', phone = $phone, email = '$email' WHERE id = $id;";
        $conn->query($msg);
        $msg2 = "";
        if ($image != "") {
            $msg2 = "UPDATE user_details SET image = '$image', gender = '$_POST[gender]', hobbie1 = '$hobbies[0]', hobbie2 = '$hobbies[1]', state = '$state', city = '$city', zip = '$zip' WHERE user_id = $id;";
        } else {
            $msg2 = "UPDATE user_details SET gender = '$_POST[gender]', hobbie1 = '$hobbies[0]', hobbie2 = '$hobbies[1]', state = '$state', city = '$city', zip = $zip WHERE user_id = $id;";
        }
        $conn->query($msg2);
        echo true;
    }
}

function addVendor($id){

}