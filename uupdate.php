<?php
session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Books Booking(Shivaani S 2020115082)</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
	<link rel="stylesheet" href="style1.css">

    

    
    

    
    
    <style>
	.content{
	display:flex;
	column-gap:50px;
	}
	body{
	background-image: url('bg.jpg');
	}
	.btn2{
    margin-top: 1rem;
    display:inline-block;
    padding:.9rem 1rem;
    border-radius: .5rem;
    color:#fff;
    background:dark green;
    font-size: 1.2rem;
    cursor: pointer;
    font-weight: 500;
}
span{
    font-size: 15px;
    font-weight: 500;
    position: absolute;
    color:red;
    border-radius: 80%;
    height: 20px;
    width: 10px;
    background:white;

	
}

 
	



 
  
  
    </style>
</head>

    <?php 
   
	
    ?>
	
<body>

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i>bookTown </a>

     
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            
            <a href="mycart.php" class="fas fa-shopping-cart"></a>
			<?php
			if(isset($_SESSION['user_id']))
	{echo "<span>".$_SESSION['tcart']."</span>";
		echo "<a href='logout.php'>LOGOUT</a>";}?>
        
			<div id="login-btn" class="fas fa-phone"></div>
			 <a href="mycart.php" class="fas fa-user"></a>
			 <?php echo "".$user_data['user_name']."";?>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="home 1.php">home</a>
            <a href="home 1.php">shop</a>
            <a href="mycart.php">cart</a>
        </nav>
    </div>

</header>

<!-- header section ends -->

<!-- bottom navbar  -->
<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="mailto:shivaanis32@gmail.com">
        <h3>Mail us</h3>
        
        <input type="textarea" name="" rows='4' cols='150'  placeholder="enter your queries" id="">
       
       
        <input type="submit" value="send" class="btn">
        
    </form>

</div>

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
</nav>

<!-- login form  -->
<?php


	
	$sql="SELECT * from users1 where user_name='$_SESSION[username]' limit 1";
   // $result=pg_query($con,$sql);
    //$row=pg_fetch_array($result);
	$sql=$con->adb->users1->find(['user_name'=>$_SESSION['username']]);
	foreach($sql as $row){


	

	

   
  echo" <div class='content1'>

    <form method=post action='up.php'>
        <h3>My Profile</h3>
        Email
        <input type='email' name='user_name'  value='$row[user_name]' >
		<input type='submit' value='update' name='s1' class='btn2'><BR>
        password
        <input type='text' name='password' value='$row[passwordd]' placeholder='Password' >
        
        <input type='submit' value='update' name='s2' class='btn2'>
        
    </form>

	</div>";}
?>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>


<hr>
	
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>our locations</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> india </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
            
            <a href="#"> <i class="fas fa-map-marker-alt"></i> france </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> japan </a>
            
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="index.html"> <i class="fas fa-arrow-right"></i> home </a>
            
            <a href="home 1.php"> <i class="fas fa-arrow-right"></i> Shop </a>
            
            
        </div>

        

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="mailto:shivaanis32@gmail.com"> <i class="fas fa-envelope"></i> shivaanis32@gmail.com </a>
            <img src="image/worldmap.png" class="map" alt="">
        </div>
        
    </div>

    <div class="share">
       <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
        <a href="https://twitter.com/" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
        
    </div>

    <div > created by Shivaani S | all rights reserved! </div>



</body>
</html>