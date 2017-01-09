<?php
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