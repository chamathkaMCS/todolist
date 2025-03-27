<?php
include_once 'header.php';
?>
<div class="fillDiv"><h2 class="heading">ToDo List</h2></div>
<div class="todolist">
    <div class="fillDiv" style="height:100px;">
        <input type="text" placeholder="Write here..." id="inputbox">
    </div>
        <?php
            require_once '../includes/conn.inc.php';
            $userId = $_SESSION["userid"];
            $query = "SELECT * FROM items
            WHERE userId = $userId;";
            $result = mysqli_query($conn,$query);

            if(mysqli_num_rows($result)==0){
        ?>
            <h1 style="margin:auto;font-size:30px;color:rgb(0, 0, 0);font-family:Arial;margin:auto;margin-top:150px">  No Records Available<br>with this user account</h1>
        <?php
        }
        while($row=mysqli_fetch_array($result)){
            $itemName = $row["itemName"];
            $status = $row["status"];
            
            if ($status=="not"){
        ?>      <div class="todoitemholder">
                    <div class="todoitem">
                        <button class="iconHolder">
                            <div class="todo"></div>
                            <span class="tooltiptext">Mark as Done</span>
                        </button>
                        <h5 style="margin-left:30px;"><?php echo $itemName?></h5>
                        <button class="iconHolder" style="position:absolute;right:0px;">
                            <i class="material-icons delete">delete</i>
                        </button>
                    </div>
                </div>
        <?php
            }else{
                ?>      <div class="todoitemholder">
                    <div class="todoitem">
                        <button class="iconHolder">
                            <span class="tooltiptext">Mark as not Done</span>
                            <div class="com">
                                <h1 style='font-family:arial;color:white;font-size:17px'>&#10004;</h1>
                            </div>
                        </button>
                        <h5 style="margin-left:30px;"><?php echo $itemName?></h5>
                        <button class="iconHolder" style="position:absolute;right:0px;">
                            <i class="material-icons delete">delete</i>
                        </button>
                    </div>
                </div>
        <?php
            }
        }
    ?>
</div>
<script>
    document.getElementById("inputbox").focus();
    document.getElementById("inputbox").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        let message = event.target.value.trim();
        if (message === "") return;

        // Send data to the backend using fetch
        fetch("save.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(result => {
            console.log(result); // Log result from server
            if (result.status === "success") {
                console.log("Data saved successfully!");
                location.reload(); // Refresh the page after saving data
            } else {
                console.log("Error:", result.message);
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });

        event.target.value = ""; // Clear the input after sending
    }
});

</script>
<?php
include_once 'footer.php';
?>