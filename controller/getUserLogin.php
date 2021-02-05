<?php
    require '../model/db.php';

    $session_id = $_SESSION['id'];

    function getUserLogin($session_id) {
        $db = db();
        $sql = "SELECT * FROM users WHERE id = ?";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($session_id));
        $row = $cmd->fetch();
        $db = null;

        return $row;
    }

    $user = getUserLogin($session_id);
    $fname = $user['fname'];
    $lname = $user['lname'];
    $gender = $user['gender'];
    $age = $user['age'];
    $user_id = $user['id'];

    $fullname = $fname. ' ' .$lname;
?>