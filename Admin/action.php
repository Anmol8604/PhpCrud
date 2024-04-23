<?php
include 'auth.php';
$id = $_SESSION['id'];
$method =  $_POST['methodName'];

if ($method == 'update') {
    function update($id)
    {
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
            $res = "<div  id='popUp' style='z-index:1; max-width: 400px; min-width: 300px;' class='modal-dialog position-absolute top-0 end-0 me-4'>
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
    update($id);
} else if ($method == 'state') {
    $countryVal = $_POST['countryVal'];
    function state($countryVal)
    {
        include 'connection.php';
        $queryState = $pubConn->query("SELECT id, name FROM `states` WHERE country_id = " . $countryVal);
        $res = $queryState->fetch_all();
        $str = "";
        foreach ($res as $state) {
            $str .= "<option value=\"$state[0]\">$state[1]</option>";
        }
        echo $str;
    }
    state($countryVal);
} else if ($method == 'city') {
    $stateVal = $_POST['stateVal'];
    function city($stateVal)
    {
        include 'connection.php';
        $queryCity = $pubConn->query("SELECT id, name FROM `cities` WHERE state_id = " . $stateVal);
        $res = $queryCity->fetch_all();
        $str = "";
        foreach ($res as $city) {
            $str .= "<option value=\"$city[0]\">$city[1]</option>";
        }
        echo $str;
    }
    city($stateVal);
} else if ($method == 'addVendor') {
    function addVendor()
    {
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

        // City validation
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

        // Country Validation
        $country = trim($_POST['country']);
        if ($country == "Choose...") {
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

        // BType Validation
        $businessT = trim($_POST['businessT']);
        if ($businessT == "Choose...") {
            $flag = false;
            $error .= "Please select a Business Type<br>";
        }

        // BName Validation
        $Bname = trim($_POST['Bname']);
        if ($Bname == "Choose...") {
            $flag = false;
            $error .= "Please select a Business Name<br>";
        }


        if (!$flag) {
            $res = "<div  id='popUp' style='z-index:1; max-width: 400px; min-width: 300px;' class='modal-dialog position-absolute top-0 end-0 me-4'>
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
            $usersQuery = "INSERT INTO users (user_type, fname, lname, email, phone) VALUES (2, '$fname', '$lname', '$email', '$phone')";
            $conn->query($usersQuery);
            $id = $conn->insert_id;
            $detailsQuery = "INSERT INTO user_details (user_id, city, state, country, zip, Btype, Bname) VALUES ('$id', '$city', '$state', '$country', '$zip', '$businessT', '$Bname')";
            $conn->query($detailsQuery);
        }
    }
    addVendor();
} else if ($method == 'searchVen') {
    $search = $_POST['search'];
    if ($search == "") {    // || strlen($search) < 3
        include 'connection.php';
        $query = 'Select users.id, fname, lname, email, Btype, Bname  from users inner join user_details where users.id = user_details.user_id && users.user_type = 2 LIMIT 5;';
        $data = $conn->query($query);
        $i = 0;
        while ($res = $data->fetch_array()) {
            echo "<tr>";
            echo "<td class='table-active'>" . ++$i . "</td>";
            echo "<td>" . $res['fname'] . " " . $res['lname'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td>" . $res['Btype'] . "</td>";
            echo "<td>" . $res['Bname'] . "</td>";
            echo '<td>
                <a href=""><img src="MyCss/images/eye.png" alt=""></a>
                <a href=""><img src="MyCss/images/cursor.png" alt=""></a>
                <a href=""><img src="MyCss/images/delete.png" alt=""></a>
                </td>';
            echo "</tr>";
        }
    } else {
        include 'connection.php';
        $query = 'Select users.id, fname, lname, email, Btype, Bname  from users inner join user_details where (users.id = user_details.user_id && users.user_type = 2) && (fname like "%' . $search . '%" || lname like "%' . $search . '%" || email like "%' . $search . '%" || Btype like "%' . $search . '%" || Bname like "%' . $search . '%") LIMIT 5;';
        $data = $conn->query($query);
        if($data->num_rows == 0){
            echo "<tr><td colspan='6' class='text-center'>No Record Found</td></tr>";
        }
        $i = 0;
        while ($res = $data->fetch_array()) {
            echo "<tr>";
            echo "<td class='table-active'>" . ++$i . "</td>";
            echo "<td>" . $res['fname'] . " " . $res['lname'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td>" . $res['Btype'] . "</td>";
            echo "<td>" . $res['Bname'] . "</td>";
            echo '<td>
                <a href=""><img src="MyCss/images/eye.png" alt=""></a>
                <a href=""><img src="MyCss/images/cursor.png" alt=""></a>
                <a href=""><img src="MyCss/images/delete.png" alt=""></a>
                </td>';
            echo "</tr>";
        }
    }
} else if ($method == 'pagination'){
    $page = $_POST['page'];
    include 'connection.php';
    $query = 'Select users.id, fname, lname, email, Btype, Bname  from users inner join user_details where users.id = user_details.user_id && users.user_type = 2 LIMIT 5 OFFSET '.($page-1)*5;
    $data = $conn->query($query);
    $i = 0;
    while ($res = $data->fetch_array()) {
        echo "<tr>";
        echo "<td class='table-active'>" . ++$i . "</td>";
        echo "<td>" . $res['fname'] . " " . $res['lname'] . "</td>";
        echo "<td>" . $res['email'] . "</td>";
        echo "<td>" . $res['Btype'] . "</td>";
        echo "<td>" . $res['Bname'] . "</td>";
        echo '<td>
            <a href=""><img src="MyCss/images/eye.png" alt=""></a>
            <a href=""><img src="MyCss/images/cursor.png" alt=""></a>
            <a href=""><img src="MyCss/images/delete.png" alt=""></a>
            </td>';
        echo "</tr>";
    }
}