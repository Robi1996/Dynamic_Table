<?php
include("dbconnection.php");

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    
    $query = "SELECT * FROM sellr WHERE s_Name = '$name'";
    $result = mysqli_query($db, $query);
    
    if(mysqli_num_rows($result) > 0) {
        echo "exists";
    } else {
        echo "available";
    }
} else {
    
    echo "error";
}
?>
