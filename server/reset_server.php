<?php
session_start();
$msg = null;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset_password']) && isset($_POST['oldPassword'])  && isset($_POST['newPassword'])){
    include __DIR__ . "/../config.php";

    try {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $username = $_SESSION['username'];

        //checking user if old password = current password entered
        $sql = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $sql->bindParam(":username", $username);
        $sql->execute();

        $user = $sql->fetch(PDO::FETCH_OBJ);
        $oldPass = md5($oldPassword);
        if ($oldPass != $user->password){
            throw new LogicException("Current password wrong");
        }

        //updating user password
        $id = $user->id;
        $newPass = md5($newPassword);
        $u_sql = $conn->prepare("UPDATE users SET password = :password WHERE id = :id");
        $u_sql->bindParam(":password", $newPass);
        $u_sql->bindParam(":id", $id);
        $up_exe = $u_sql->execute();

        if(!$up_exe){
            throw new LogicException("Unable to reset password");
        }

        $_SESSION['reset'] = true;
        $_SESSION['msg'] = "Password reset successfully";

        header("location: welcome.php");
    } catch (LogicException $th) {
        $msg = $th->getMessage();
    } catch (Exception $t) {
        $msg = $t->getMessage();
    }
}