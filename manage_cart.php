<?php
session_start();
include("connection.php");
	include("functions.php");
	


	if(!isset($_SESSION['user_id']))
	{
		echo "<script>
                alert('login first');	
                window.location.href='login.php';
                </script>";
	}
	

else{
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add']))
    {
        if(!isset($_SESSION['cart']) or count($_SESSION['cart'])==0)
		{$_SESSION['tcart']=0;}
		if(isset($_SESSION['cart']))
        {
             
			$mybooks=array_column($_SESSION['cart'],'Item_Name');//if item is added aldready
            if(in_array($_POST['Item_Name'],$mybooks))
            {
                
				
				echo "<script>
                alert('book Already Added');	
                window.location.href='mycart.php';
                </script>";
		
            }
            else
            {
                $count=count($_SESSION['cart']);	//adding the book to cart and redirecting to cart page
                $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>$_POST['Quantity'],'id'=>$_POST['book_id']);
                $_SESSION['tcart']+=$_POST['Quantity'];;
				echo "<script>
                    alert('Book Added');
                    window.location.href='mycart.php';
                    </script>";
					
            }
        }
        else
        {
		$_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>$_POST['Quantity'],'id'=>$_POST['book_id']);
            $_SESSION['tcart']+=$_POST['Quantity'];
			echo "<script>
                alert('Book Added');
                window.location.href='mycart.php';
                </script>";
		
        }
    }//removing items from cart
    if(isset($_POST['Remove']))
    {
        foreach($_SESSION['cart'] as $k => $value)
        {
            if ($value['Item_Name']==$_POST['Item_Name'])
            {
                $_SESSION['tcart']-=$value['Quantity'];
				unset($_SESSION['cart'][$k]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                
                window.location.href='mycart.php';
                </script>";
				
            }
        }
    }
}}

if(isset($_POST['s1']))
{
	foreach($_SESSION['cart'] as $k => $value)
        {
            if ($value['Item_Name']==$_POST['Item_Name'])
				
				{
					
						
			if($value['Quantity']>$_POST['q'])
                {
                    $_SESSION['tcart']-=($value['Quantity']-$_POST['q']);
                }
                else
                {
                    $_SESSION['tcart']+=($_POST['q']-$value['Quantity']);
                }				
					$_SESSION['cart'][$k]['Quantity']=$_POST['q'];
				
		
				echo "<script>
                
                window.location.href='mycart.php';
                </script>";
			}
		}
}
?>
