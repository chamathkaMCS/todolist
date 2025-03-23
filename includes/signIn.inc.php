<?php
if (isset($_POST["submit"])){
        $UserEmail = $_POST["UserEmail"];
        $password = $_POST["password"];

        require_once 'conn.inc.php';
        require_once 'functions.inc.php';

        $signInEmpty = signinEmptyCheck($UserEmail,$password);

        if($signInEmpty !== false){
            header("Location:../pages/signIn.php?error=emptyInputs");
            exit;
        }
        LogUser($conn,$UserEmail,$password);
}
else{
    header('Location:../pages/signIn.php');
    exit;
}