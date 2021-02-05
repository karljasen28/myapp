<?php
    require 'model/db.php';

    function register($fname, $lname, $gender, $age, $username, $password, $status) {
        $db = db();
        $sql = "INSERT INTO users (fname, lname, gender, age, username, password, status) VALUES (?,?,?,?,?,?,?)";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($fname, $lname, $gender, $age, $username, $password, $status));
        $db = null;

        return "Registration Complete";
    }

    if(isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $status = "Unverified";

        if(!empty($fname) && !empty($lname) && !empty($gender) && !empty($age) && !empty($username) && !empty($password)) {
            $success = register($fname, $lname, $gender, $age, $username, $password, $status);
        } else {
            $error = "Failed to register";
        }
    }
?>