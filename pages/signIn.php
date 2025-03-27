<?php
    include_once 'header.php';
    include_once 'footer.php';?>

<div style="margin-top:350px;">
    <h1 style="font-size:50px;margin-top:-90px;">Enter Your Details </h1>
    <div class="loginPopup">
        <div class="formContainer">
        <form action="../includes/signIn.inc.php" method="post">
            <input type="text" id="UserEmail" name="UserEmail" placeholder="UserEmail">
            <input type="password" id="password" name="password" placeholder="password">
            
            <input type="submit" value="Login" name="submit">

        <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyInputs"){
                        echo '<div class="error"> Fill all the Fields</div>';
                    }elseif($_GET["error"] == "invalidEmail"){
                        echo '<div class="error"> invalid Email</div>';
                    }elseif($_GET["error"] == "invalidUsername"){
                        echo '<div class="error"> invalid username </div>';
                    }elseif($_GET["error"] == "userDosentExists"){
                        echo '<div class="error"> User Dosent Exists </div>';
                    }elseif($_GET["error"] == "loginSuccessfully"){
                        echo '<div class="done"> Login Successfully </div>';
                    }elseif($_GET["error"] == "stmtFailed"){
                        echo '<div class="done"> Connection Failed </div>';
                    }
                }
            ?>
        </form>
                <p>New to here <a href="signUp.php"style="color:blue;">Register</a></p>
</div>
    </div>
</div>