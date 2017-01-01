<?php
	function get_username_data_from_id($mysqlicheck,$id)
	{
		$sql="SELECT * FROM users WHERE id = '" . $id . "'";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		while($row = $result->fetch_row())
		{
			$variable		=	$row ;
		}
		$result->close();
		return $variable;
	}
	function get_username_name_from_id($mysqlicheck,$id)
	{
		$sql="SELECT name FROM users WHERE id = '" . $id . "'";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		while($row = $result->fetch_row())
		{
			$variable		=	$row ;
		}
		$result->close();
		return $variable[0];
	}
	function get_shift_data_from_id($mysqlicheck,$id)
	{
		$sql="SELECT * FROM shift WHERE id = '" . $id . "'";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		while($row = $result->fetch_row())
		{
			$variable		=	$row ;
		}
		$result->close();
		return $variable;
	}
	function get_shift_name_from_id($mysqlicheck,$id)
	{
		$sql="SELECT name FROM shift WHERE id = '" . $id . "'";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		while($row = $result->fetch_row())
		{
			$variable		=	$row ;
		}
		$result->close();
		return $variable[0];
	}
	function get_shift_users($mysqlicheck,$id)
	{
		$sql="SELECT id FROM users WHERE shift_id = '" . $id . "'";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		$variable = array();
		while($row = $result->fetch_row())
		{
			$variable[]		=	$row[0] ;
		}
		$result->close();
		return $variable;
	}
	function get_shift_post($mysqlicheck,$id)
	{
		// $sql="SELECT id FROM post WHERE shift_id = '" . $id . "'";
		$sql="SELECT id FROM post";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		$variable = array();
		while($row = $result->fetch_row())
		{
			$variable[]		=	$row[0] ;
		}
		$result->close();
		return $variable;
	}
	function get_post_data_from_id($mysqlicheck,$id)
	{
		$sql="SELECT * FROM post WHERE id = '" . $id . "'";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		while($row = $result->fetch_row())
		{
			$variable		=	$row ;
		}
		$result->close();
		return $variable;
	}
	function get_post_name_from_id($mysqlicheck,$id)
	{
		$sql="SELECT name FROM post WHERE id = '" . $id . "'";

		$result = $mysqlicheck->query($sql);
		if (!$result) {
		  printf("Query failed: %s\n", "");//$mysqlicheck->error);
		  die();
		}
		while($row = $result->fetch_row())
		{
			$variable		=	$row ;
		}
		$result->close();
		return $variable[0];
	}
	function miladi_to_jalali($g_y, $g_m, $g_d) 
	{
		function div($a,$b) {
			return (int) ($a / $b);
		}

		$g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
		$j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);     
	 
	   $gy = $g_y-1600; 
	   $gm = $g_m-1; 
	   $gd = $g_d-1; 

	   $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400); 

	   for ($i=0; $i < $gm; ++$i) 
		  $g_day_no += $g_days_in_month[$i]; 
	   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
		  /* leap and after Feb */ 
		  $g_day_no++; 
	   $g_day_no += $gd; 

	   $j_day_no = $g_day_no-79; 

	   $j_np = div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
	   $j_day_no = $j_day_no % 12053; 

	   $jy = 979+33*$j_np+4*div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 

	   $j_day_no %= 1461; 

	   if ($j_day_no >= 366) { 
		  $jy += div($j_day_no-1, 365); 
		  $j_day_no = ($j_day_no-1)%365; 
	   } 

	   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
		  $j_day_no -= $j_days_in_month[$i]; 
	   $jm = $i+1; 
	   $jd = $j_day_no+1; 

	   return array($jy, $jm, $jd); 
	}
	function get_safe_post($mysqlicheck,$variable)
	{
		if (empty($_POST[$variable]))
			return false;
		$variable = trim($_POST[$variable]);
		$variable = strip_tags($mysqlicheck->real_escape_string($variable));
		return $variable;
	}
	function get_safe_get($mysqlicheck,$variable)
	{
		if (empty($_GET[$variable]))
			return false;
		$variable = trim($_GET[$variable]);
		$variable = strip_tags($mysqlicheck->real_escape_string($variable));
		return $variable;
	}
	function getUserIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		return $ip;
	}
	function set_log($EventType,$Detail,$mysqlicheck){
		$user_id = $_SESSION['user_id'];

		$log	=	"INSERT INTO `log` (`id`, `Date`, `EventType`, `UserID`, `Detail`, `IP`) VALUES (NULL, NOW(), '".$EventType."', '".$user_id."', '".$mysqlicheck->real_escape_string($Detail)."', '".getUserIP()."')";
		
		$result = $mysqlicheck->query($log);
		if(!$result)
			echo "خطای دیتابیس";
	}
?>