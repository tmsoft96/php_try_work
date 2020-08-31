<?php 
    include __DIR__ . '/server/forget_password_server.php';
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

    <title>Forget Password</title>
</head>

<body>
    <header>
        <span id="headText">MySQL Login System</span>
    </header>

    <div id="cusContainer">
        <p id="title" class="container">FORGET PASSWORD</p>
        <hr>
        <p id="error">
            <?php echo $msg; ?>
        </p>
        <div class="center container">
            <div class="row">
                <div class="col-md-auto">
                    <img src="img/Group 9.png" alt="forget password" width="500px" height="auto">
                </div>
                <div class="col">
                    <form method="post">
                        <div class="form-group">
                            <label for="userName">Username</label>
                            <br>
                            <input type="text" id="userName" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" name="newPassword" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="submit" name="forget_password">RESET</button>
                            </div>
                        </div>
                    </form>
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