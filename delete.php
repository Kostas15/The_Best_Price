<?php
include("delfav.php");

    $id = $_GET['id'];
    $Name = $_GET['name'];
    $sql = "DELETE FROM `favorites` WHERE `id`='1' AND `Name`='$Name' ";
    $delete = $db->query($sql);
    
    if($delete){
        //echo"did it";
        header('location:delete.php');  
    } else {
        echo "error";
    }
?>


   