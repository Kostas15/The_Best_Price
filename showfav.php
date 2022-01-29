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
        .logo{
            font-family: 'Times New Roman', Times, serif;
            font-size: 35px;
            font-weight: bold;
            color: white;
            padding-left: 200px;
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
        .afav{
            display: inline-block;
            margin: 0px 20px;
            line-height: 50px;
            color: black;
            font-size: 30px;
            padding: 0px 5px;
            border: 1px solid #5F9EA0;
            background-color: #F8F8FF;
        }
        .afav:hover{
            background-color: #e2e2ee;
        }
        #favmod{
            position: absolute;
            top: 15%;
            left: 30%;
        }
        #favorites{
            position: absolute;
            top: 30%;
            left: 42%;
            width: 250px;
            border: 1px solid #9ad6d8;
            background-color: #a6f0f3;
            
        }
        .fav-items{
            padding-left: 10px;
            padding-top: 4px;
            padding-bottom: 4px;
            background-color: 9ad6d8;
        }
        #firstf{
            border-bottom: 1px solid #5F9EA0;
            font-size: large;
            cursor: default;
            width: 100%;
        }
        #f{
            width: 100%;
            background-color: 9ad6d8;
            
        }
        .checkbtn{
            font-size: 30px;
            color: white;
            float: right;
            line-height: 80px;
            margin-right: 90px;
            cursor: pointer;
            display: none;
        }
        #check{
            display: none;
        }
        @media (max-width: 1450px){
            #list{
                margin-right: 50px;
            }
            #favmod{
                left: 25%;
            }
        }
        @media (max-width: 1300px){
            
            #list{
                position: fixed;
                width: 150px;
                height: 330px;
                top: 80px;
                right: -100%;
                text-align: center;
                background-color: rgba(95, 158, 160,0.7);;
                z-index: 1;
            }
            li.list-item{
                display: block;
            }
            #check:checked ~ #list{
                right: 0;
            }
            .checkbtn{
                display: block;
            }
            #favmod{
                left: 18%;
            }
        }
        @media (max-width: 650px){
            .logo{
                font-size: 30px;
                padding-left: 20px;
            }
            .fav{
                display: inline-block;
                margin: 3px 10px;
                line-height: 40px;
                font-size: 20px;
                padding: 0px 5px;
            }
            #favmod{
                top: 15%;
                left: 8%;
            }
            #favorites{
                top: 32%;
                left: 20%;
                width: 250px;
                
            }
            #f{
                font-size: 18px;
            }
            .checkbtn{
                margin-right: 30px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <ion-icon name="reorder-four-outline"></ion-icon>
        </label>
        <label class="logo">The Best Price</label>
        <ul id="list">
            <li class="list-item"><a href="S3.php" class="nava">Home</a></li>
            <li class="list-item"><a href="favorites.php" class="active">Favorites</a></li>
            <li class="list-item"><a href="index.php?logout='1'" class="nava">logout</a></li>
            <li class="list-item"><p id="name"><?php echo $_SESSION['username']; ?></p></li>
        </ul>
    </nav>
    <div id="favmod">
        <a href="showfav.php" class="afav">Show favorites</a>
        <a href="insertfav.php" class="afav">Insert favorite</a>
        <a href="delfav.php" class="afav">Delete favorite</a>
    </div>
    
    <div id="favorites">
        <table id="f">
            <tr>
                <td class="fav-items" id="firstf">Favorites for <?php echo $_SESSION['username']; ?></td>
            </tr>
        <?php //to extract the fav from the database and appear them in the table
            $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
        
            $username = $_SESSION['username'];
            $sql = "SELECT Name FROM favorites WHERE username = '$username'";
            $result = $db->query($sql);
            //check if there are data in the database
            $i=1;
            if($num = mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                        <td class='fav-items'>".$i++."  ".$row['Name']."</td>
                        
                    </tr>
                    ";
                } 
            }else{
                echo "
                    <tr>
                        <td class='fav-items'>There are no favorite items at the moment</td>
                        
                    </tr>
                ";
            }            
            $db->close();
        ?>
        </table>   
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>