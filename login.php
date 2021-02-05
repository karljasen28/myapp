<?php
    require 'controller/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevCash | POS</title>
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/sp.css">

    <!-- Bootstrap SDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light py-3">
        <div class="container col-10">
                <a class="navbar-brand" href="index.html"><img src="assets/img/devcash_full.png" alt="website logo" width="20%"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">ABOUT</a>
                    </li>
                    
                    <li class="nav-item">
                        <a  class="nav-link" href="#contact">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container col-6 bg_ww_grey" style="overflow-y: auto;margin-top: 10%;">
        <?php  
            if(!empty($error)) {
        ?>
        <strong class="alert alert-warning"><?php echo $error ?></strong>
        <?php } ?>
        <br>
            <div class="container text_center txt_center">
                <img src="assets/img/logo_new_square.png" alt="logo icon" width="80">
                <h3>Welcome</h3>
            </div>
            <form class="form-horizontal" action="<?php $_SELF_PHP ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="form-group">
                    <input class="form-control btn btn-primary" type="submit" name="login" value="Login">
                </div>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>