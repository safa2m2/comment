<?php
include("inc_db.php");
if (isset($_POST['submit_o']) )
{	
	if(get_safe_post($mysqlicheck,"submit_o") == "out")
    {
       session_unset();
	   session_destroy();
	   session_start();
	   session_regenerate_id();
       
        $url = 'index.php';
		header( "Location: $url" );
		die();
    }
}



?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>پنل ادمین</title>
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="assets/css/yekan.css" rel="stylesheet" type="text/css">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <script type="text/javascript" src="assets/js/pages/layout_fixed_custom.js"></script>
</head>

<body class="navbar-top">
<?php require_once "head.php"; ?>
<div class="page-container">
  <div class="page-content">
    <?php require_once "colr.php"; ?>
    <div class="content-wrapper">
     <?php
          if (!isset($_GET['out']))
          {
            ?>
      <div class="page-header" style="text-align: center"><img src="12.png" width="90%">  </div><?php }?>
      <div class="content">
         <div class="panel-body">
           
              <div class="row"> <?php
          if (isset($_GET['out']))
          {
            ?>  
               
                <div >
                  <h6 class="text-semibold"><i class="icon-law position-left"></i><?php echo $_SESSION['user_name'].' '.$_SESSION['user_family'] ;?></h6>
                  <p style="text-align:center">آیا مطمئن هستید که می خواهید از سامانه خارج شوید؟</p>
                </div>
                
                
              
              <div class="form-group">
                <div class="text-right">
                  <form method="post">
                  <button class="btn btn-link" type="recet" name="rect" ><i class="icon-cross"></i> انصراف</button>
                  <button type="submit" name="submit_o" value="out" class="btn bg-teal-400">تأیید <i class="icon-check"></i></button>
                  </form>
                  </div>
              </div>
                  
              
              
              
       <?php   } ?>
          
          
             </div>
             </div>
       </div>
    </div>
  </div>
</div>
</body>
</html>