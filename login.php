<?php
	
	include "assets/php/conn.php";
	session_start();
	
	$email=mysql_real_escape_string($_POST['email']);
	$pass=mysql_real_escape_string($_POST['password']);
	$user=mysql_real_escape_string($_POST['user']);
	
	if(!strcmp($user,"patient"))
	{	
		$pass=md5($pass);
		$sql="select * from patient where email='$email' && password='$pass'";
		$result=mysql_query($sql);
		$row=mysql_fetch_assoc($result);
		$count=mysql_num_rows($result);
		if($count=1)
		{
			$_SESSION['register']='patient';
			$_SESSION['id']=$row['id'];
			header('location:index.php');
		}
		else
		{
			die(header('location:Sign.php?loginfailed=1'));
		}
	}
	
	else if(!strcmp($user,"hospital"))
	{
		
		$sql="select id from hospital where hospitalprimaryemailid='$email' && password='$pass'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$count=mysql_num_rows($result);
		if($sql)
		{
				echo $sql."<br>".$count;
		}
		if($count==1)
		{
			$_SESSION['register']="hospital";
			$_SESSION['hospitalid']=$row['id'];
			header('location:hospital_panel.php');
		}
		else
		{
			die(header('location:Sign.php?loginfailed=1'));
		}
	}	
?>