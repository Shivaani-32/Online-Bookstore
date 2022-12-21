<?php
session_start();
include("connection.php");
include("functions.php");
if(isset($_POST['c1']))
{
	$i=$_POST['id'];
	$sql3=$con->adb->customer->find(['orderid1'=>$i]);
	//$sql4="select * from customer where orderid1='$i'";
	
	foreach($sql3 as $r4)
	{
	$i11=$r4["quantity"];
	//$sql=$con->adb->book->updateOne(['title'=>$r4['itemname']],['$set'=>['stock'=>r4['stock']+$i11]]);
		//$sql="update books set stock=stock+$i11 where title='$r4[itemname]'";
			$sqlin=$con->adb->cancelorders->insertOne(['totcost'=>$r4['totcost'],'itemname'=>$r4['itemname'],'quantity'=>$r4['quantity'],'price'=>$r4['price'],'orderid1'=>$r4['orderid1'],'userid'=>$r4['userid'],'dateof'=>$r4['dateof']]);

		//$sqlin="insert into cancelorders (namec,totcost,itemname,quantity,price,orderid,userid,dateof) values ('$r4[name]','$r4[totcost]','$r4[itemname]','$r4[quantity]','$r4[price]','$r4[orderid1]','$r4[userid]','$r4[dateof]')";
		
	}
	$sql=$con->adb->customer->deleteMany(['orderid1'=>$i]);
	
	if($sql)
	{
		echo "<script>alert('Cancellation successful!')
		window.location.href='oderss.php'</script>";
}
}
?>
	