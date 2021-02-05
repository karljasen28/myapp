<?php
    require 'model/db.php';
    
    function login($username, $password) {
        $db = db();
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($username, $password));
        $row = $cmd->fetch(PDO::FETCH_ASSOC);
        $db = null;

        return $row;
    }

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $row = login($username, $password);

        if($row > 0) {
            $_SESSION['id'] = $row["id"];
            header("location: home/");
        } else {
            $error = "Account not found";
        }
    }
?>