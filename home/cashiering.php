<?php
    require '../controller/getUserLogin.php';
    require '../controller/inventoryFunction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevCash | POS</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/sp.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .active-icon {
        color: #FF3300 !important;
        }

        .active-icon-border {
        border-bottom: 3px solid #FF3300;
        }

        .sidebar{
        position: fixed;
        width: 250px;
        height: 100vw;
        border-right: 1px solid #ddd;
        }

        .sidebar .container .navbar-nav .nav-item a {
        color: #000000 !important;
        }
    </style>
</head>
<body style="background: #F0F2F5;">
    <nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #fff">
        <div class="container col-10">
            <!-- <a class="navbar-brand" href="#"><img src="assets/img/devcash_full.png" alt="website logo" width="20%"></a> -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ml-auto mr-auto">
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="index.php"><i class="fas fa-home" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item mr-5 ml-5">
                        <a class="nav-link" href="employee.php"><i class="fas fa-id-badge" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item mr-5 ml-5">
                        <a  class="nav-link" href="inventory.php"><i class="fas fa-dolly-flatbed" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item mr-5 ml-5">
                        <a class="nav-link active-icon-border" href="cashiering.php"><i class="fas fa-cash-register active-icon" style="font-size: 25px;"></i></i></a>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link" href="profile.php"><i class="fas fa-user" style="font-size: 25px;"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <div class="space_1"></div>
        <div class="container">
            <img src="../assets/img/logo_new_rectangle.png" alt="website logo" width="70%">
            <div class="space_1"></div>

            <div class="container">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $fullname;?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Analytic</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="#">Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/signout.php">Log out</a>
                    </li>
                </ul>
            </div>

            <div class="container">
                <input class="form-control" type="text" name="search" id="search" placeholder="Search">
                <div class="space_05"></div>
                <input class="btn btn-warning" type="submit" value="Search">
            </div>
        </div>
    </div>

    <main>
    <div class="space_2"></div>
        <div class="container col-7 bg_white p-3" style="height: 600px;overflow: auto;">
            <div class="row">
            <?php foreach(inventoryList($_SESSION['id']) as $prod):?>
                <div class="col-3 p-3">
                    <div class="card" style="width: 100%">
                        <img src="uploads/<?php echo $prod['prod_img'] ?>" class="card-img-top undrag" alt="product image" height="150">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $prod['prod_name'] ?></h6>
                            <p class="card-text">$<?php echo number_format($prod['price'],2) ?></p>
                            <a href="#" class="btn btn-success col"><i class="fas fa-cart-plus white"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </main>

    <script src="../assets/qrcode/qrcode.js"></script>
    <script src="../assets/qrcode/qrcode.min.js"></script>
    <script src="https://kit.fontawesome.com/e5f5208af0.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#btnAdd").click(function(){
                $("#addEmployeeContainer").slideDown("slow");
            });

            $("#closeEmployeeContainer").click(function() {
                $("#addEmployeeContainer").slideUp("slow");
            });
        });
    </script>

<script>
        $(document).ready(function(){
            $("#qrbtn").click(function(){
                $("#qrcodecontainer").slideDown("slow");
            });

            $("#closeqr").click(function() {
                $("#qrcodecontainer").slideUp("slow");
            });
        });
    </script>

    <script>
        setTimeout(function() {
            $("#overlay-emp-success").fadeOut();
        }, 3000);
    </script>

    <script>
        var text = document.getElementById("text").value;
        new QRCode(document.getElementById("qrcode"), {
            text: text,
            width: 100,
            height: 100,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
</body>
</html>