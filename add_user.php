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
	<script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
    
    
    
    <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	
	
	
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/layout_fixed_custom.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
	<!-- /theme JS files -->
	<script type="text/javascript" src="assets/js/pages/datatables_basic_unit.js"></script>
	<!-- /theme JS files -->
	
	
	
	
    

	


	
	
	
</head>

<body class="navbar-top">

	<?php require_once "head.php"; ?>
    
	<div class="page-container">

		<div class="page-content">

			<?php require_once "colr.php"; ?>

			<div class="content-wrapper">
               
               
               <?php
                if (isset($_POST['submit']) ){
                                if(get_safe_post($mysqlicheck,"submit") == "save" && get_safe_post($mysqlicheck,"name") != "" && get_safe_post($mysqlicheck,"family") != "" && get_safe_post($mysqlicheck,"job") != "" && get_safe_post($mysqlicheck,"meli") != "" && get_safe_post($mysqlicheck,"mobi") != "" && get_safe_post($mysqlicheck,"gender") != "" )
                                {
                                    $name = get_safe_post($mysqlicheck,"name");
                                    $family = get_safe_post($mysqlicheck,"family");
                                    $job = get_safe_post($mysqlicheck,"job");
                                    $meli = get_safe_post($mysqlicheck,"meli");
                                    $mobi = get_safe_post($mysqlicheck,"mobi");
                                    $gender = get_safe_post($mysqlicheck,"gender");
									$datenow = mkdate("Y/m/d",date('Y-m-d'),'fa');
                                    $pass = sha1($meli);
                                        
									$result_u = mysqli_query($mysqlicheck,"SELECT * FROM user WHERE `user_code` ='".$meli."'");

									if ($result_u->num_rows > 0)
									{
										echo '<div class="alert alert-warning alert-styled-left">
													<button data-dismiss="alert" class="close" type="button">
														<span>×</span>
														<span class="sr-only">Close</span>
											</button>
										کد ملی <span class="text-semibold">'.$meli.'</span> قبلا ایجاد شده است .									</div>';
									}
									else {
                                    $sql = 'INSERT INTO `user`( `user_code`, `user_job`, `user_mobile`, `user_name`, `user_pass`, `user_family`, `user_g`, `user_data`, `user_time`,`user_tittle`) VALUES ("'.$meli.'" , "'.$job.'", "'.$mobi.'", "'.$name.'", "'.$pass.'", "'.$family.'", "'.$gender.'", "'.$datenow.'", "'.date("H:i:s").'", "user" )';
                                       
                                    $result = $mysqlicheck->query($sql);
									
										if (!$result) {
											echo'
												<div class="alert alert-danger alert-styled-left alert-bordered">
																<button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
																ارسال اطلاعات با <span class="text-semibold">خطا</span> رو برو گردید.
															</div>';
										}else{
											echo'<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
														<button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
														با موفقیت ثبت گردید .

													</div>';
										}

									}
                                }
                                else
                                 {
									echo'
									   <div class="alert alert-danger alert-styled-left alert-bordered">
										<button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
										تمامی فیلدها باید پر باشد
										</div>';
								}
                }
                            ?>
               
               
               
                <div class="content">

					<!-- Vertical form options -->
					<div class="row">
						<div class="col-md-6">
				<!-- Basic layout-->
							<form action="#" class="form-horizontal" method="post">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">ایجاد کاربر</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label">نام:</label>
											<div class="col-lg-9">
												<input type="text" name="name" value="" class="form-control" placeholder="نام کاربر">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label"> نام خانوادگی: </label>
											<div class="col-lg-9">
												<input type="text" name="family" value="" class="form-control" placeholder="نام خانوادگی کاربر">
											</div>
										</div>
                                        
                                        <div class="form-group">
											<label class="col-lg-3 control-label"> سمت: </label>
											<div class="col-lg-9">
												<input type="text" name="job" value="" class="form-control" placeholder="شغل سازمانی">
											</div>
										</div>
                                        
										<div class="form-group">
											<label class="col-lg-3 control-label">کد ملی:</label>
											<div class="col-lg-9">
												<input type="number" name="meli" value="" class="form-control" placeholder="کد ملی">
											</div>
										</div>
                                        
                                        <div class="form-group">
											<label class="col-lg-3 control-label">موبایل:</label>
											<div class="col-lg-9">
												<input type="number" name="mobi" value="" class="form-control" placeholder="شماره همراه">
											</div>
										</div>
                                        
										<div class="form-group">
											<label class="col-lg-3 control-label">جنسیت:</label>
											<div class="col-lg-9">
												<label class="radio-inline">
													<input type="radio" value="1" class="styled" name="gender" checked="checked">
													آقا
												</label>

												<label class="radio-inline">
													<input type="radio" value="2" class="styled" name="gender">
													خانوم
												</label>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your message:</label>
											<div class="col-lg-9">
												<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" name="submit" value="save" class="btn btn-primary">ایجاد کاربر <i class="icon-arrow-left13 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->
                        </div>
                        
                        <div class="col-md-6">
                        <!-- Single row selection -->
                        
                        
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">کاربران ایجاد شده</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>
                        <table class="table datatable-basic">
							<thead>
								<tr>
									<th>نام خانوادگی</th>
					                <th>سمت</th>
					                <th>وضعیت</th>
                                    <th>تاریخ ایجاد</th>
								</tr>
							</thead>
							<tbody>
                                 <?php
									$table2 = mysqli_query($mysqlicheck,"SELECT * FROM user");
									while($rows2=mysqli_fetch_assoc($table2))
									{
                                        $user_family = $rows2['user_family'];
                                        $user_job = $rows2['user_job'];
                                        $user_data = $rows2['user_data'];
                                        echo'<tr>
                                            <td>
                                              '.$user_family.'
                                            </td>
                                            <td>
                                              '.$user_job.'
                                            </td>
											<td></td>
                                            <td>'.$user_data.'</td>
											</tr>';
									}
									?>
							</tbody>
						</table>
					</div>
					<!-- /single row selection -->
                        </div>
                        
                        
                    </div>
                </div>
							

			</div>

		</div>

	</div>

</body>
</html>