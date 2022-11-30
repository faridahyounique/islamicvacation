<?php
    
    require_once "config/connect_database.php";
    $state = $_POST["state"];
    $sql ="SELECT * FROM local_governments WHERE state_name = '$state' ORDER BY name ASC";
    $result = mysqli_query($conn, $sql);
    if($result){
        ?>
            <option value="">Select Local Government</option>
        <?php
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["name"];?>"><?php echo $row["name"];?></option>
        <?php
            }
    }
    else{?>
        <option><?php echo "Sql error' .[$conn->error].'";?></option>
        <!-- <option><?php echo $sql; ?></option> -->
<?php
    }

?>