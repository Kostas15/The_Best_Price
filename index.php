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
	<title>Welcome <?php echo $_SESSION['username']; ?></title>
	<style>
		* {
			margin: 0px;
			padding: 0px;
			text-decoration: none;
		}
		body {
			font-family: 'Trebuchet MS';
			background: #F8F8FF;
		} 
		.header {
			width: 25%;
			margin: 50px auto 0px;
			color: white;
			background: #5F9EA0;
			text-align: center;
			border: 1px solid #B0C4DE;
			border-bottom: none;
			border-radius: 10px 10px 0px 0px;
			padding: 20px;
			text-align: center;
		}
		form, .content {
			width: 25%;
			margin: 0px auto;
			padding: 20px;
			border: 1px solid #B0C4DE;
			background: white;
			border-radius: 0px 0px 10px 10px;
		}
		.error {
			width: 92%; 
			margin: 0px auto; 
			padding: 10px; 
			border: 1px solid #a94442; 
			color: #a94442; 
			background: #f2dede; 
			border-radius: 5px; 
			text-align: left;
		}
		.success {
			color: #3c763d; 
			background: #dff0d8; 
			border: 1px solid #3c763d;
			margin-bottom: 20px;
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
		.nav{
			color: white;
			font-size: 20px;
			text-transform: uppercase;
			border: 1px solid transparent;
			border-radius: 3px;
			padding: 7px 10px;
		}
		.nav.active, .nav:hover{
			border: 1px  solid white;
			transition: .2s;
		}
		#par{
			font-size: 20px;
		}
		
		#lop{
			margin-top: 20px;
			padding: 3px ;
			width: 52px;
			border-radius: 3px;
			background-color: #f2dede;
			font-size: larger;
			color: red;
		}
		#lop:hover{
			background-color: red;
			color: #F8F8FF;
		}
		#gtp{
			margin: 10px 0px;
			padding: 3px;
			width: 89px;
			border-radius: 3px;
			background-color: #dff0d8;
			font-size: large;
			color: black;
		}
		#gtp:hover{
			background-color: #5F9EA0;
			color: #F8F8FF;
		}
		.bla{
			display: block;
		}
		#name{
            text-transform: capitalize;
            font-size: 25px;
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
        }
        @media (max-width: 1300px){
            
            #list{
                position: fixed;
                width: 150px;
                height: 250px;
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
		@media (max-width: 1000px){
		
			.header {
				width: 30%;
				margin: 50px auto 0px;
				padding: 20px;
				font-size: 15px;
			}
			form, .content {
				width: 30%;
				font-size: 15px;
			}
		}
        @media (max-width: 650px){
            .logo{
                font-size: 35px;
                padding: 0px 50px;
            }
            .header {
				width: 40%;
				margin: 50px auto 0px;
				padding: 20px;
				font-size: 15px;
			}
			form, .content {
				width: 40%;
				font-size: 15px;
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
            <li class="list-item"><a href="S3.php" class="nav">Home</a></li>
            <li class="list-item"><a href="index.php?logout='1'" class="nav">logout</a></li>
            <li class="list-item"><p id="name"><?php echo $_SESSION['username']; ?></p></li>
        </ul>
    </nav>


<div class="header">
	<h2>Home Page</h2>
</div>	
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p id="par">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<a class="bla" id="lop" href="index.php?logout='1'">logout</a>
		<a class="bla" id="gtp" href="S3.php" class="btn1">Go to page</a>
		
    <?php endif ?>

</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>