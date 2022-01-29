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
    <link rel="stylesheet" href="style2.css">
    <title>The Best Price</title>
    <style>
        #body1{
            opacity: 1;
            padding: 10px;
        }
        #body2{
            opacity: 1;
            padding: 10px;
        }
        #body3{
            opacity: 1;
            padding: 10px;
        }
        .logo{
            font-family: 'Times New Roman', Times, serif;
            font-size: 35px;
            font-weight: bold;
            color: white;
            padding-left: 200px;
            line-height: 80px;
        }
        #products{
            position: absolute;
            top: 37%;
            left: 10%;
            width: 200px;
            height: 360px;
            border: 1px solid #5F9EA0;
            border-radius: 10px;
        }
        .products-item{
            padding-left: 10px;
            padding-top: 4px;
            padding-bottom: 4px;
        }
        .prod{
            padding: 2px;
            border: none;
            background-color: #F8F8FF;
            font-size: large;
        } 
        .prod.active, .prod:hover{
            background-color: pink;
            transition: .2s;
        }
        .placeButton{
            border: none;
            font-size: large;
            background-color: #F8F8FF;
        }
        .placeButton.active, .placeButton:hover{
            background-color: pink;
            transition: .2s;
        }
        #table1{
            opacity: 0;
        }
        #table2{
            opacity: 0;
        }
        #table3{
            opacity: 0;
        }
        .clear{
            position: absolute;
            bottom: 10px;
            left: 35%;
            padding: 5px 10px;
            font-size: large;
            color: white;
            background-color: #5F9EA0;
            border: 1px solid #5F9EA0;
            border-radius: 6px;
        }
        .clear:hover{
            background-color: #85dfe2;
            color: black;
        }
        #modfinalres{
            position: absolute;
            bottom: 15%;
            left: 45%;
            font-size: 25px;
            color: #5F9EA0;
        }
        #result{
            position: absolute;
            top: 20%;
            left: 35%;
            width: 900px;
            height: 500px;
            border: 1px solid #5f9ea0;
            border-radius: 10px;
            background-color: #5f9ea0;
        }
        #name{
            text-transform: capitalize;
            font-size: 25px;
        }
        .del{
            color: black;
            font-size: 15px;
        }
        .deleteBtn{
            float: right;
        }
        td{
            width: 90px;
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
            #result{
                left: 24%;
            }
            #products{
                left: 3%;
            }
            #place{
                left: 3%;
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
            
        }
        @media (max-width: 650px){
            .logo{
                font-size: 30px;
                padding-left: 20px;
            }
            #result{
                top: 15%;
                left: 35%;
                height: 1000px;
                width: 300px;
            }
            #res1{
                width: 250px;
                height: 300px;
                top: 30px;
                left: 20px;
            }
            #res2{
                width: 250px;
                height: 300px;
                top: 360px;
                left: 20px;
            }
            #res3{
                width: 250px;
                height: 300px;
                top: 690px;
                left: 20px;
            }
            
            #products{
                top: 33%;
                width: 120px;
            }
            #place{
                top: 15%;
                width: 120px;
            }
            #modfinalres{
                top: 10%;
                left: 25%;
            }
            .checkbtn{
                margin-right: 30px;
            }
        }
        @media (max-width: 520px){
            .logo{
                font-size: 30px;
                padding-left: 20px;
            }
            #result{
                top: 15%;
                left: 35%;
                height: 970px;
                width: 230px;
            }
            #res1{
                width: 200px;
                height: 300px;
                top: 15px;
                left: 13px;
            }
            #res2{
                width: 200px;
                height: 300px;
                top: 335px;
                left: 13px;
            }
            #res3{
                width: 200px;
                height: 300px;
                top: 655px;
                left: 13px;
            }
            
            #products{
                top: 33%;
                left: 1.5%;
                width: 120px;
            }
            #place{
                top: 15%;
                left: 1.5%;
                width: 120px;
            }
            #modfinalres{
                top: 10%;
                left: 10%;
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
            <li class="list-item"><a class="active" href="S3.php">Home</a></li>
            <li class="list-item"><a href="favorites.php">Favorites</a></li>
            <li class="list-item"><a href="index.php?logout='1'">logout</a></li>
            <li class="list-item"><p id="name"><?php echo $_SESSION['username']; ?></p></li>
        </ul>
    </nav>
    <div id="place">
        <ul>
            <li class="place-item" id="first" >Place</li>
            <li class="place-item"><button class="placeButton" id="pl1" onclick="showSpar()">Spar</button></li>
            <li class="place-item"><button class="placeButton" id="pl2" onclick="showLidl()">Lidl</button></li>
            <li class="place-item"><button class="placeButton" id="pl3" onclick="showHofer()">Hofer</button></li>
        </ul>
    </div>
    <div id="products">
        <ul>
            <li class="products-item" id="first">Products</li>
            <li class="products-item"><button class="prod" onclick="milk()" id="pr1">Milk</button></li>
            <li class="products-item"><button class="prod" onclick="bread()" id="pr2">Bread</button></li>
            <li class="products-item"><button class="prod" onclick="wine()" id="pr3">Wine</button></li>
            <li class="products-item"><button class="prod" onclick="cheese()" id="pr4">Cheese</button></li>
            <li class="products-item"><button class="prod" onclick="ham()" id="pr5">Ham</button></li>
            <li class="products-item"><button class="prod" onclick="cereal()" id="pr6">Cereal</button></li>
            <li class="products-item"><button class="prod" onclick="beer()" id="pr7">Beer</button></li>
            <li class="products-item"><button class="prod" onclick="toiletpaper()" id="pr8">Toilet paper</button></li>
            <li class="products-item"><button class="prod" onclick="water()" id="pr9">Water</button></li>
            <li class="products-item"><button class="prod" onclick="yogurt()" id="pr10">Yogurt</button></li>

        </ul>
    </div>
    <div id="result">
        <div class="restab" id="res1">
            <div id="body1">
                <table id="table1">
                    <tr>
                    <?php
                        $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                        if($db -> connect_error){
                            die("connection failed:".$db->connect_error);
                        }
                        $sql = "SELECT Name FROM place WHERE ID = 100";
                        $result = $db->query($sql);

                        //check if there are data in the database
                        if($result-> num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<tr><td><h2>".$row["Name"]."</h2></td></tr>";
                                }
                            
                        } else {
                            echo "0 results";
                        }
                        $db->close();
                    ?>
                    </tr>
                    
                </table>
                <button class="clear" id="clear1" onclick="delAllRows1()">Clear</button>
            </div>
        </div>
        <div class="restab" id="res2">
            <div id="body2">
                <table id="table2">
                    <tr>
                    <?php
                        $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                        if($db -> connect_error){
                            die("connection failed:".$db->connect_error);
                        }
                        $sql = "SELECT Name FROM place WHERE ID = 200";
                        $result = $db->query($sql);

                        //check if there are data in the database
                        if($result-> num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<tr><td><h2>".$row["Name"]."</h2></td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $db->close();
                    ?>
                    </tr>
                    
                </table>
                <button class="clear" id="clear2" onclick="delAllRows2()">Clear</button>
            </div>
        </div>
        <div class="restab" id="res3">
            <div id="body3">
                
                <table id="table3">
                    <tr>
                    <?php
                        $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                        if($db -> connect_error){
                            die("connection failed:".$db->connect_error);
                        }
                        $sql = "SELECT Name FROM place WHERE ID = 300";
                        $result = $db->query($sql);

                        //check if there are data in the database
                        if($result-> num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<tr><td><h2>".$row["Name"]."</h2></td></tr>";
                            }
                                        
                        } else {
                            echo "0 results";
                        }
                        $db->close();
                    ?>
                    </tr>
                                
                </table>
                <button class="clear" id="clear3" onclick="delAllRows3()">Clear</button>
                 
            </div>
        </div>
    </div>
    <div id="modfinalres">
        <p id="finalres"></p>
    </div>
    <div id="php for products">
        <?php
            //milk for spar
            $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=1";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $milk1 = $row["Name"];
                        $mprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";         
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //milk for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=1";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $milk2 = $row["Name"];
                        $mprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";         
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //milk for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=1";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $milk3 = $row["Name"];
                        $mprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";         
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //bread for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=2";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $bread1 = $row["Name"];
                        $bprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //bread for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=2";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $bread2 = $row["Name"];
                        $bprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //bread for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=2";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $bread3 = $row["Name"];
                        $bprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //wine for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=3";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $wine1 = $row["Name"];
                        $wprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //wine for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=3";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $wine2 = $row["Name"];
                        $wprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //wine for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=3";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $wine3 = $row["Name"];
                        $wprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //cheese for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=4";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $cheese1 = $row["Name"];
                        $cprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //cheese for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=4";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $cheese2 = $row["Name"];
                        $cprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //cheese for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=4";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $cheese3 = $row["Name"];
                        $cprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //ham for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=5";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $ham1 = $row["Name"];
                        $hprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //ham for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=5";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $ham2 = $row["Name"];
                        $hprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //ham for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=5";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $ham3 = $row["Name"];
                        $hprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //cereal for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=6";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $cereal1 = $row["Name"];
                        $crprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //cereal for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=6";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $cereal2 = $row["Name"];
                        $crprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                   // echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //cereal for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=6";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $cereal3 = $row["Name"];
                        $crprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                   // echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //beer for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=7";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $beer1 = $row["Name"];
                        $brprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //beer for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=7";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $beer2 = $row["Name"];
                        $brprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //beer for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=7";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $beer3 = $row["Name"];
                        $brprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //tp for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=8";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $tp1 = $row["Name"];
                        $tprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //tp for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=8";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $tp2 = $row["Name"];
                        $tprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //tp for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=8";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $tp3 = $row["Name"];
                        $tprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //water for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=9";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $w1 = $row["Name"];
                        $wprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //water for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=9";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $w2 = $row["Name"];
                        $wprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //water for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=9";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $w3 = $row["Name"];
                        $wprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //yogurt for spar
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=100 AND ID_PR=10";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $y1 = $row["Name"];
                        $yprice1 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //water for lidl
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=200 AND ID_PR=10";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $y2 = $row["Name"];
                        $yprice2 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            <?php
                //water for hofer
                $db = mysqli_connect('', 'codeigniter', 'codeigniter2019', 'SISIII2022_89201172');
                if($db -> connect_error){
                    die("connection failed:".$db->connect_error);
                }
                $sql = "SELECT ID, Name, Price FROM products WHERE ID=300 AND ID_PR=10";
                $result = $db->query($sql);

                //check if there are data in the database
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $y3 = $row["Name"];
                        $yprice3 = $row["Price"];
                        //echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>";
                    }
                    //echo "</table>";
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
            
        </div>
    <script>
        const table1 = document.getElementById("table1");
        const table2 = document.getElementById("table2");
        const table3 = document.getElementById("table3");
        var finalres = document.getElementById("finalres");

        function milk(){
            var milk1 = '<?= $milk1 ?>';
            var mprice1 = '<?= $mprice1 ?>';
            var milk2 = '<?= $milk2 ?>';
            var mprice2 = '<?= $mprice2 ?>';
            var milk3 = '<?= $milk3 ?>';
            var mprice3 = '<?= $mprice3 ?>';
            
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${milk1}</td>
                    <td>${mprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${milk2}</td>
                    <td>${mprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;  
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${milk3}</td>
                    <td>${mprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(mprice1 < mprice2){
                    finalres.innerHTML = "Best price of milk in Spar"
                } else{
                    finalres.innerHTML = "Best price of milk in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(mprice1 < mprice3){
                    finalres.innerHTML = "Best price of milk in Spar"
                } else{
                    finalres.innerHTML = "Best price of milk in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(mprice3 < mprice2){
                    finalres.innerHTML = "Best price of milk in Hofer"
                } else{
                    finalres.innerHTML = "Best price of milk in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(mprice1 < mprice2 && mprice1 < mprice3){
                    finalres.innerHTML = "Best price of milk in Spar"
                } else if(mprice2 < mprice1 && mprice2 < mprice3){
                    finalres.innerHTML = "Best price of milk in lidl"
                }else {
                    finalres.innerHTML = "Best price of milk in Hofer"
                }
            }
        }   
        function bread(){
            var bread1 = '<?= $bread1 ?>';
            var bprice1 = '<?= $bprice1 ?>';
            var bread2 = '<?= $bread2 ?>';
            var bprice2 = '<?= $bprice2 ?>';
            var bread3 = '<?= $bread3 ?>';
            var bprice3 = '<?= $bprice3 ?>';
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${bread1}</td>
                    <td>${bprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${bread2}</td>
                    <td>${bprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
               table3.innerHTML += `
                <tr>
                    <td>${bread3}</td>
                    <td>${bprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `; 
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(bprice1 < bprice2){
                    finalres.innerHTML = "Best price of bread in Spar"
                } else{
                    finalres.innerHTML = "Best price of bread in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(bprice1 < bprice3){
                    finalres.innerHTML = "Best price of bread in Spar"
                } else{
                    finalres.innerHTML = "Best price of bread in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(bprice3 < bprice2){
                    finalres.innerHTML = "Best price of bread in Hofer"
                } else{
                    finalres.innerHTML = "Best price of bread in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(bprice1 < bprice2 && bprice1 < bprice3){
                    finalres.innerHTML = "Best price of bread in Spar"
                } else if(bprice2 < bprice1 && bprice2 < bprice3){
                    finalres.innerHTML = "Best price of bread in lidl"
                }else {
                    finalres.innerHTML = "Best price of bread in Hofer"
                }
            }         
        }
        function wine(){
            var wine1 = '<?= $wine1 ?>';
            var wprice1 = '<?= $wprice1 ?>';
            var wine2 = '<?= $wine2 ?>';
            var wprice2 = '<?= $wprice2 ?>';
            var wine3 = '<?= $wine3 ?>';
            var wprice3 = '<?= $wprice3 ?>';
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${wine1}</td>
                    <td>${wprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${wine2}</td>
                    <td>${wprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
               table3.innerHTML += `
                <tr>
                    <td>${wine3}</td>
                    <td>${wprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;   
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(wprice1 < wprice2){
                    finalres.innerHTML = "Best price of wine in Spar"
                } else{
                    finalres.innerHTML = "Best price of wine in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(wprice1 < wprice3){
                    finalres.innerHTML = "Best price of wine in Spar"
                } else{
                    finalres.innerHTML = "Best price of wine in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(wprice3 < wprice2){
                    finalres.innerHTML = "Best price of wine in Hofer"
                } else{
                    finalres.innerHTML = "Best price of wine in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(wprice1 < wprice2 && wprice1 < wprice3){
                    finalres.innerHTML = "Best price of wine in Spar"
                } else if(wprice2 < wprice1 && wprice2 < wprice3){
                    finalres.innerHTML = "Best price of wine in lidl"
                }else {
                    finalres.innerHTML = "Best price of wine in Hofer"
                }
            }          
        }   
        function cheese(){
            var cheese1 = '<?= $cheese1 ?>';
            var cprice1 = '<?= $cprice1 ?>';
            var cheese2 = '<?= $cheese2 ?>';
            var cprice2 = '<?= $cprice2 ?>';
            var cheese3 = '<?= $cheese3 ?>';
            var cprice3 = '<?= $cprice3 ?>';
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${cheese1}</td>
                    <td>${cprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${cheese2}</td>
                    <td>${cprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${cheese3}</td>
                    <td>${cprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `; 
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(cprice1 < cprice2){
                    finalres.innerHTML = "Best price of cheese in Spar"
                } else{
                    finalres.innerHTML = "Best price of cheese in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(cprice1 < cprice3){
                    finalres.innerHTML = "Best price of cheese in Spar"
                } else{
                    finalres.innerHTML = "Best price of cheese in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(cprice3 < cprice2){
                    finalres.innerHTML = "Best price of cheese in Hofer"
                } else{
                    finalres.innerHTML = "Best price of cheese in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(cprice1 < cprice2 && cprice1 < cprice3){
                    finalres.innerHTML = "Best price of cheese in Spar"
                } else if(cprice2 < cprice1 && cprice2 < cprice3){
                    finalres.innerHTML = "Best price of cheese in lidl"
                }else {
                    finalres.innerHTML = "Best price of cheese in Hofer"
                }
            }
        }
        function ham(){
            var ham1 = '<?= $ham1 ?>';
            var hprice1 = '<?= $hprice1 ?>';
            var ham2 = '<?= $ham2 ?>';
            var hprice2 = '<?= $hprice2 ?>';
            var ham3 = '<?= $ham3 ?>';
            var hprice3 = '<?= $hprice3 ?>';
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${ham1}</td>
                    <td>${hprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${ham2}</td>
                    <td>${hprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${ham3}</td>
                    <td>${hprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;  
            } 
            //table1 = document.getElementById("table1").appendChild(document.createElement("tr"));
            //table1.appendChild(document.createElement("td").appendChild(document.createTextNode(ham1 +" "+ hprice1)));
            //table2 = document.getElementById("table2").appendChild(document.createElement("tr"));
            //table2.appendChild(document.createElement("td").appendChild(document.createTextNode(ham2 +" "+ hprice2)));
            //table3 = document.getElementById("table3").appendChild(document.createElement("tr"));
            //table3.appendChild(document.createElement("td").appendChild(document.createTextNode(ham3 +" "+ hprice3)));
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(hprice1 < hprice2){
                    finalres.innerHTML = "Best price of ham in Spar"
                } else{
                    finalres.innerHTML = "Best price of ham in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(hprice1 < hprice3){
                    finalres.innerHTML = "Best price of ham in Spar"
                } else{
                    finalres.innerHTML = "Best price of ham in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(hprice3 < hprice2){
                    finalres.innerHTML = "Best price of ham in Hofer"
                } else{
                    finalres.innerHTML = "Best price of ham in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(hprice1 < hprice2 && hprice1 < hprice3){
                    finalres.innerHTML = "Best price of ham in Spar"
                } else if(hprice2 < hprice1 && hprice2 < hprice3){
                    finalres.innerHTML = "Best price of ham in lidl"
                }else {
                    finalres.innerHTML = "Best price of ham in Hofer"
                }
            }  
        }
        function cereal(){
            var cereal1 = '<?= $cereal1 ?>';
            var crprice1 = '<?= $crprice1 ?>';
            var cereal2 = '<?= $cereal2 ?>';
            var crprice2 = '<?= $crprice2 ?>';
            var cereal3 = '<?= $cereal3 ?>';
            var crprice3 = '<?= $crprice3 ?>';
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${cereal1}</td>
                    <td>${crprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${cereal2}</td>
                    <td>${crprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${cereal3}</td>
                    <td>${crprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `; 
            } 
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(crprice1 < crprice2){
                    finalres.innerHTML = "Best price of cereal in Spar"
                } else{
                    finalres.innerHTML = "Best price of cereal in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(crprice1 < crprice3){
                    finalres.innerHTML = "Best price of cereal in Spar"
                } else{
                    finalres.innerHTML = "Best price of cereal in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(crprice3 < crprice2){
                    finalres.innerHTML = "Best price of cereal in Hofer"
                } else{
                    finalres.innerHTML = "Best price of cereal in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(crprice1 < crprice2 && crprice1 < crprice3){
                    finalres.innerHTML = "Best price of cereal in Spar"
                } else if(crprice2 < crprice1 && crprice2 < crprice3){
                    finalres.innerHTML = "Best price of cereal in lidl"
                }else {
                    finalres.innerHTML = "Best price of cereal in Hofer"
                }
            }   
        }
        function beer(){
            var beer1 = '<?= $beer1 ?>';
            var brprice1 = '<?= $brprice1 ?>';
            var beer2 = '<?= $beer2 ?>';
            var brprice2 = '<?= $brprice2 ?>';
            var beer3 = '<?= $beer3 ?>';
            var brprice3 = '<?= $brprice3 ?>';
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${beer1}</td>
                    <td>${brprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${beer2}</td>
                    <td>${brprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${beer3}</td>
                    <td>${brprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `; 
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(brprice1 < brprice2){
                    finalres.innerHTML = "Best price of beer in Spar"
                } else{
                    finalres.innerHTML = "Best price of beer in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(brprice1 < brprice3){
                    finalres.innerHTML = "Best price of beer in Spar"
                } else{
                    finalres.innerHTML = "Best price of beer in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(brprice3 < brprice2){
                    finalres.innerHTML = "Best price of beer in Hofer"
                } else{
                    finalres.innerHTML = "Best price of beer in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(brprice1 < brprice2 && brprice1 < brprice3){
                    finalres.innerHTML = "Best price of beer in Spar"
                } else if(brprice2 < brprice1 && brprice2 < brprice3){
                    finalres.innerHTML = "Best price of beer in lidl"
                }else {
                    finalres.innerHTML = "Best price of beer in Hofer"
                }
            }
        }
        function toiletpaper(){
            var tp1 = '<?= $tp1 ?>';
            var tprice1 = '<?= $tprice1 ?>';
            var tp2 = '<?= $tp2 ?>';
            var tprice2 = '<?= $tprice2 ?>';
            var tp3 = '<?= $tp3 ?>';
            var tprice3 = '<?= $tprice3 ?>';
            if(table1.style.opacity == 1){
                table1.innerHTML += `
                <tr>
                    <td>${tp1}</td>
                    <td>${tprice1}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${tp2}</td>
                    <td>${tprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${tp3}</td>
                    <td>${tprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `; 
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(tprice1 < tprice2){
                    finalres.innerHTML = "Best price of toilet paper in Spar"
                } else{
                    finalres.innerHTML = "Best price of toilet paper in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(tprice1 < tprice3){
                    finalres.innerHTML = "Best price of toilet paper in Spar"
                } else{
                    finalres.innerHTML = "Best price of toilet paper in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(tprice3 < tprice2){
                    finalres.innerHTML = "Best price of toilet paper in Hofer"
                } else{
                    finalres.innerHTML = "Best price of toilet paper in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(tprice1 < tprice2 && tprice1 < tprice3){
                    finalres.innerHTML = "Best price of toilet paper in Spar"
                } else if(tprice2 < tprice1 && tprice2 < tprice3){
                    finalres.innerHTML = "Best price of toilet paper in lidl"
                }else {
                    finalres.innerHTML = "Best price of toilet paper in Hofer"
                }
            } 
        }
        function water(){
            var w1 = '<?= $w1 ?>';
            var wprice1 = '<?= $wprice1 ?>';
            var w2 = '<?= $w2 ?>';
            var wprice2 = '<?= $wprice2 ?>';
            var w3 = '<?= $w3 ?>';
            var wprice3 = '<?= $wprice3 ?>';
            if(table1.style.opacity == 1){
                    table1.innerHTML += `
                    <tr>
                        <td>${w1}</td>
                        <td>${wprice1}&euro;</td>
                        <td><button class="deleteBtn">Delete</button></td>
                    </tr>
                    `;
            }
            if(table2.style.opacity == 1){
                    table2.innerHTML += `
                    <tr>
                        <td>${w2}</td>
                        <td>${wprice2}&euro;</td>
                        <td><button class="deleteBtn">Delete</button></td>
                    </tr>
                    `;
                
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${w3}</td>
                    <td>${wprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `; 
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(wprice1 < wprice2){
                    finalres.innerHTML = "Best price of water in Spar"
                } else{
                    finalres.innerHTML = "Best price of water in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(wprice1 < wprice3){
                    finalres.innerHTML = "Best price of water in Spar"
                } else{
                    finalres.innerHTML = "Best price of water in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(wprice3 < wprice2){
                    finalres.innerHTML = "Best price of water in Hofer"
                } else{
                    finalres.innerHTML = "Best price of water in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(wprice1 < wprice2 && wprice1 < wprice3){
                    finalres.innerHTML = "Best price of water in Spar"
                } else if(wprice2 < wprice1 && wprice2 < wprice3){
                    finalres.innerHTML = "Best price of water in lidl"
                }else {
                    finalres.innerHTML = "Best price of water in Hofer"
                }
            } 
        }      
        function yogurt(e){
            var y1 = '<?= $y1 ?>';
            var yprice1 = '<?= $yprice1 ?>';
            var y2 = '<?= $y2 ?>';
            var yprice2 = '<?= $yprice2 ?>';
            var y3 = '<?= $y3 ?>';
            var yprice3 = '<?= $yprice3 ?>';
            if(table1.style.opacity == 1){
                    table1.innerHTML += `
                    <tr id="pro">
                        <td>${y1}</td>
                        <td>${yprice1}&euro;</td>
                        <td><button class="deleteBtn">Delete</button></td>
                    </tr>
                    `;
            }
            if(table2.style.opacity == 1){
                table2.innerHTML += `
                <tr>
                    <td>${y2}</td>
                    <td>${yprice2}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `;
            }
            if(table3.style.opacity == 1){
                table3.innerHTML += `
                <tr>
                    <td>${y3}</td>
                    <td>${yprice3}&euro;</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
                `; 
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1){   
                if(yprice1 < yprice2){
                    finalres.innerHTML = "Best price of yogurt in Spar"
                } else{
                    finalres.innerHTML = "Best price of yogurt in lidl"
                }
            } 
            if(table1.style.opacity == 1 && table3.style.opacity == 1){   
                if(yprice1 < yprice3){
                    finalres.innerHTML = "Best price of yogurt in Spar"
                } else{
                    finalres.innerHTML = "Best price of yogurt in Hofer"
                }
            } 
            if(table3.style.opacity == 1 && table2.style.opacity == 1){   
                if(yprice3 < yprice2){
                    finalres.innerHTML = "Best price of yogurt in Hofer"
                } else{
                    finalres.innerHTML = "Best price of yogurt in lidl"
                }
            }
            if(table1.style.opacity == 1 && table2.style.opacity == 1 && table3.style.opacity == 1){   
                if(yprice1 < yprice2 && yprice1 < yprice3){
                    finalres.innerHTML = "Best price of yogurt in Spar"
                } else if(yprice2 < yprice1 && yprice2 < yprice3){
                    finalres.innerHTML = "Best price of yogurt in lidl"
                }else {
                    finalres.innerHTML = "Best price of yogurt in Hofer"
                }
            }
        }      
        function showSpar(){
            if(table1.style.opacity == 1){
                table1.style.opacity = 0;
            }else{
                table1.style.opacity = 1;
            }
        }
        function showLidl(){
            if(table2.style.opacity == 1){
                table2.style.opacity = 0;
            }else{
                table2.style.opacity = 1;
            }
        }
        function showHofer(){
            if(table3.style.opacity == 1){
                table3.style.opacity = 0;
            }else{
                table3.style.opacity = 1;
            }
        }
        function delAllRows1(){
            var rows = table1.rows.length-1
            for(var i = 0; i< rows; i++)
                table1.deleteRow(2);
        }
        function delAllRows2(){
            var rows = table2.rows.length-1
            for(var i = 0; i< rows; i++)
                table2.deleteRow(2);
        }
        function delAllRows3(){
            var rows = table3.rows.length-1
            for(var i = 0; i< rows; i++)
                table3.deleteRow(2);
        }
        function onDeleteRow(e){
            if(!e.target.classList.contains("deleteBtn")){
                return;
            }
            const btn = e.target;
            btn.closest("tr").remove();
        }
               
        table1.addEventListener("click", onDeleteRow);
        table2.addEventListener("click", onDeleteRow);
        table3.addEventListener("click", onDeleteRow);
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>
