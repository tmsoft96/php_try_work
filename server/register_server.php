<?php
session_start();
$msg = null;
$_SESSION['fText'] = "";
$_SESSION['lText'] = "";
$_SESSION['eText'] = "";
$_SESSION['uText'] = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cPassword'])) {
    include __DIR__ . "/../config.php";
    try {
        $firstName = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];
        $username = $_POST['username'];

        //checking exiting user
        $sql = $conn->prepare("SELECT COUNT(*) AS 'count' FROM users WHERE username = :username OR email = :email");
        $sql->bindParam(":username", $username);
        $sql->bindParam(":email", $email);
        $exe = $sql->execute();
        $count = $sql->fetch(PDO::FETCH_OBJ)->count;

        if ($count > 0) {
            throw new LogicException("User already exit");
        }

        //confirming password match
        if ($password != $cPassword) {
            //saving data if password error
            $_SESSION['fText'] = $firstName;
            $_SESSION['lText'] = $lastname;
            $_SESSION['uText'] = $username;
            $_SESSION['eText'] = $email;
            throw new LogicException("Password do not match");
        }

        //registering user
        //encripting password
        $pass = md5($password);
        $r_sql = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (:first_name, :last_name, :username, :email, :password)");
        $r_sql->bindParam(":first_name", $firstName);
        $r_sql->bindParam(":last_name", $lastname);
        $r_sql->bindParam(":username", $username);
        $r_sql->bindParam(":email", $email);
        $r_sql->bindParam(":password", $pass);
        $reg_exe = $r_sql->execute();

        if (!$reg_exe) {
            throw new LogicException("Unable to register your account");
        }

        $_SESSION['registered'] = true;
        $_SESSION['msg'] = "Account created successfully";

        //redirecting user to login page
        header("location: login.php");
        
    } catch (LogicException $th) {
        $msg = $th->getMessage();
    } catch (Exception $ex) {
        $msg = $ex->getMessage();
    }
}
