<?php
include("inc_db.php");

	
	
if(get_safe_post($mysqlicheck,"ACT") == "logout")
{
	session_unset();
	session_destroy();
	session_start();
	session_regenerate_id();
}
if(get_safe_post($mysqlicheck,"ACT") == "check" && get_safe_post($mysqlicheck,"username") != "" && get_safe_post($mysqlicheck,"password") != "")
{
	/* Check For Username */
	$result_u = mysqli_query($mysqlicheck,"SELECT * FROM `user` WHERE
        `user_code` = '" . get_safe_post($mysqlicheck,"username") . "' AND
        `user_pass` = '" . sha1(get_safe_post($mysqlicheck,"password")) . "'");

	if ($result_u->num_rows > 0)
	{
        
    }
    else
    {
        
    }
	$result = $mysqlicheck->query($sql);
	if (!$result) {
	  printf("Query failed: %s\n");//, $mysqlicheck->error);
	  die();
	}
	if (mysqli_num_rows($result)) {
		session_unset();
		session_destroy();
		session_start();
		session_regenerate_id();
		while($row = $result->fetch_row())
		{
			$_SESSION['user_id']	=	$row['user_id'] ;
			$_SESSION['title']		=	$row['user_tittle'] ;
			$_SESSION['name']		=	$row['user_name'] ;
			$_SESSION['family']		=	$row['user_family'] ;
		}
        print_r($_SESSION);
		$result->close();
		set_log("login","",$mysqlicheck);
	}
	header("Location: index.php");
	die();
}


?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ورود به سامانه</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/core.css" rel="stylesheet" type="text/css">
<link href="assets/css/components.css" rel="stylesheet" type="text/css">
<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
</head>

<body>
<div class="page-container login-container">
  <div class="page-content">
    <div class="content-wrapper">
      <div class="content">
        <form action="login.php" method="post">
          <div class="panel panel-body login-form">
            <div class="text-center">
              <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
              <h5 class="content-group">وارد حساب کاربری خود شوید <small class="display-block">اطلاعات خود را وارد نمایید</small></h5>
            </div>
            <div class="form-group has-feedback has-feedback-left">
              <input type="text" class="form-control" name="username" placeholder="نام کاربری">
              <div class="form-control-feedback"> <i class="icon-user text-muted"></i> </div>
            </div>
            <div class="form-group has-feedback has-feedback-left">
              <input type="password" class="form-control" name="password" placeholder="کلمه عبور">
              <div class="form-control-feedback"> <i class="icon-lock2 text-muted"></i> </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">ورود <i class="icon-circle-left2 position-right"></i></button>
              <input type="hidden" name="ACT" value="check" />
            </div>
            <div class="text-center"> <a href="#">فراموش کرده اید?</a> </div>
          </div>
        </form>
        <div class="footer text-muted"> &copy; 2017. <a href="#">Alireza safaiepoor & Ali Gohari</a> </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
