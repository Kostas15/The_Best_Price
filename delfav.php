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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
    <style>
        body{
            font-family: 'Trebuchet MS';
            background-color: #F8F8FF;
        }
        *{
            padding: 0;
            margin: 0;
            text-decoration: none;
            list-style: none;
        }
        nav{
            height: 80px;
            width: 100%;
            background-color: #5F9EA0;

        }
        label.logo{
            font-family: 'Times New Roman', Times, serif;
            font-size: 35px;
            font-weight: bold;
            color: white;
            padding: 0px 200px;
            line-height: 80px;
        }
        #list{
            float: right;
            margin-right: 200px;
        }
        li.list-item{
            display: inline-block;
            margin: 0px 8px;
            line-height: 80px;
        }
        .nava{
            color: white;
            font-size: 18px;
            text-transform: uppercase;
            border: 1px solid transparent;
            border-radius: 3px;
            padding: 7px 10px;
        }
        .nava:hover{
            border: 1px  solid white;
            transition: .2s;
        }
        .active{
            color: white;
            font-size: 18px;
            text-transform: uppercase;
            border: 1px solid transparent;
            border-radius: 3px;
            padding: 7px 10px;
            border: 1px  solid white;
        }
        #name{
            text-transform: capitalize;
            font-size: 25px;
        }
        #tablee{  
            width: 75%;  
            position: absolute;  
            top: 500px;  
            left: 50%;  
            transform: translate(-50%,-50%);  
        }  
        .heading{  
            background-color: #9cebee;  
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
        .fav{
            display: inline-block;
            margin: 0px 20px;
            line-height: 50px;
            font-size: 30px;
            padding: 0px 5px;
            border: 1px solid #5F9EA0;
            background-color: #F8F8FF;
        }
        .fav:hover{
            background-color: #e2e2ee;
        }
        #favmod{
            position: absolute;
            top: 15%;
            left: 30%;
        }
        
        .afav{
            color: black;
        }
        
    </style>
</head>
<body>
<header></header>
    <nav>
        <label class="logo">The Best Price</label>
        <ul id="list">
            <li class="list-item"><a href="S3.php" class="nava">Home</a></li>
            <li class="list-item"><a href="favorites.php" class="active">Favorites</a></li>
            <li class="list-item"><a href="index.php?logout='1'" class="nava">logout</a></li>
            <li class="list-item"><p id="name"><?php echo $_SESSION['username']; ?></p></li>
        </ul>
    </nav>
    <div id="favmod">
        <button class="fav"><a href="showfav.php" class="afav">Show favorites</a></button>
        <button class="fav"><a href="insertfav.php" class="afav">Insert favorite</a></button>
        <button class="fav"><a href="delfav.php" class="afav">Delete favorite</a></button>
    </div>

    <table id="tablee" border="1" cellspacing="0" cellpadding="0">  
      <tr class="heading">   
           <th>Sl No</th>  
           <th>ID</th>  
           <th>username</th>  
           <th>Product name</th>     
           <th>Operation</th>     
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
        ?>
        </table>
        
    </div>


</body>
</html>