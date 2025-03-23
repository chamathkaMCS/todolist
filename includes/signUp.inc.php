<?php
if (isset($_POST["submit"])){
        $UserEmail = $_POST["UserEmail"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];

        require_once 'conn.inc.php';
        require_once 'functions.inc.php';

        $signUpEmpty = signUpEmptyCheck($UserEmail,$password,$repeatPassword);
        $invalidEmail = invalidEmail($UserEmail);
        $userExists = userExists($conn,$UserEmail);
        $passwordDosentMatch = passwordDosentMatch($password,$repeatPassword);


        if($signUpEmpty !== false){
            header("Location:../pages/signUp.php?error=emptyInputs");
            exit;
        }elseif($invalidEmail !== false){
            header("Location:../pages/signUp.php?error=invalidEmail");
            exit;
        }elseif($userExists !== false){
            header("Location:../pages/signUp.php?error=userExists");
            exit;
        }elseif($passwordDosentMatch !== false){
            header("Location:../pages/signUp.php?error=passwordDosentMatch");
            exit;
        }
        createUser($conn,$UserEmail,$password,$repeatPassword);
}
else{
    header('Location:../pages/signIn.php');
    exit;
} 