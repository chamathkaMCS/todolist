<!doctype html>
<?php 
    session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To do List </title>
    <link  rel="stylesheet" href="styles.css">
    <link  rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
  </head>
  <body style="display:flex;background-image:url('../images/bg 1_25.png'); background-size: cover;font-weight: 50;">
    <div id="loader"></div>
   <script>
      var loader = document.getElementById("loader")
      window.addEventListener("load",function () {
        
        loader.style.display="none";
      })
    </script>