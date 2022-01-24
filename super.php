<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  $username = $_SESSION['username'];
  $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
 $query = "select * from favorites where username = '$username'";  
 $run = $db->query($query);
 ?>  
 <!DOCTYPE html>  
 <htm lang="en">  
 <head>  
      <meta charset="utf-8">  
      <title>Delete Data From Database in PHP</title>  
      <style>
        *{  
            padding: 0;  
            margin: 0;  
            box-sizing: border-box;  
        }  
        body{  
            width: 100%;  
            height: 100vh;  
            background-color: #F8F8FF;  
            position: relative;  
            font-family: 'verdana',sans-serif;  
        }  
        header{  
            width: 100%;  
            height: 80px;  
            background-color: #5F9EA0;  
        }  
        table{  
            width: 75%;  
            position: absolute;  
            top: 50%;  
            left: 50%;  
            transform: translate(-50%,-50%);  
        }  
        .heading{  
            background-color: #5F9EA0;  
        }  
        .heading th{  
            padding: 10px 0;  
        }  
        .data{  
            text-align: center;  
            color: black;  
        }  
        .data td{  
            padding: 15px 0;  
        }  
        #btn{  
            text-decoration: none;  
            color: #FFF;  
            background-color: #e74c3c;  
            padding: 5px 20px;  
            border-radius: 3px;  
        }  
        #btn:hover{  
            background-color: #c0392b;  
        }  
    </style>
 </head>  
 <body>  
 <header></header>  
 <table border="1" cellspacing="0" cellpadding="0">  
      <tr class="heading">  
           <th>Sl No</th>  
           <th>ID</th>  
           <th>username</th>  
           <th>Product name</th>     
      </tr>  
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                               <td>".$i++."</td>  
                               <td>".$result['id']."</td>  
                               <td>".$result['username']."</td>  
                               <td>".$result['Name']."</td>  
                               <td><a href='del.php?name=$result[Name]' id='btn'>Delete</a></td>  
                          </tr>  
                     ";  
                }  
           }  
           /*
           #favorites{
            position: absolute;
            top: 25%;
            left: 42%;
            width: 350px;
            height: 400px;
            border: 1px solid #5f9ea0;
            border-radius: 10px;
            
        }
        .fav-items{
            padding-left: 10px;
            padding-top: 4px;
            padding-bottom: 4px;
        }
        #firstf{
            border-bottom: 1px solid #5F9EA0;
            font-size: large;
            cursor: default;
            
        }
        #f{
            width: 100%;
            
        }
           <div id="favorites">
        <table id="f">
           <tr>
                <td class="fav-items" id="firstf">Favorites for</td>
                <td class="fav-items" id="firstf"><b style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></b> </td>
                <td class="fav-items" id="firstf"></td>
            </tr>

            <?php //to extract the fav from the database and appear them in the table
            $db = mysqli_connect('localhost', 'root', '', 'project');
        
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM favorites WHERE username = '$username'";
            $result = $db->query($sql);
            //check if there are data in the database
            if($num = mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    
                    echo "
                    <tr>
                        <td class='fav-items'>".$row['id']."</td>
                        <td class='fav-items'>".$row['Name']."</td>
                        <td class='second'><a href='delete.php?name=$row[Name]?id=$row[id]' id='del''>Delete</a></td>
                    </tr>
                    ";
                } 
            } else{
                echo "
                    <tr>
                        <td class='fav-items'>There are no favorite items at the moment</td>
                        
                    </tr>
                ";
            } 
           */
      ?> 
      
      
 </table>  
 </body>  
 </html> 