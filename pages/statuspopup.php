<?php
    include_once 'header.php';
    include_once 'footer.php';?>

<div style="margin-top:350px;">
    <div class="loginPopup">
        <h1 class="no1" style="font-size:50px;margin-top:-90px;">Do you want to<h1><h3> Delete this Activity </h3></br><h2>or</h2></br> <h3>Mark as Complete this Activity</h3>
        <div class="formContainer">
            <div class="row">
            <button id="delete" class="btn btn-danger" >Delete</button>
            <button id="update"class="btn btn-primary" >Complete</button>
                   
        </div>
    </div>
</div>
 <script>
        function deleteItem(itemId) {
            if (confirm("Are you sure you want to delete this item?")) {
                window.location.href = "delete.php?itemId=" + encodeURIComponent(itemId);
            }
        }

        function updateItem(itemId) {
            let newItemName = prompt("Enter new item name:");
            if (newItemName) {
                window.location.href = "update.php?itemId=" + encodeURIComponent(itemId) + "&newItemName=" + encodeURIComponent(newItemName);
            }
        }
    </script>
