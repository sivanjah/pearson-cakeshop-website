<!DOCTYPE html>
<html>
	<head>
  <title>Pearson CakeShop</title>
  <link rel="shortcut icon" type="image/png" href="../../images/logo/logo.png">
  <meta name="description" content="Website for Cake Shop" >
  <meta name="keywords" content="Pearson CakeShop,CakeShop,Pearson Cake">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script src="../js/banner.js"></script>   
  <style>
  tr, td,th{ 
	padding: 12px;
	}
  </style>
</head>

<body>
  <div id="main">
      <div id="menubar">
        <ul id="menu">
		<img src = "../images/logo/logo2.png">
          <li class="selected"><a href="../html/main/index.html">Home</a></li>
          <li><a href="../html/main/about_us.html">About Us</a></li>
		  <li><a href="../html/main/cake.html">Cakes</a></li>
          <li><a href="../html/main/cv.html">Meet Our Staff</a></li>
          <li><a href="../html/main/quiz.html">Quiz</a></li>
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
	 </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">	  
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
			
			
			if($count == 0){
				echo "Your cart is empty";
			}else{
				$total = 0;
				
				$selectquery1 = "SELECT name,email,address,mobile FROM webtechusers WHERE usersUN='$user'";
				$result1 = mysqli_query($conn,$selectquery1);
				$row1 = mysqli_fetch_assoc($result1);
				echo '<table>';
				echo '<tr><td>Customer Name:</td>'.'<td>'.$row1['name'].'</td></tr>';
				echo '<tr><td>email address:</td>'.'<td>'.$row1['email'].'</td></tr>';
				echo '<tr><td>Address:</td>'.'<td>'.$row1['address'].'</td><br/>';
				echo '<tr><td>Mobile:<td>'.$row1['mobile'].'</td><br/>';	
				'</table>';
								
				$selectquery2 = "SELECT * FROM cartdetail WHERE user='$user'";
				$result2 = mysqli_query($conn,$selectquery2);
				
					echo
			'<div class="form_settings">'
			.'<table><tr><th><span>Product Name</span></th>'
			
			.'<th>Weight</th>'
			
			.'<th>Unit Price</th>'
			
			.'<th>Qty</th>'
			
			.'<th>Total Amount</th></tr>';
				while($row2 = mysqli_fetch_assoc($result)) {
					echo'<tr><td>'. $row2['item'].'</td>';
					echo '<td>'.$row2['weight'].'</td>';
					echo '<td>'.$row2['price'].'.00'.'</td>';
					echo '<td>'.$row2['qty'].'</td>';
					echo '<td>'.$row2['netprice'].'.00'.'</td>'.'</tr>'.'</br>';
					$total += $row2['netprice'];
				}
				echo '<td style = "font-weight: bold;color:red">Total Amount</td><td></td><td></td><td></td><td style = "font-weight: bold;color:red">Rs. '.$total.'.00'.'</td>'.
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
      <p><a href="../html/main/index.html">Home</a>| <a href="../html/main/about_us.html">About Us</a>| <a href="../html/main/cake.html">Cakes</a>| <a href="cv.html">Meet Our Staff| <a href="../html/main/quiz.html">Quiz</a>| <a href="../html/main/contact.html">Contact Us</a></a></p>
      <p>Copyright &copy Pearson Cake Shop</p>
    </div>
  </div>
</body>
</html>