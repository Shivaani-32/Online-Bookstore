<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query=$con->adb->users1->find();
		foreach($query as $r)
		
		{
			if($r['user_id']==$id)
			{$user_data=$r;
		return $user_data;
	}}}
				
		
	

			
	
		
	

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}