<?php   
 include("super.php");  
        
        $name = $_GET['name'];   
        $query = "DELETE FROM `favorites` WHERE `username` = '$username' AND `Name`='$name'";  
        $run = $db->query($query); 
        if ($run) {  
            header('location:delfav.php');  
        }else{ 
            
            echo "Error: ".mysqli_error($conn);  
        }    
 ?>