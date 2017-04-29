<!DOCTYPE html>
<html>
	<head>
  <title>Add to Cart</title>
  <link rel="shortcut icon" type="image/png" href="../../images/logo/logo.png">
  <meta name="description" content="Website for Cake Shop" >
  <meta name="keywords" content="Pearson CakeShop,CakeShop,Pearson Cake">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script src="../js/banner.js"></script>   
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
	  <h1>Selected Item</h1>
		<?php
		if(!isset($_SESSION['user'])){
			echo"You Have Not Registered or Login Please Login or Register !";
		}
		else{
		$user = $_SESSION['user'];
		$pname = $_POST['pname'];
		$kg = $_POST['kg'];
		$price = $_POST['price'];
		$text = $_POST['qty'];
		$netprice = $price*$text;
		
		echo 'Hi '.$user.'!'.'<br></br>';
		echo 'You have selected '.$text.' '.$kg.' '.$pname.'<br></br>'
		.'Press cart to view your cart or cake to go to menu'.'<br></br>';
		
		echo'<div class="form_settings">'
			
			.'<table><tr><td>'
			
			.'<a href="cart.php">'
			
			.'<input type="button" value = "Cart" style="border:1px solid #99994d" class="submit">'
			
			.'</td>'
			
			.'<td>'
			
			.'<a href= "../html/main/cake.html">'
		
			.'<input type="button" value="Cake" style="border:1px solid #99994d" class="submit"></form>'
			
			.'</td>'
			
			.'</tr></table></div>';
		
		
		

		$host = "localhost";
		$dbuser = "Sangeethanan";
		$dbpass = "2015084";
		$dbname = "webtechdb";
	
		$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
	
		if (mysqli_connect_errno()){
			echo '<h1 style="color:red;">Failed to connect to MySQL database:---->>><br/>' . mysqli_connect_error().'</h1>';
		}
		
		
		$selectquery = "SELECT * FROM cartdetail WHERE user='$user' AND item='$pname'";
		$result = mysqli_query($conn,$selectquery);
		$row = mysqli_fetch_assoc($result);
		$count = count($row);
	
		if($count != 0 || $count == 1){
			$updatequery ="UPDATE cartdetail SET price='$price',qty='$text',netprice='$netprice' WHERE user='$user' AND item='$pname'";
			mysqli_query($conn,$updatequery);
		}else{
			$insertquery = "INSERT INTO cartdetail (user,item,weight,price,qty,netprice) VALUES".
				" ('$user','$pname','$kg','$price','$text','$netprice')";
			mysqli_query($conn,$insertquery);
		}
		}
		?>       
		</div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="../html/main/index.html">Home</a>| <a href="../html/main/about_us.html">About Us</a>| <a href="../html/main/cake.html">Cakes</a>| <a href="cv.html">Meet Our Staff| <a href="../html/main/quiz.html">Quiz</a>| <a href="../html/main/contact.html">Contact Us</a>| <a href="../html/main/sitemap.html">site map</a></p>
      <p>Copyright &copy Pearson Cake Shop</p>
    </div>
  </div>
</body>
</html>