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
        #insertmod{
            position: absolute;
            top: 30%;
            left: 41%;
            border: 1px solid #5F9EA0;
            padding: 10px;
            align-items: center;
        }
        #mod{
            margin: 10%;
            width: 300px;
            height: 180px;
        }
        #finalresult{
            position: absolute;
            bottom: 15%;
            left: 40%;
            background-color: #9ad6d8;
            border: 1px solid #9ad6d8;
            border-radius: 5px;
            padding: 20px;
            font-size: 25px;
        }
        #wrongresult{
            position: absolute;
            bottom: 15%;
            left: 42%;
            background-color: #e7a5a1;
            border: 1px solid #e7a5a1;
            border-radius: 5px;
            padding: 20px;
            font-size: 25px;
        }
        .clear{
            border: 1px solid black;
            padding: 2px 10px;
            background-color: #5F9EA0;
            text-transform: capitalize;
            font-size: 20px;
            color: white;
        }
        .clear:hover{
            background-color: #70d9dd;
            color: black;
        }
        #submit{
            border: 1px solid black;
            padding: 2px 10px;
            background-color: #5F9EA0;
            text-transform: capitalize;
            font-size: 20px;
            color: white;
            margin-left: 20px;
        }
        #submit:hover{
            background-color: #70d9dd;
            color: black;
        }
        #result{
            line-height: 30px;
            margin-top: 10px;
            margin-bottom: 35px;
            padding-left: 10px;
            font-size: 15px;
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
            .logo{
                padding-left: 100px;
            }
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
                background-color: rgba(95, 158, 160,0.7);
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
            #insertmod{
                left: 35%;
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
            #insertmod{
                top: 32%;
                left: 17%;
            }
            #mod{
                font-size: 18px;
                margin: 10%;
                width: 300px;
                height: 180px;
            }
            #finalresult{
                bottom: 15%;
                left: 10%;
                font-size: 20px;
            }
            #wrongresult{
                bottom: 15%;
                left: 20%;
                font-size: 20px;
            }
            .checkbtn{
                margin-right: 30px;
            }
        }
        @media (max-width: 520px){
            .logo{
                font-size: 30px;
                padding-left: 30px;
            }
            #mod{
                font-size: 18px;
                margin: 5%;
                width: 250px;
                height: 160px;
            }
            #finalresult{
                bottom: 15%;
                left: 10%;
                font-size: 20px;
            }
            #wrongresult{
                bottom: 15%;
                left: 20%;
                font-size: 20px;
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
    
    <div id="insertmod">
        <div id="mod">

        <form action="insert.php" method="POST">
            <label for="favprod" style="font-size: 20px;">Pick your product:</label><br><br>
            <input list="prods" id="result" name="favprod" type="text" placeholder="Pick a product">
            <datalist id="prods">
                <option value="Milk">
                <option value="Bread">
                <option value="Wine">
                <option value="Cheese">
                <option value="Ham">
                <option value="Cereal">
                <option value="Beer">
                <option value="Toilet paper">
                <option value="Water">
                <option value="Yogurt">

            </datalist>
            <br>
            <a class="clear" href="insertfav.php">clear</a>
            <button type="submit" class="button" id="submit">Submit</button>

        </form>
        </div>
    </div>
 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>