<?php
session_start();
$msg = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['forget_password']) && isset($_POST['username']) && isset($_POST['newPassword'])) {
    include __DIR__ . "/../config.php";

    try {
        $username = $_POST['username'];
        $newPassword = $_POST['newPassword'];

        //checking if username exit
        $sql = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $sql->bindParam(":username", $username);
        $exe = $sql->execute();

        if (!$exe) {
            throw new LogicException("Username do not exit");
        }

        //collecting user data
        $user = $sql->fetch(PDO::FETCH_OBJ);
        //encripting password
        $pass = md5($newPassword);
        //overwriting password
        $id = $user->id;
        $o_sql = $conn->prepare("UPDATE users SET password = :password WHERE id = :id");
        $o_sql->bindParam(":password", $pass);
        $o_sql->bindParam(":id", $id);
        $ov_sql = $o_sql->execute();

        if (!$ov_sql) {
            throw new LogicException("Unable to reset password");
        }

        $_SESSION['reset'] = true;
        $_SESSION['msg'] = "Password reset successfully";

        header("location: login.php");
    } catch (LogicException $th) {
        $msg = $th->getMessage();
    } catch (Exception $t) {
        $msg = $t->getMessage();
    }
}
