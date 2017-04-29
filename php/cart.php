<!DOCTYPE HTML>
<html>
<head>
  <title>Shopping Cart</title>
  <link rel="shortcut icon" type="image/png" href="../images/logo/logo.png">
  <meta name="description" content="Website for Cake Shop" >
  <meta name="keywords" content="Pearson CakeShop,CakeShop,Pearson Cake">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script src="../../js/banner.js"></script>
  <style>
  tr, td,th{ 
	padding: 12px;
	}
  </style>
</head>

<body onload = "banner()">
  <div id="main">
      <div id="menubar">
        <ul id="menu">
		<img src = "../images/logo/logo2.png">
          <li class="selected"><a href="../html/main/index.html">Home</a></li>
          <li><a href="../html/main/about_us.html">About Us</a></li>
		  <li><a href="../html/main/cake.html">Cakes</a></li>
          <li><a href="../html/main/cv.html">Meet Our Staff</a></li>
          <li><a href="../html/main/quiz.html">Quiz</a></li>
		  <li><a href="../html/main/weeklypoll.html">Weekly Poll</a></li>
          <li><a href="../html/main/contact.html">Contact Us</a></li>
        </ul>
		</div>
		<div>
		<ul id = "log">
		<?php
            session_start();
			if(!isset($_SESSION['user'])){
            	$menu =	'<li><a href="http://localhost/pearson/php/register.php">Register</a></li>'.
					'<li><a href="http://localhost/pearson/php/login.php">Log in</a></li>'.
					'<li><a href="http://localhost/pearson/php/cart.php">Cart</a></li>';
			}else{
					$menu =	'<li><a href="http://localhost/pearson/php/logout.php">Logout</a></li>'.
						'<li><a href="http://localhost/pearson/php/cart.php">Cart</a></li>';
			}
			echo $menu;
		?>
		</ul>
		</div>
		</div>
	<div id="header">
	<img src = "../images/banner/banner1.png" id="banner">
	</div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">
	  <h1>Shopping cart</h1>
	  <?php
		
		if(isset($_SESSION['user'])){
			
			$user = $_SESSION['user'];	
			$host = "localhost";
			$dbuser = "Sangeethanan";
			$dbpass = "2015084";
			$dbname = "webtechdb";
	
			$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
	
			if (mysqli_connect_errno()){
				echo '<h1 style="color:red;">Failed to connect to MySQL database:---->>><br/>' . mysqli_connect_error().'</h1>';
			}
		
			$selectquery = "SELECT * FROM cartdetail WHERE user='$user'";
			$result = mysqli_query($conn,$selectquery);
			$row = mysqli_fetch_assoc($result);
			$count = count($row);
			
			echo 'Customer Name:  '.$user.'<br/>';
			
			
			if($count == 0){
				echo "Your cart is empty";
			}else{
				$selectquery = "SELECT * FROM cartdetail WHERE user='$user'";
				$result = mysqli_query($conn,$selectquery);
				
			echo
			'<div class="form_settings">'
			.'<table><tr><th><span>Product Name</span></th>'
			
			.'<th>Weight</th>'
			
			.'<th>Unit Price</th>'
			
			.'<th>Qty</th>'
			
			.'<th>Total Amount</th></tr>'
				
			;
				while($row = mysqli_fetch_assoc($result)) {
					echo '<tr><td>'. $row['item'].'</td>';
					echo '<td>'.$row['weight'].'</td>';
					echo '<td>'.$row['price'].'.00'.'</td>';
					echo '<td>'.$row['qty'].'</td>';
					echo '<td>'.$row['netprice'].'.00'.'</td>'.'</tr>'.'</br>';
				}
				echo'<tr><td><a href="bill.php"><button>Generate Bill</button></a></td></tr>'. 
				'</table></div>';
			}
		}else{
			echo '<h1>You Need To Login First</h1>';	
		}
		?>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="../html/main/index.html">Home</a>| <a href="../html/main/about_us.html">About Us</a>| <a href="../html/main/cake.html">Cakes</a>| <a href="../html/main/cv.html">Meet Our Staff</a>| <a href="../html/main/quiz.html">Quiz</a>| <a href="../html/main/contact.html">Contact Us</a>| <a href="../html/main/sitemap.html">Site Map</a></p>
      <p>Copyright &copy Pearson Cake Shop.&nbsp57, Ramakrishna Road, Colombo-06, Sri Lanka.Tel:(+)94 112 580 714,(+)94 112 361 473</p>
    </div>
  </div>
</body>
</html>
