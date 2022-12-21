<!DOCTYPE html>
<html lang="en">
<head>
<title>Books Booking(Shivaani S 2020115082)</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom css file link  -->
	<link rel="stylesheet" href="style1.css">
    

    
    

    
    
    <style>
	.content{
	display:flex;
	column-gap:50px;
	}
	.img1{
	width:150px;
height:200px;}
.next{
	float:right;
font-size:20px;}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}


.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
  font-size: 16px;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
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
.cance{
text-align:center;}
	



 
  
  
    </style>
</head>

    
	
<body>

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> bookTown </a>

		

        
	

   

</header>

<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
</nav>


	<section class="cance">	
<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

	
if(isset($_POST['confirmorder']))
{$ii=random_num(10);
$user_id=$user_data['user_id'];
$user_name=$user_data['user_name'];
$iii=$user_data['id'];

$sql=$con->adb->orders->insertOne(['orderid'=>$ii,'user_id'=>$user_id,'user_name'=>$user_name,'tid'=>$iii,'id'=>$iii]);
 $sql2=$con->adb->orders->find();
 foreach($sql2 as $r)
 {
 
	$i=$r['orderid'];
								}
$name=$_POST['cusname'];
$e=$_POST['mail'];
$ad=$_POST['address'];
if($ad=="        ")
$ss=1;
else
$ss=0;
$t=$_POST['total'];
$curDate = date("Y-m-d");
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $k => $value)
{
	$dd=date('Y-m-d', strtotime($curDate. ' + 5 days'));
	$it=$value['Item_Name'];
	$q=$value['Quantity'];
	$p=$value['Price'];
	if($ss==0)
	$sql1=$con->adb->customer->insertOne(['name'=>$name,'address'=>$ad,'totcost'=>$t,'itemname'=>$it,'quantity'=>$q,'price'=>$p,'orderid1'=>$i,'mail'=>$e,'userid'=>$user_data['tid'],'dateof'=>$curDate,'deli'=>$dd]);
else
	$sql2=$con->adb->customer->insertOne(['name'=>$name,'totcost'=>$t,'itemname'=>$it,'quantity'=>$q,'price'=>$p,'orderid1'=>$i,'mail'=>$e,'userid'=>$user_data['tid'],'dateof'=>$curDate,'deli'=>$dd]);


//$sql1="insert into customer(name,address,totcost,itemname,quantity,price,orderid1,mail,userid,dateof,deli) values('$name','$ad','$t','$value[Item_Name]','$value[Quantity]','$value[Price]','$i','$e','$user_data[tid]','$curDate','$dd')";
//$res4=pg_query($con,$sql1);
$sql3=$con->adb->orders->deleteOne(['id'=>$iii]);}
}

if($ss==0){
echo "<h1>Booking done!!<br><br>  Will be delivered by</h1>";
$Date = date("Y-m-d");

echo "<h1>".date('Y-m-d', strtotime($Date. ' + 5 days'))."</h1><br>";
echo "<a class='cance' href='home 1.php'>
       <button class='btn'>Exit</button>
     </a>";}
  //echo "<h1>hii</h1>";  }
  else{
  echo "<h1>Booking done!!<br><br>  Will be Mailed by</h1>";
  $Date = date("Y-m-d");
  echo "<h1>".date('Y-m-d', strtotime($Date. ' + 5 days'))."</h1><br>";
echo "<a class='cance' href='home 1.php'>
       <button class='btn'>Exit</button>
     </a>";}
  //echo "<h1>hii</h1>";  }
  
foreach($_SESSION['cart'] as $k => $value)
{//$sqlu=$con->adb->book->update(['book_id'=>$value['id']],['$set'=>['stock'=>]
//echo "<h1>hii</h1>"; 
$idd=$value['id'];
//echo "<h1>".$idd."</h1>"; 
//$sqlu1=$con->adb->book->find(['book_id'=>$value['id']]);
$sqlu1=$con->adb->book->find();


//echo "<h1>".$idd."</h1>";
foreach($sqlu1 as $r)
{
//echo "<h1>In l2</h1>";
//if($r['book_id']==$value['id']){
//echo "<script>alert($r)</script>";
$d=$r['stock']-$value['Quantity'];
//echo "<script>alert("$d")</script>";
//echo "<h1>".$d."</h1>";
$sq=$con->adb->book->updateOne(['book_id'=>$idd],['$set'=>['stock'=>40]]);

//}
	
}}

unset($_SESSION['cart']);
$_SESSION['tcart']=0;}
else{
	echo "<a class='cance' href='home 1.php'>
       <button class='btn'>Exit</button>
     </a>";
}




	
	
?>
</section>
<hr>
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

    <div > created by Shivaani S | all rights reserved! </div>



</body>
</html>
