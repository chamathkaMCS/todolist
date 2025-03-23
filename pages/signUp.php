<?php
    include_once 'header.php';
    include_once 'footer.php';?>

<div style="margin-top:300px;">
    <h1 style="font-size:50px;margin-top:-90px;">Enter Your Details </h1>
    <div class="loginPopup">
        <div class="formContainer">
        <form action="../includes/signUp.inc.php" method="post">
            <input type="text" id="UserEmail" name="UserEmail" placeholder="UserEmail">
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="password" id="repeatPassword" name="repeatPassword" placeholder="Confirm Password">
        
            <input type="submit" value="Create Account" name="submit">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyInputs"){
                        echo '<div class="error"> Fill all the Fields</div>';
                    }elseif($_GET["error"] == "invalidEmail"){
                        echo '<div class="error"> invalid Email</div>';
                    }elseif($_GET["error"] == "userExists"){
                        echo '<div class="error"> Email or username already exists</div>';
                    }elseif($_GET["error"] == "passwordDosentMatch"){
                        echo '<div class="error"> password doesn\'t match </div>';
                    }elseif($_GET["error"] == "loginSuccessfully"){
                        echo '<div class="done"> Login Successfully </div>';
                    }elseif($_GET["error"] == "stmtFailed"){
                        echo '<div class="done"> Connection Failed </div>';
                    }
                }
            ?>
        </form>
                <p class=>Already have a account <a href="signIn.php" style="color:blue;">Sign in</a></p>
    </div>
</div>
