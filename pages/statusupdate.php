<?php
    require_once '../includes/conn.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['itemId'])&& isset($_POST['status'])){
        $itemId = $_POST['itemId'];
        $status = $_POST['status'];
        $sql = "UPDATE items SET status = ? WHERE itemId = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../signUp.php?error=stmtFailed");
            exit;
        }
        mysqli_stmt_bind_param($stmt,"si",$status, $itemId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}