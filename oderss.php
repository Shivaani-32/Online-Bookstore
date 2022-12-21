<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom css file link  -->
	<link rel="stylesheet" href="style1.css">
	<style>
	.row {
    border:1px solid black; 
	background-color:black;
}

			.btn3{
    margin-top: 1rem;
    display:inline-block;
    padding:.9rem 1rem;
    border-radius: .5rem;
    color:#fff;
    background:red;
    font-size: 1.2rem;
    cursor: pointer;
    font-weight: 500;
}
.canc{
text-align:center;
margin-top:auto;
margin-bottom:auto;}
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
<body>
<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> bookTown </a>
		<h1>Cancellation must be done within 2 days of ordering</h1>
        <!--<form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>-->

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            
            <a href="mycart.php" class="fas fa-shopping-cart"></a><?php
			session_start();
			include("connection.php");
	include("functions.php");$user_data = check_login($con);
			if(isset($_SESSION['user_id']))
	{echo "<span>".$_SESSION['tcart']."</span>";
		echo "<a href='logout.php'>LOGOUT</a>";
	}?>
			 <a href="mycart.php" class="fas fa-user"></a>
			 <?php echo "".$user_data['user_name']."";?>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="home 1.php">home</a>
            <a href="home 1.php">shop</a>
            <a href="mycart.php">cart</a>
			<a href="mycart.php">My Account</a>
			
        </nav>
    </div>

</header>
<h2 class="canc">*Terms and conditions:  Cancellation can be done only within two days of ordereing! Refund done!</h2>
<?php



$user_data = check_login($con);
$curDate = date("Y-m-d");
function dateCompare($Depart, $Current)
{
$date1 = date("Y-m-d",strtotime($Depart));
//$date1=$Depart;
$date2 = $Current;

$datetime1 = date_create($date2);
$datetime2 = date_create($date1);
  
// calculates the difference between DateTime objects
$interval = date_diff($datetime1, $datetime2);
  
// printing result in days format
$days1= $interval->d;
if ($days1 <= 2)
    return 1 ;
else
	return 0;
}
$count=0;
$user_data = check_login($con);
$sql=$con->adb->customer->find(['userid'=>$user_data['id']]);
$a=array();
if(!$sql)
	echo "<h1>No cancellation</h1>";
	else{
foreach($sql as $r1)
{$ii=$r1['orderid1'];


$r=0;
if(!(in_array($r1['orderid1'],$a)))
	{
	array_push($a,$r1['orderid1']);
$sql33=$con->adb->customer->find(['orderid1'=>$ii]);


//$sql33="select totcost,dateof,orderid1,itemname,quantity from customer where orderid1='$r1[orderid1]'";
//$res2=pg_query($con,$sql33);

//echo "<table class='content1' cellspacing='20' cellpadding='10' border='10'>";

foreach($sql33 as $r2)
{
	
	
	
//echo "ID : ".$r1["itemname"]." - Date Of Departure : ".$r1["quantity"]. "<br>" ;

$res1= dateCompare($r2["dateof"], $curDate);
$d=$r2["dateof"];
if($res1==1)
{ $count++;
	if($r==0)
		echo "<table class='content1' cellspacing='20' cellpadding='10' border='10'>";
	echo "<tr style='border-bottom: 1px solid black;'>";
	echo " <th>".$r2["orderid1"]."</th><th>Items</th><th>Quantity</th></tr><td><td>";
$i=$r2["orderid1"];
$t=$r2["totcost"];
echo"".$r2["itemname"]."</td></td> ".$r2["quantity"];$r++;}
	
else continue;}



if($res1==1)
{
echo "<td>Yet to be delivered :".date('Y-m-d', strtotime($d. ' + 5 days'))."</td></tr>"."<td>Total Cost:".$t."</td></tr>";echo"<tr><td><form action='dels.php' onsubmit='return myFunction()' method='post'>
                                      
                                        <input type='hidden' name='id' value='$i'>
<button name='c1' class='btn3' id='demo' >cancel</button></form></td></tr></tr>";}
//else echo "<h1>No cancellation!</h1>";
echo "</table>";

										
}
}}
if($count==0)echo "<h1 class='canc'>No orders available for Cancellation</h1>";


?>
<script>
function myFunction() {
  let text = "Are you sure you want to cancel?";
  if (confirm(text) == true) {
    window.location.href='dels.php';
  } else {
    
	return false;
  }
  //document.getElementById("demo").innerHTML = text;
}
</script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>
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
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> shop </a>
            
            
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

    <div> created by Shivaani S | all rights reserved! </div>



</body>
</html>
	
</body>
</html>
