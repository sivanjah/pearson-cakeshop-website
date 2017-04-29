<?php
	$host = "localhost";
	$dbuser = "Sangeethanan";
	$dbpass = "2015084";
	$dbname = "webtechdb";
	
	$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
	
	if (mysqli_connect_errno()){
  		echo '<h1 style="color:red;">Failed to connect to MySQL database:---->>><br/>' . mysqli_connect_error().'</h1>';
	}else{
		echo '<h1 style="color:green;">Connection to the server is successful.....</h1>';
	}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Contact Us</title>
  <link rel="shortcut icon" type="image/png" href="../../images/logo/logo.png">
  <meta name="description" content="Contact form for website" >
  <meta name="keywords" content="contact us,contact,form">
  <link rel="stylesheet" type="text/css" href="../../css/style.css" />
  <script src="../../js/banner.js"></script>  
</head>

<body onload = "banner()">
  <div id="main">
      <div id="menubar">
        <ul id="menu">
		<img src = "../../images/logo/logo2.png">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.html">Home</a></li>
          <li><a href="about_us.html">About Us</a></li>
		  <li class="selected"><a href="cake.html">Cakes</a></li>
          <li><a href="cv.html">Meet Our Staff</a></li>
          <li><a href="quiz.html">Quiz</a></li>
		  <li><a href="weeklypoll.html">Weekly Poll</a></li>
          <li><a href="contact.html">Contact Us</a></li>
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
		</div>
    </div>
	<div id="header">
	<img src = "../../images/banner/banner1.png" id="banner">
	</div>
	 </div>
    <div id="content_header"></div>

<div class="map">

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:255px;width:300px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://buywebtrafficexperts.com">buy website traffic</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(6.8652637738895015,79.86188918600602),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(6.8652637738895015,79.86188918600602)});infowindow = new google.maps.InfoWindow({content:'<strong>Pearson cake shop</strong><br>57 Ramakrishna Rd, Colombo 00600 Sri Lanka<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>	
</div>


<div id="site_content">
<div class="sidebar_sd">
	
<br><br>
 <b>57 Ramakrishna Rd, <br>
Colombo <br> 
00600<br>
Sri Lanka<br><br>
</b>

<h3>Restaurant Open Hours:</h3>
<b>7:00am to 7:30pm<br>
8:00am to 3:00pm (Poya day's & Mercantile Holiday's)<br><br>
</b>
</div>
      <div id="content">
	  
        <h1>Contact Us</h1><form action = "<?php echo $_SERVER['PHP_SELF'];?>" method=post>
		
		<label for="name">Your Name:</label><br/><br/>
		<input id="Contact_name" class="input" name="n" type="text" size="30" required ></br><br/>
		
		<label for="email">Your email:</label><br/><br/>
		<input id="Contact_email" class="input" name="e" type="email" pattern="[^ @]*@[^ @]*" required size="30" /><br/><br/>
	
		<label for="message">Your message:</label><br/><br/>
		<textarea id="Contact_message" class="input" name="m" rows="7" cols="30" required></textarea><br /><br/><br/>
		
		<label for="rating"> Please rate our website : </label> <br/> <br/>
		<select name="rat" id="rate" class="input" required>
			<option value=""> Select </option>
			<option value="Very Good" name="rat"> Very Good </option>
			<option value="Good" name="rat"> Good </option>
			<option value="Average" name="rat"> Average </option>
			<option value="Bad" name="rat"> Bad </option>
			<option value="Very Bad" name="rat"> Very Bad </option>
		</select> <br/> <br/> <br/>
		
		<label for="get_email"> Do you wish to get updates send via emails : </label> <br/> <br/>
		<input id="get_email" class="input" type="radio" name="semail" value="Y" required/> Yes &nbsp;
		<input id="get_email" class="input" type="radio" name="semail" value="N"/> No <br/> <br/> <br/>
		
	<input type="submit" value="Submit"></input> &nbsp; &nbsp; &nbsp;
	<input type="reset" value="Reset"> </input>
	

	</form>
	</div>
	<?php
		if(isset($_POST['n']) && isset($_POST['e']) && isset($_POST['a'])
		&& isset($_POST['m'])
		&& isset($_POST['rat'])){
		
		$name = $_POST['n'];
		$email = $_POST['e'];
		$message = $_POST['m'];
		$rate = $_POST['rat'];
		$sendemail = $_POST['semail'];

		$insertquery = "INSERT INTO contactdetail (contactname,emailaddress,message,rating,sendemail) VALUES".
				" ('$name','$email','$message','$rate','$sendmail')";
		mysqli_query($conn,$insertquery);
				
	}

		?>

    </div>
	
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a>| <a href="about_us.html">About Us</a>| <a href="cake.html">Cakes</a>| <a href="cv.html">Meet Our Directors| <a href="quiz.html">Quiz</a>|<a href="weeklypoll.html">Weekly Poll</a>| <a href="contact.html">Contact Us</a>|<a href="sitemap.html">Site Map</a></p>
	   <p>Copyright &copy Pearson Cake Shop.&nbsp57, Ramakrishna Road, Colombo-06, Sri Lanka.Tel:(+)94 112 580 714,(+)94 112 361 473</p>
    </div>
  </div>
	</body>
</html>
