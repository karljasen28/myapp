<?php
    require '../controller/getUserLogin.php';
    require '../controller/inventoryFunction.php';

    foreach(getQR($_GET['qr_id']) as $rows) {
        $name = $rows['prod_name'];
        $prod = $rows['prod_brand'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/sp.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div id="qrvalue" hidden>
        <?php echo $name; ?>
    </div>
    <div class="container mr-auto ml-auto" style="margin-top: 10%; overflow:hidden;">
        <center>
        <div class="col">
            <div id="qrcode" style="width: 300px; padding: 20px; border: 2px solid #000;border-radius: 25px;"></div>
        </div>
        </center>
        <br>
        <a class="btn btn-secondary" href="inventory.php">Back to inventory</a>
    </div>

    <script src="../assets/qrcode/qrcode.js"></script>
    <script src="../assets/qrcode/qrcode.min.js"></script>
    <script src="https://kit.fontawesome.com/e5f5208af0.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        var text = document.getElementById("qrvalue").innerHTML;
        new QRCode(document.getElementById("qrcode"), {
            text: text,
            width: 250,
            height: 250,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
</body>
</html>