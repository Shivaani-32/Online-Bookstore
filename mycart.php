
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
span{
    font-size: 15px;
    font-weight: 500;
    position: absolute;
    color:red;
    border-radius: 80%;
    height: 20px;
    width: 20px;
    background:white;

	
}
   input[type=text]
{
width:60px;
height:30px;
text-align:center;
font-size:17px;} 
      
   
    



 
  
  
    </style>
    
</head>

<body>

<script>
function booked(){
alert("Booked!");}</script>
<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> bookTown </a>
		<?php session_start();
			include("connection.php");
	include("functions.php");$user_data = check_login($con)?>
	<?php echo "<h2>               ".$user_data['user_name']."</h2>";?>

        
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            
            <a href="mycart.php" class="fas fa-shopping-cart"><span></span></a>
	
			<?php
			
			if(isset($_SESSION['user_id']))
			{echo "<span>".$_SESSION['tcart']."</span>";
	{
		echo "<a href='logout.php'>LOGOUT</a>";}
	}?>
			
            <div id="login-btn" class="fas fa-user"></div>
			
        </div>

    </div>
	

    <div class="header-2">
        <nav class="navbar">
            <a href="home 1.php">home</a>
            <a href="home 1.php">shop</a>
            <a href="mycart.php">cart</a>
			<a href="uupdate.php">profile</a>
			<a href="oderss.php">Cancel</a>
			<a href="o.php">My Orders</a>
			<a href="co.php">cancelled orders!</a>
			
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





    
    <div class="sec">
        <div class="sec">
            <div>
                <h1 >My Cart</h1>
				
            </div>

            <div class="sec">
            <?php
			//starting session
	

	

	
	



			
			
			

       

            if(!isset($_SESSION['cart']) or count($_SESSION['cart'])==0){	//checking if cart is empty
                
               echo "<h2>Cart is empty now</h2>";  
               echo "<form action='home 1.php'>
                        <input type='submit' class='btn' value='order'>
                    </form>"; 
				
            }
            else
            {
                echo "<table class='content1' cellspacing='20' cellpadding='10'>
                
                    <tr>
                    <th>  S.No  </th>
					<th> Item</th>
                    <th><th>Book name</th></th>
                    <th>Price</th>
					<th>Quantity</th>
                    
                    <th></th>
                    </tr>
                
                <body>";//printing the cart
                    $total=0;//calculating total cost
                    if (isset($_SESSION['cart']))
                    {
                        foreach($_SESSION['cart'] as $k => $value)
                        {
                            $cost=$value['Price']*$value['Quantity'];
                            $total=$total+$cost;
                            $sr=$k+1;
							$sql=$con->adb->book->find();
							foreach($sql as $row)
							
								
								{if($row['book_id']==$value['id'])	
								{$i=$row['img'];
									$st=$row['stock'];
								}}
								$_SESSION['tot']=$total;
                            echo"
                            <tr>
                                <td>$sr</td>
								<td><img src='$i' class='img'></td>
                                <td><td>$value[Item_Name]</td></td>
                                <td>$cost</td>
								
								
								
								
								
                              
                                <td>
                                    <form action='manage_cart.php' method='post'>
                                      
                                        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
										<input type='number' name='q'  min='1' max='$st' value='$value[Quantity]' required>
								<td><button name='s1' class='btn2'>update</button></td>
							
								<td><button name='Remove' class='btn3'>Remove</button></td>
                                    </form>
                                </td>      
								</tr>
								
                            ";
                        }
                    }
					echo"<form action='home 1.php'>
                        <input type='submit' class='btn' value='+Add Item'>
                    </form>";
                        
                    
                echo "</tbody>
                </table>
            
            
                </div>
                
                
<div class='content1'>				

                <form method='post' action='con.php'>
                    <label>Total:</label><input type='text' value='$total' readonly>
                    <br>";

                        if (isset($_POST['Placeorder'])){
                            if (isset($_SESSION['cart'])){
                                echo "<input type='submit' name='cancelorder' value='Back'>";  //cancel order comes once we click place order
                            }
                            else{
                                
                                echo "<script>
                                    alert('Cart Empty');
                                    window.location.href='home 1.php';
                                    </script>";
                            }
                        }
                        elseif (isset($_POST['cancelorder'])){
                                echo "<input type='submit' name='Placeorder' value='Order'>";
                            }
                        
                        else{
                            echo "<input type='submit' name='Placeorder' class='btn' value='Proceed to checkout'>" ;
                        }
                    

                echo "</form>  
                    
                </div>";
			}
			
            ?>
            </div>
        </div>
		</div>
    
    <?php

/*    if (isset($_POST['Placeorder']))
    {
        if (count($_SESSION['cart'])==0){
            echo "<script>
            alert('Cart Empty');
            </script>";

        }
        

           
            

            
        

     

       echo "<div class='content1'><form action='confirm.php' onsubmit='booked()' method='post'> 
        <label>Name:</label>
        <input type='text' name='cusname' required >
        <br><br>
        <label>Email: </label>
        <input type='email'  required>
        <br><br>
        <label>Phone No:</label>
        <input type='tel' name='phno' required ><br><br>
		<label>Expiry Date of credit card:</label>
        <input type='date' name='date' required ><br><br>
		
        
		<label>Credit Card no:</label>
        <input type='number' name='cno' required >
        <br><br>
        <label>Address:</label><br>
        <textarea name='address' rows='3' col='30' required>
        </textarea>
        <br><br>
        <input type='hidden' name='item' >
        <input type='hidden' name='total' >
        <input type='hidden' name='email' >
        <input type='submit' name='confirmorder' value='Confirm Order and pay'>
        </div>";
        
    }*/
    
    ?>
	
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

    <div> created by Shivaani S | all rights reserved! </div>



</body>
</html>
