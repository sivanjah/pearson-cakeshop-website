<?php
	/* Code for connectting to database */
	$host = "localhost";
	$dbuser = "Sangeethanan";
	$dbpass = "2015084";
	$dbname = "webtechdb";
	
	$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
	
	if (mysqli_connect_errno()){
  		echo '<h1 style="color:red;">Failed to connect to MySQL database:---->>><br/>' . mysqli_connect_error().'</h1>';
	}else{
		echo '<h1 style="color:#66ccff;">Connection to the server is successful.....</h1>';
	}
	
	
	if(isset($_POST['n']) && isset($_POST['e']) && isset($_POST['a'])
		&& isset($_POST['m']) && isset($_POST['u']) && isset($_POST['p'])
		&& isset($_POST['rp'])){
		
		$name = $_POST['n'];
		$email = $_POST['e'];
		$address = $_POST['a'];
		$mobile = $_POST['m'];
		$user = $_POST['u'];
		$pass = $_POST['p'];
		$rpass = $_POST['rp'];
		
		$selectquery = "SELECT * FROM webtechusers WHERE usersUN='$user'";
		$result = mysqli_query($conn,$selectquery);
		$row = mysqli_fetch_assoc($result);
		$count = count($row);
		
		if($pass != $rpass && $count == 0){
			$msg = '<h1 style="color:red;">Passwords mismatch</h1>';
		}else{		
			if($count == 0){
				$insertquery = "INSERT INTO webtechusers (name,email,address,mobile,usersUN,usersPW) VALUES".
				" ('$name','$email','$address','$mobile','$user','$pass')";
				mysqli_query($conn,$insertquery);
				$_SESSION['user'] = $user;
				$_SESSION['id'] = session_id();
				$msg = '<h1 style="color:green;">Successfully Logged In</h1>'.header("refresh:10;url=../html/main/index.html"); 
			}else{
				$msg = '<h1 style="color:red;">Oops..Username Already Taken!</h1>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
  <title>Register Form</title>
 <link rel="shortcut icon" type="image/png" href="../images/logo/logo.png">
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
		</div>
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
	  <p></P><p></P><p></P><p></P>
	  
		<center>	  
		<?php
			$register = '<h1>Register</h1><form action = '.$_SERVER['PHP_SELF'].' method=post>'
			.'<div class="form_settings">'
			
			.'<table><tr><td><span>Full Name*</span><input class="contact" style="border:1px solid #99994d" type="text"' 
			
			.'name="n" placeholder="Enter Your Full Name" required="required"></td></tr>'
			
			.'<tr><td><span>Email Address*</span><input class="contact" style="border:1px solid #99994d" type="email" name="e"'
			
			.'placeholder="Enter Your Email Address" required="required"></td></tr>'
			
			.'<tr><td><span>Address*</span><textarea rows="4" cols="40" class="contact" style="border:1px solid #99994d" name="a"'
			
			.'required="required" placeholder="Enter Your Address For Which Stock Is To Be Delivered"></textarea></td></tr>'
			
			.'<tr><td><span>Mobile Number*</span><input class="contact" style="border:1px solid #99994d" type="number" name="m"'
			
			.'placeholder="Enter Your Mobile Number" required="required"></td></tr>'
			
			.'<tr><td><span>Give A Username*</span><input class="contact" style="border:1px solid #99994d" type="text" name="u"'
			
			.'placeholder="Enter A Username" required="required"></td></tr>'
			
			.'<tr><td><span>Give A Password*</span><input class="contact" style="border:1px solid #99994d" type="password"'
			
			.'name="p" placeholder="Enter A Password" required="required"></td></tr>'
			
			.'<tr><td><span>Re-enter Password*</span><input class="contact" style="border:1px solid #99994d" type="password"'
			
			.'placeholder="Re-enter Password" required="required" name="rp"></td></tr>'
       	    
			.'<tr><td colspan="2"><button type="submit" style="border:1px solid #99994d" class="submit">'
			
			.'Register</button></td>'	
			
			.'</tr></table></form></div>';
            	
				
			if(!isset($_SESSION['user'])){
				echo $register;
			}
			if(isset($msg)){
				echo $msg;
			}
		?>
		
        </center>
		</div>
    </div>
	</div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="../html/main/index.html">Home</a>| <a href="../html/main/about_us.html">About Us</a>| <a href="../html/main/cake.html">Cakes</a>| <a href="cv.html">Meet Our Staff| <a href="../html/main/quiz.html">Quiz</a>| <a href="../html/main/contact.html">Contact Us</a>| <a href="../html/main/sitemap.html">Site Map</a></p>
      <p>Copyright &copy Pearson Cake Shop</p>
    </div>
  </div>
</body>
</html>