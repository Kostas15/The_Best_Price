<?php //to insert favorite product into database
    include("insertfav.php");

    $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
    if($db -> connect_error){
        die("connection failed:".$db->connect_error);
    }
    $query2 = "select * from users where username = '$username'";  
    $run = $db->query($query2);
    if ($num = mysqli_num_rows($run)>0) { 
        while ($result = mysqli_fetch_assoc($run)) {  
            $id2 = $result['id'];
        }
    }
    $id = $id2;
    $username = $_SESSION['username'];
    $product = $_POST['favprod'];

    $sql = "INSERT INTO `favorites`(`id`, `username`, `Name`) VALUES ('$id','$username','$product')";
    $result = mysqli_query($db,$sql);
           
    if($result){
        echo "<div id='finalresult'>Product inserted successfully</div>";
    }else{
        echo "<div id='wrongresult'>Product already in list</div>";
    }
       
    $db->close();
?>