<?php include __DIR__ . '/server/login_server.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="style/style.css">

    <title>Log in</title>
</head>

<body>
    <header>
        <span id="headText">MySQL Login System</span>
    </header>

    <div id="cusContainer">
        <p id="title" class="container">LOGIN</p>
        <hr>
        <?php if (isset($_SESSION['registered'])) : ?>
            <p id="correct">
                <?php
                echo $_SESSION['msg'];
                $_SESSION['registered'] = false;
                $_SESSION['msg'] = "";
                ?>
            </p>
        <?php elseif (isset($_SESSION['reset'])) : ?>
            <p id="correct">
            <?php
            echo $_SESSION['msg'];
            $_SESSION['reset'] = false;
            $_SESSION['msg'] = "";
            ?>
            </p>
        <?php endif ?>
        <p id="error">
            <?php echo $msg; ?>
        </p>
        <div class="center container">
            <div class="row">
                <div class="col-md-auto">
                    <img src="img/Group 7.png" alt="log in">
                </div>
                <div class="col">
                    <form method="post">
                        <div class="form-group">
                            <label for="userName">Username</label>
                            <br>
                            <input type="text" id="userName" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="submit" name="login_user">LOGIN</button>
                            </div>
                            <div class="col">
                                <a href="forgetPassword.php">Forget password</a>
                            </div>
                        </div>
                        <br><br>
                        <span id="text">New User &quest;</span> <a href="register.php">Sign up</a>
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