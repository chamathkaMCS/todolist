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
            <h1 style="margin:auto;font-size:30px;color:rgb(97, 121, 156);font-family:Arial;margin:auto;margin-top:150px">  No Records Available<br>with this user account</h1>
        <?php
        }
        while($row=mysqli_fetch_array($result)){
            $itemName = $row["itemName"];
            $status = $row["status"];
            $itemId = $row["itemId"];
            
            if ($status=="not"){
        ?>      <div class="todoitemholder">
                    <div class="todoitem">
                        <button id="status" class="iconHolder" data-itemId="<?php echo $itemId; ?>" data-status="done">
                            <div class="todo"></div>
                            <span class="tooltiptext">Mark as Done</span>
                        </button>
                        <h5 style="margin-left:30px;"><?php echo $itemName?></h5>
                        <button id="delete" class="iconHolder" style="position:absolute;right:0px;" data-itemId="<?php echo $itemId; ?>">
                            <i class="material-icons delete">delete</i>
                        </button>
                    </div>
                </div>
        <?php
            }else{
                ?>      <div class="todoitemholder">
                    <div class="todoitem">
                        <button id="status" class="iconHolder" data-itemId="<?php echo $itemId; ?>" data-status="not">
                            <span class="tooltiptext">Mark as not Done</span>
                            <div class="com">
                                <h1 style='font-family:arial;color:white;font-size:17px'>&#10004;</h1>
                            </div>
                        </button>
                        <h5 style="margin-left:30px;"><?php echo $itemName?></h5>
                        <button id="delete" class="iconHolder" style="position:absolute;right:0px;" data-itemId="<?php echo $itemId; ?>">
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

        fetch("save.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(result => {
            console.log(result);
            if (result.status === "success") {
                console.log("Data saved successfully!");
                location.reload();
            } else {
                console.log("Error:", result.message);
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });

        event.target.value = "";
        }
    });
     document.querySelectorAll("#status").forEach(button => {
    button.addEventListener("click", function() {
          
          let status = this.dataset.status;
          let itemId = this.dataset.itemid;

          fetch("statusupdate.php", {
              method: "POST",
              headers: { "Content-Type": "application/x-www-form-urlencoded" },
              body: "itemId=" + encodeURIComponent(itemId) + "&status=" + encodeURIComponent(status)
          })
        .then(response => response.text())
        .then(data => {
            setTimeout(function() {
                location.reload();
            }, 100);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
    });
     document.querySelectorAll("#delete").forEach(button => {
    button.addEventListener("click", function() {
          
          let itemId = this.dataset.itemid;

          fetch("delete.php", {
              method: "POST",
              headers: { "Content-Type": "application/x-www-form-urlencoded" },
              body: "itemId=" + encodeURIComponent(itemId)
          })
        .then(response => response.text())
        .then(data => {
            setTimeout(function() {
                location.reload();
            }, 100);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
    });

</script>
<?php
include_once 'footer.php';
?>