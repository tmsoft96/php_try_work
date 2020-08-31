<?php include __DIR__ . '/server/register_server.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="style/style.css">

    <title>Register</title>
</head>

<body>
    <header>
        <span id="headText">MySQL Login System</span>
    </header>

    <div id="cusContainer">
        <p id="title" class="container">CREATE ACCOUNT</p>
        <hr>

        <p id="error">
            <?php 
                echo $msg;
            ?>
        </p>
        <div class="center container">
            <div class="row">
                <div class="col-md-auto">
                    <br><br>
                    <img src="img/Group 5.png" alt="register" width="500px" height="auto">
                </div>
                <div class="col">
                    <form method="post" action="register.php">
                        <div class="form-group">
                            <label for="userName">First Name</label>
                            <br>
                            <input type="text" id="userName" name="firstname" required
                                value="<?php echo $_SESSION['fText']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="userName">Last Name</label>
                            <br>
                            <input type="text" id="userName" name="lastname" required
                                value="<?php echo $_SESSION['lText']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="userName">Username</label>
                            <br>
                            <input type="text" id="username" name="username" required
                                value="<?php echo $_SESSION['uText']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="emailT">Email</label>
                            <br>
                            <input type="email" id="emailT" name="email" required
                                value="<?php echo $_SESSION['eText']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"  id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="cPassword">Confirm Password</label>
                            <input type="password"  id="cPassword" name="cPassword" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="submit" name="register_user">SIGN UP</button>
                            </div>
                            <div class="col">
                                <span id="text">Already a user &quest;</span> <a href="login.php">Log in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="footer" style="position:relative">
        <span class="footText">&copy; 2020 - 01181342D Michael Tamakloe Kofi</span>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
</body>

</html>