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
    
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
   
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/touchspin.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_input_groups.js"></script>
	
	
	
	

</head>

<body class="navbar-top">

	<?php require_once "head.php"; ?>
    
	<div class="page-container">

		<div class="page-content">

			<?php require_once "colr.php"; ?>

			<div class="content-wrapper">
               
               
               
                <?php
                $ch_1 = 0;
                if (isset($_POST['submit1']) )
                {
                     if(get_safe_post($mysqlicheck,"submit1") == "save" && get_safe_post($mysqlicheck,"rec_pas") != "" )
                     {
                        $id = get_safe_post($mysqlicheck,"rec_pas");
                        $ch_1 = 1;

                        $result_p = mysqli_query($mysqlicheck,"SELECT * FROM user WHERE `user_id` ='".$id."'");
                        $rowsp = mysqli_fetch_assoc($result_p);
                     }
                    else
                    {
                        echo '<div class="alert alert-warning alert-styled-left">
						      <button data-dismiss="alert" class="close" type="button">
							     <span>×</span>
							 <span class="sr-only">Close</span>
                                </button>
                           شخصی را انتخاب ننموده اید .			
                            </div>';
                    }
                 }
                
                if (isset($_POST['submit2']) )
                {
                    $meli = get_safe_post($mysqlicheck,"ch_me");
                    $pass = sha1($meli);
                    $id_2 = get_safe_post($mysqlicheck,"ch_id");
                    $ch_1 = 0;
                    
                    $sql = 'UPDATE `user` SET `user_pass`= "'.$pass.'" WHERE `user_id`= "'.$id_2.'"';
                                       
                            $result = $mysqlicheck->query($sql);

                            if (!$result)
                            {
                                echo'
                                    <div class="alert alert-danger alert-styled-left alert-bordered">
                                        <button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
                                        ارسال اطلاعات با <span class="text-semibold">خطا</span> رو برو گردید دوباره سعی نمائید.
                                    </div>';
                            }
                            else
                            {
                                echo'<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                                    <button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
                                    رمز عبور شخص مورد نظر با موفقیت تغییر نمود و کد ملیشان به عنوان رمز عبور جدید در نظر گرفته شد .

                                    </div>';
                            }
                
                }
                if (isset($_POST['rect']) )
                {
                    header('Location: rece_pas.php');
                }
                
                ?>
               
               
               
               
               
                <div class="content">
                    
                    <!-- Vertical form options -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">بازیابی رمز عبور کاربران</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                	</ul>
			            	</div>
						    <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
						</div>

						<div class="panel-body">
							<form method="post">
								<div class="row">
								<?php
                                   if ($ch_1 == 0){
									$table2 = mysqli_query($mysqlicheck,"SELECT * FROM user");
									while($rows2=mysqli_fetch_assoc($table2))
									{ ?> 
									  
									<div class="col-sm-4">
									  <ul class="media-list media-list-linked">
                                          <li class="media">
                                              <a href="#" class="media-link">
                                                  <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle" alt=""></div>
                                                  <div class="media-body">
                                                      <div class="media-heading text-semibold"><?php echo $rows2['user_name']." ".$rows2['user_family']; ?></div>
                                                      <span class="text-muted"><?php echo $rows2['user_job']; ?></span>
                                                  </div>
                                                  <div class="media-right media-middle">
                                                      <input type="radio" name="rec_pas" class="styled" value="<?php echo $rows2['user_id']; ?>" >
                                                  </div>
                                              </a>
                                          </li>
                                        </ul>
								    </div>
								  <?php  
								    
								    }}
									?>
									<?php if($ch_1 == 1){?>
									<div style="text-align:center">
									<h6 class="text-semibold"><i class="icon-law position-left"></i> مدیریت محترم</h6>
									<p>آیا می خواهید رمز عبور <span class="text-warning"><?php echo $rowsp['user_name']." ".$rowsp['user_family']; ?></span>  را تغییر دهید ؟</p></div>
                                   <?php }?>
                                    <input type="hidden" value="<?php echo $id; ?>" name="ch_id">
                                    <input type="hidden" value="<?php echo $rowsp['user_code']; ?>" name="ch_me">
								    

								
								</div>
							    <div class="form-group">
                                   <div class="text-right">
                                      <?php if($ch_1 == 0){?>
                                       <button type="submit" class="btn bg-teal-400" name="submit1" value="save">بازیابی و ذخیره <i class="icon-play3 position-right"></i></button>
                                       <?php }?> 
                                       <?php if($ch_1 == 1){?>
                                       <button class="btn btn-link" type="submit" name="rect" ><i class="icon-cross"></i> بستن</button>
									<button type="submit" name="submit2" value="save" class="btn bg-teal-400">ذخیره <i class="icon-check"></i></button>
                                    <?php }?>   
                                   </div>
                                </div>
                            </form>
						</div>
					</div>
                </div>

			</div>

		</div>

	</div>

</body>
</html>