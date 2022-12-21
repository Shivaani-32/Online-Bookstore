
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
.canc{
text-align:center;}
	
	



 
  
  
    </style>
</head>

    <?php 
   require 'vendor/autoload.php';
   // connect to mongodb
   $con=new MongoDB\Client("mongodb://localhost:27017");


  
$db = $con->adb;
$sql=$db->book->find();


	
   
	
    ?>
	
<body>
<header class="header">

    



    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> bookTown</a>
<div class="autocomplete">
        <form action="srch.php" autocomplete="off" class="search-form" method=post>
		
            <input type="search" name="text" placeholder="subject or authors" id="myInput">
			<input type="submit" name="submit2" value="Search">
            <label for="submit2" class="fas fa-search"></label>
		
			
        </form>
		</div>
		

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            
            <a href="mycart.php" class="fas fa-shopping-cart"></a>
			<?php
session_start();




	if(isset($_SESSION['user_id']))
	{
		echo "<span>".$_SESSION['tcart']."</span>";
		echo "<a href='logout.php'>LOGOUT</a>";
		$c=1;
		
	}
	else
	{
		echo "<a href='login.php'>LOGIN</a>";
		$c=0;
	}
	?>
		

            <a href="mycart.php" class="fas fa-user"></a>
			<?php if($c==1) echo "".$_SESSION['username']."";?>
        </div>
		

    </div>
	

    <div class="header-2">
        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="home 1.php">shop</a>
            <a href="mycart.php">cart</a>
			<a href="mycart.php">My Account</a>
           
            
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


<!-- login form  -->
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var countries = ["Computer Engineering","Mechanical Engineering","eee","Chemistry","Mathematics","Civil Engineering","Jain","Bs Grewal","Bjarne Stroustrup","Joshua Bloch","Pradep Day Manas Gosh","Barbara C williams","Nathan Clark","RS Ghurmi JK Gupta","Agor R","VK mehta Rohit Mehta","MM Uppal","Adan B Gorway","Sadhu Singh"
,"Veerarajan T","Balagurusamy","Chris Sebestian","Python Programming","Engineering Chemistry-Jain & Jain","The C++","Effective Java","Higher Engineering Mathematics","Programming in C","Fluid mechanics","C#","Civil Engineering Book","Civil Eng-Qs and ans","Basic Electrical Engineering","Engineering Chemistry","Think Python",
"Basic mechanical Engineering","Discrete Mathematics","Programming with Java"];
autocomplete(document.getElementById("myInput"), countries);
</script>

<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="">
        <h3>sign in</h3>
        <span>username</span>
        <input type="email" name="" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>

</div>

</div>

    <section>

            <?php
            
            ?>
            
               
                <div class='content' >
			<?php

                foreach($sql as $row)
            {
                
				if($row["stock"]>0)
					$i="Available";
				else
					$i="Unavailable";
				echo "
				
                
                    
                    <div>
                        
                            <h2>$row[title]</h2>
                            <form action='manage_cart.php' method='post'>
                        
			Rs. $row[cost]
                       
                        <br>Year:$row[published_date]<br>
						$row[pname]<br>
						<img class='img1' src='$row[img]'><br>
                        <input type='number' min='1' max='$row[stock]' name='Quantity'  required><br>";
						if($i=="Available")
						
                        echo"<button class='btn' type='submit' name='Add' >Add To Cart</button>";
                        //echo"<button class='btn' type='submit' name='Add' >Add To Cart</button>
                        echo"<input type='hidden' name='Item_Name' value='$row[title]'>
                        <input type='hidden' name='Price' value='$row[cost]'>
						<input type='hidden' name='book_id' value='$row[book_id]'>
						<input type='text' class='canc' name='stock' value='$i' readonly>
                        </form>
                    </div>
					
				
               
           
			
            ";
            }
			
            
            
            ?>
            
            </div>
		
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

    <div> created by Shivaani S | all rights reserved! </div>



</body>
</html>