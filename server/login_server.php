<?php
session_start();
$msg = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_user']) && isset($_POST['username']) && isset($_POST['password'])) {
    include __DIR__ . "/../config.php";

    try {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $sql = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $sql->bindParam(":username", $username);
        $exe = $sql->execute();

        if (!$exe) {
            throw new LogicException("Wrong username entered");
        }

        $user = $sql->fetch(PDO::FETCH_OBJ);
        $password = md5($pass);

        if ($password != $user->password) {
            throw new LogicException("Incorrect password entered");
        }

        $_SESSION['username'] = $user->username;
        $_SESSION['firstname'] = $user->first_name;
        $_SESSION['lastname'] = $user->last_name;
        $_SESSION['email'] = $user->email;
        $_SESSION['logged'] = true;

        header("location: welcome.php");
    } catch (LogicException $th) {
        $msg = $th->getMessage();
    } catch (Exception $t) {
        $msg = $t->getMessage();
    }
}
