
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
	<link rel="stylesheet" href="style1.css">

  
   
   
    <title>Books (Shivaani S)</title>
	<style>
	body{
	background-color:white;}
	h1{text-align:center;
	border:2px solid black;}
	.sec{
	text-align:center;}
	td{
	font-size:15px;
	}
	.btn2{
    margin-top: 1rem;
    display:inline-block;
    padding:.9rem 1rem;
    border-radius: .5rem;
    color:#fff;
    background:var(--green);
    font-size: 1.2rem;
    cursor: pointer;
    font-weight: 500;
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
input[type=number]
{
width:40px;
height:30px;
text-align:center;}
.img{
	height:150px;
width:120px;}
.content2{
    background:#eee;
	display:flex;
flex-direction:column;
   
    
    

	text-align:center;
	float:left;
   
    
	width:700px;
	margin-left:50px;
	margin-top:30px;
	
	
	
	font-size:15px;
	
    
}
.right{
float:right;
display:flex;
flex-direction:column;
margin:30px;
font-size:15px;
}
input[type=text], select {
  width: 50%;
  padding: 12px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=email], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=tel], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.canc{
text-align:center;
margin-top:auto;
margin-bottom:auto;}


input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
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
<body>


<script>
function booked(){
alert("Order placed!");}</script>
<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> bookTown</a>

        
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
          
            <a href="mycart.php" class="fas fa-shopping-cart"></a>
			<?php
			session_start();
			include("connection.php");
	include("functions.php");
			$user_data = check_login($con);
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
			
        </nav>
    </div>

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
<div class='bb'>
<h2 class="canc">**if you want the book to be only mailed - dont enter the address(leave it empty)!</h2>

<?php

if (isset($_POST['Placeorder']))
    {
        if (count($_SESSION['cart'])==0){
            echo "<script>
            alert('Cart Empty');
            </script>";

        }
		echo"<div class='right'>";
		if (isset($_SESSION['cart']))
                    {
                        foreach($_SESSION['cart'] as $k => $value)
                        {$i;
                            $sql=$con->adb->book->find();
							foreach($sql as $r){
							
								if($r['book_id']==$value['id'])
									$i=$r['img'];
								}
							
								
                            echo"
                            
                                
								<img src='$i' class='img'>
                                $value[Item_Name]-
								$value[Quantity]
                                
								
								
								
								
								
                              
					";}}echo"</div>"
					;
        echo "<div class='content2'><form action='confirm1.php' onsubmit='booked()' method='post'> 
        <label>Name:</label>
        <input type='text' name='cusname' required >
        <br><br>
        <label>Email: </label>
        <input type='email' name='mail' required>
        <br><br>
        <label>Phone No:</label>
        <input type='tel' name='phno' required ><br><br>
		<!---<label>Expiry Date of credit card:</label>
        <input type='date' name='date' required ><br><br>
		
        
		<label>Credit Card no:</label>
        <input type='number' name='cno' required >--->
        <br><br>
        <label>Address:</label><br>
        <textarea name='address' rows='3' col='30' placeholder='if you want it to be mailed dont enter any address'>
        </textarea>
        <br><br>
		Total:<input type='number' name='tcost' value='$_SESSION[tot]' readonly ><br><br>
        <input type='hidden' name='item' >
        <input type='hidden' name='total' value='$_SESSION[tot]' >
		
        <input type='hidden' name='email' >
        <input type='submit' class='btn' name='confirmorder' value='Confirm Order and pay'></form>
	</div>";}?>
	
	
	
	