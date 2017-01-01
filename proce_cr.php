<?php
include("inc_db.php");

if($_SESSION['login']!="modir" && $_SESSION['login']!="user" )
{
	$url = 'login.php';
	header( "Location: $url" );
	die();
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
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/layout_fixed_custom.js"></script>
    
    
    <!-- Theme JS files -->
	
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	<!-- /theme JS files -->
    
</head>

<body class="navbar-top">

	<?php require_once "head.php"; ?>
    
	<div class="page-container">

		<div class="page-content">

			<?php require_once "colr.php"; ?>

			<div class="content-wrapper">

				<div class="content">
                   <div class="row">
                	<div class="col-md-6">
                        <form method="post" class="form-horizontal">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">ایجاد پروسه</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">موضوع :</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name" class="form-control" placeholder="عنوان">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">ارجاع به :</label>
                                        <div class="col-lg-9">
                                           <div class="form-group">
                                                <select multiple="multiple" data-placeholder="انتخاب اشخاص..." class="select">
                                                 
											    <option></option>   
                                                        <?php
												$table = mysqli_query($mysqlicheck,"SELECT * FROM `user` ");
												while($rows=mysqli_fetch_assoc($table))
												{
													echo '<option value="'.$rows['user_id'].'">'.$rows['user_family'].'</option>';
												}
												?>
                                                    
                                                </select>
                                            </div>
                                           
                                            
                                                
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">توضیحات :</label>
                                        <div class="col-lg-9">
                                            <textarea rows="5" cols="5" class="form-control" placeholder="درج توضیحات شما .."></textarea>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" name="submit" value="save" class="btn btn-primary">ایجاد و ذخیره <i class="icon-arrow-left13 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
					</div>
                    <div class="col-md-6">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">نمونه گروه اصلی و فرعی برای درک بیشتر</h6>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
        
                            <div class="panel-body">
                                <a class="display-block content-group" href="#">
                                    <img alt="" class="img-responsive content-group" src="assets/images/placeholder.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

			</div>

		</div>

	</div>

</body>
</html>