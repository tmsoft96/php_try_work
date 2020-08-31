<?php
session_start();
    if(isset($_SESSION['logged']) != true || !isset($_SESSION['logged'])){
        header("location: login.php");
    }

    if (isset($_GET['logout'])){
        session_destroy();
        header('location: login.php');
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="style/style.css">

    <title>Hompage</title>

    <style>
        #log a {
            position: fixed;
            right: 1px;
            margin-right: 100px;
            font-weight: bold;
        }

        #log a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <span id="headText">MySQL Login System</span>
    </header>

    <div id="cusContainer">
        <div id="log">
        <a href="welcome.php?logout='1'">Logout</a>
        </div>
        <br><br>
        <?php if (isset($_SESSION['reset'])) : ?>
            <p id="correct">
                <?php
                    echo $_SESSION['msg'];
                    $_SESSION['reset'] = false;
                    $_SESSION['msg'] = "";
                ?>
            </p>
            <br>
        <?php endif ?>
        <div class="center homeContainer">
            <div class="row">
                <div class="col-md-auto">
                    <img src="img/Group 4.png" alt="homepage" width="600px" height="auto">
                </div>
                <div class="col">
                    <p class="homeText"><b>Welcome back <strong><?php echo $_SESSION['username']; ?></strong></b></p>
                    <hr>
                    <p class="sText"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <p class="sText"><?php echo $_SESSION['email']; ?></p>
                    <br><br>
                    <button class="submit" style="margin-left: 60px;"><a href="reset.php" style="color: white; ">Reset Password</a></button>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <span class="footText">&copy; 2020 - 01181342D Michael Tamakloe Kofi</span>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
</body>

</html>