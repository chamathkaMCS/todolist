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
            <h1 style="margin:auto;font-size:50px;color:rgb(178, 192, 180);font-family:Arial;margin-top:20vh">  No Records Available with this Email account</h1>
        <?php
        }
        while($row=mysqli_fetch_array($result)){
            $itemName = $row["itemName"];
            $status = $row["status"];

            if ($status=="not"){
        ?>      <div class="todoitemholder">
                <a class="todoitem"href="statuspopup.php?itemId=<?php echo urlencode($row['itemId']); ?>"><?php echo $itemName?></a>
                <div class="icon">
                </div>
                </div>
        <?php
            }else{
                ?><div class="todoitemholder">
                <a class="todoitemdone" href="statuspopup.php?itemId=<?php echo urlencode($row['itemId']); ?>"><?php echo $itemName?><?php echo $itemName?></a>
                </div>
            <?php
            }
        }
    ?>
</div>
<script>
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