<?php
    require '../controller/getUserLogin.php';
    require '../controller/employeeFunction.php';
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
                        <a class="nav-link active-icon-border" href="employee.php"><i class="fas fa-id-badge active-icon" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item mr-5 ml-5">
                        <a  class="nav-link" href="inventory.php"><i class="fas fa-dolly-flatbed" style="font-size: 25px;"></i></a>
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
        <div class="container col-lg-6 bg_white position-fixed shadow box_t_w_grey p-4" id="addEmployeeContainer" style="z-index: 999;top: 20%;margin-left: 25%;display: none;">
            <h3>Employee Info</h3>
            <form method="POST" action="<?PHP $_SELF_PHP ?>">
                <input type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>

                <div class="form-group">
                    <label for="fname">First name</label>
                    <input class="form-control" type="text" name="emp_fname" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input class="form-control" type="text" name="emp_lname" required>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="emp_gender" required>
                                <option hidden></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="position">Position</label>
                            <select class="form-control" name="position" required>
                                <option hidden></option>
                                <option value="Cashier">Cashier</option>
                                <option value="Inventory">Inventory</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space_1"></div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <input class="form-control btn btn-primary" type="submit" name="addEmployee" value="Create">
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
            <h3>Employee List</h3>
            <button class="btn btn-info" id="btnAdd">Add Employee</button>

            <div class="space_1"></div>

            <table class="table table-hover table-striped">
                <thead class="text-center bg_orange">
                    <tr class="white">
                        <th scope="col" style="color: #ffffff;">#</th>
                        <th scope="col" style="color: #ffffff;">First</th>
                        <th scope="col" style="color: #ffffff;">Last</th>
                        <th scope="col" style="color: #ffffff;">Gender</th>
                        <th scope="col" style="color: #ffffff;">Position</th>
                        <th scope="col" style="color: #ffffff;">Status</th>
                        <th scope="col" style="color: #ffffff;">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach(employeeList($_SESSION['id']) as $rows) { ?>
                    <tr>
                        <td><?php echo $rows['emp_id']; ?></td>
                        <td><?php echo $rows['emp_fname']; ?></td>
                        <td><?php echo $rows['emp_lname']; ?></td>
                        <td><?php echo $rows['emp_gender']; ?></td>
                        <td><?php echo $rows['position']; ?></td>
                        <td><?php echo $rows['status']; ?></td>
                        <td>
                        <a class="btn btn-success" href="#empinfo" title="Employee Info"><i class="far fa-eye white"></i></a>
                            <a class="btn btn-primary" href="#edit" title="Update Employee"><i class="far fa-edit white"></i></a>
                            <button class="btn btn-danger" type="submit" name="delete" title="Remove Employee"><i class="far fa-trash-alt white"></i></button>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/e5f5208af0.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        // $("#addEmployeeContainer").hide();
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
        setTimeout(function() {
            $("#overlay-emp-success").fadeOut();
        }, 3000);
    </script>
</body>
</html>