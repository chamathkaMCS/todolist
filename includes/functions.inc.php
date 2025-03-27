<?php
function signinEmptyCheck($UserEmail,$password){
    $result;
    if(empty($UserEmail) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function logUser($conn,$UserEmail,$password){
    $userExists = userExists($conn,$UserEmail);
    if($userExists === False){
        header("Location:../pages/signIn.php?error=userDosentExists");
        exit;
    }
    $passwordHashed = $userExists["password"];
    $passwordCheck = password_verify($password,$passwordHashed);
    if($passwordCheck === false){
        header("Location:../pages/signIn.php?error=wrongPassword");
        exit;
    }else if($passwordCheck === true){
        session_start();
        $_SESSION["userid"] = $userExists["userId"];
        header("Location:../pages/home.php");
    }
}
function signUpEmptyCheck($UserEmail,$password,$repeatPassword){
    $result;
    if(empty($UserEmail) || empty($password) || empty($repeatPassword)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidEmail($UserEmail){
    $result;
    if(!filter_var($UserEmail,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function userExists($conn,$UserEmail){
    $sql = "SELECT*FROM useraccount WHERE UserEmail =?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../signUp.php?error=stmtFailed");
        exit;
    }
    mysqli_stmt_bind_param($stmt,"s",$UserEmail);
    mysqli_stmt_execute($stmt);

    $resultRow = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultRow)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}
function passwordDosentMatch($password,$repeatPassword){
    $result;
    if($password !== $repeatPassword){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function createUser($conn,$UserEmail,$password,$repeatPassword){
    $sql = "INSERT INTO useraccount(userEmail,password) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../signUp.php?error=stmtFailed");
        exit;
    }
    $passwordHashed = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ss",$UserEmail,$passwordHashed);
    mysqli_stmt_execute($stmt);
    session_start();
    $userExists = userExists($conn,$UserEmail);
    $_SESSION["userid"] = $userExists["userId"];
    header("Location:../pages/home.php");
    mysqli_stmt_close($stmt);
}