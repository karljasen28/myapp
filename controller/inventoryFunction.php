<?php
    function addInventory($user_id, $prod_img, $prod_name, $prod_brand, $qty, $price) {
        $db = db();
        $sql = "INSERT INTO inventory(user_id, prod_img, prod_name, prod_brand, qty, price) VALUES (?,?,?,?,?,?)";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($user_id, $prod_img, $prod_name, $prod_brand, $qty, $price));
        $db = null;

        return "Product created";
    }

    if(isset($_POST['addInventory'])) {
        $user_id = $_POST['user_id'];
        $prod_img = $_FILES['productimage']['name'];
        $prod_name = $_POST['prod_name'];
        $prod_brand = $_POST['prod_brand'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];

        $folder = "uploads/".basename($prod_img); 

        if(!empty($prod_name) && !empty($prod_brand) && !empty($qty) && !empty($price)) {
            if(move_uploaded_file($_FILES['productimage']['tmp_name'], $folder)) {
                $intSuccess = addInventory($user_id, $prod_img, $prod_name, $prod_brand, $qty, $price);
            }
        } 
        else {
            $intError = "Failed to create product";
        }
    }


    function inventoryList($session_id) {
        $db = db();
        $sql = "SELECT * FROM inventory WHERE user_id = ?";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($session_id));
        $row = $cmd->fetchAll();
        $db = null;

        return $row;
    }


    function inventoryCount($session_id) {
        $db = db();
        $sql = "SELECT COUNT(inv_id) FROM inventory WHERE user_id = ?";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($session_id));
        $row = $cmd->fetch();
        $db = null;

        return $row;
    }

    foreach(inventoryCount($_SESSION['id']) as $rows_count) {
        $inv_count = $rows_count;
    }


    function getQR($inv_id) {
        $db = db();
        $sql = "SELECT * FROM inventory WHERE inv_id = ?";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($inv_id));
        $row = $cmd->fetchAll();
        $db = null;

        return $row;
    }
?>