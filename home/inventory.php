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
                        <a  class="nav-link active-icon-border" href="inventory.php"><i class="fas fa-dolly-flatbed active-icon" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item mr-5 ml-5">
                        <a class="nav-link" href="cashiering.php"><i class="fas fa-cash-register" style="font-size: 25px;"></i></i></a>
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
        <!-- Add Model Container -->
        <div class="container col-lg-6 bg_white position-fixed shadow box_t_w_grey p-4" id="addEmployeeContainer" style="z-index: 999;top: 10%;margin-left: 25%;display: none; height: 610px;overflow: auto;">
            <h3>Product Info</h3>
            <form method="POST" action="<?PHP $_SELF_PHP ?>" enctype="multipart/form-data">
                <input type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>
                <div class="form-group">
                    <img src="#" id="img-output" alt="" width="100" style="border: 1px solid #ccc;">
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input class="form-control" type="file" name="productimage" onchange="loadfile(event)" required>
                </div>

                <div class="form-group">
                    <label>Product Name</label>
                    <input class="form-control" type="text" name="prod_name" required>
                </div>

                <div class="form-group">
                    <label>Product Brand</label>
                    <input class="form-control" type="text" name="prod_brand" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input class="form-control" type="text" name="qty" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" name="price" step="0.01" required>
                </div>

                <div class="space_1"></div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <input class="form-control btn btn-primary" type="submit" name="addInventory" value="Create">
                        </div>
                        <div class="col-3">
                            <input class="form-control btn btn-danger" name="cancel" id="closeEmployeeContainer" value="Cancel">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="space_3"></div>

        <!-- Succes message for Addling Employee -->
        <div id="overlay-emp-success">
            <?php  
                if(!empty($empSuccess)) {
            ?>
                <div class="container col-lg-7 alert alert-success">
                    <strong><?php echo $empSuccess ?></strong>
                </div>
            <?php } ?>
        </div>

        <!-- Error message for Adding Employee -->
        <?php  
            if(!empty($empError)) {
        ?>
            <div class="container col-lg-7 alert alert-warning">
                <strong><?php echo $empError ?></strong>
            </div>
        <?php } ?>

        <!-- Employee Table List -->
        <div class="container col-lg-7 bg_white pt-5 pb-5">
            <h3>Inventory List</h3>
            <button class="btn btn-info" id="btnAdd">Create Product</button>

            <div class="space_1"></div>

            <table class="table table-hover table-striped">
                <thead class="text-center bg_orange">
                    <tr class="white">
                        <th scope="col" style="color: #ffffff;">#</th>
                        <th scope="col" style="color: #ffffff;">Product Name</th>
                        <th scope="col" style="color: #ffffff;">Brand</th>
                        <th scope="col" style="color: #ffffff;">Price</th>
                        <th scope="col" style="color: #ffffff;">Qty.</th>
                        <th scope="col" style="color: #ffffff;">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach(inventoryList($_SESSION['id']) as $inv) { ?>
                    <tr>
                        <td><?php echo $inv['inv_id']; ?></td>
                        <td><?php echo $inv['prod_name']; ?></td>
                        <td><?php echo $inv['prod_brand']; ?></td>
                        <td>$<?php echo number_format($inv['price'], 2); ?></td>
                        <td><?php echo $inv['qty']; ?></td>
                        <td>
                            <a class="btn btn-success" href="product-qrcode.php?qr_id=<?php echo $inv['inv_id'];?>" id="qrbtn" title="View QR Code"><i class="far fa-eye white"></i></a>
                            <a class="btn btn-primary" href="#edit" title="Update Product"><i class="far fa-edit white"></i></a>
                            <button class="btn btn-danger" type="submit" name="delete" title="Remove Product"><i class="far fa-trash-alt white"></i></button>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
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

    <script>
        var loadfile = function(event){
            var image = document.getElementById('img-output');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>