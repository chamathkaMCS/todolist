<?php
include_once 'header.php';
?>
<div class="fillDiv"><h1 class="heading">ToDo List</h1></div>
<div class="loginHolder">
  <div class="fillDiv" style="padding-top:50px;"><h1 style="color:#07435a; font-family: 'Crafty Girls', cursive;">Welcome to the ToDo.lk</h1></div>
  <div class="fillDiv" style="padding-right:30px;padding-left:30px;"><p>
    "This website helps you manage your daily tasks and activities, keeping you organized and on track. It's like having a digital diary for your to-do list, ensuring you never miss an important task and stay productive."
  </p></div>
  <div class="fillDiv">
    <button class="btn btn-primary" onclick="window.location='signin.php'">Sign In</button>
    <button class="btn btn-primary" onclick="window.location='signUp.php'">Sign Up</button>
  </div>
</div>
<?php
include_once 'footer.php';
?>