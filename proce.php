<?php
include("inc_db.php");


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
<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/task_detailed.js"></script>
	<!-- /theme JS files -->
</head>

<body class="navbar-top">
<?php require_once "head.php"; ?>
<div class="page-container">
  <div class="page-content">
    <?php require_once "colr.php"; ?>
    <div class="content-wrapper">
      <?php
        
        $id = get_safe_get($mysqlicheck,"pr_id");
      if (isset($_POST['add_c']) )
      {
         if(get_safe_post($mysqlicheck,"add_c") == "add_c" && get_safe_post($mysqlicheck,"text") != "" )
         {
             $text = get_safe_post($mysqlicheck,"text");
             

             $sql = 'INSERT INTO `co_f_pr`(`co_pr_id`, `co_ur_id`, `come`, `co_data`, `co_time`) VALUES ("'.$id.'" , "'.$_SESSION['user_id'].'", "'.$text.'", "'.$date.'", "'.$time.'")';

                $result = $mysqlicheck->query($sql);

                if (!$result)
				{
                    echo'<div class="alert alert-danger alert-styled-left alert-bordered">
						<button data-dismiss="alert" class="close" type="button">
						<span>×</span><span class="sr-only">Close</span></button>
						ارسال اطلاعات با <span class="text-semibold">خطا</span> رو برو گردید.
						</div>';
                }
				else
				{
                    echo'<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
					<button data-dismiss="alert" class="close" type="button">
					<span>×</span><span class="sr-only">Close</span></button>
                    کامنت شما با موفقیت ثبت گردید .
					</div>';
                }
          }
          else
          {
               echo '<div class="alert alert-warning alert-styled-left">
					<button data-dismiss="alert" class="close" type="button">
					<span>×</span>
					<span class="sr-only">Close</span>
                    </button>
                    متن شما وارد نشده است .			
                    </div>';
          }
       }
       $ch_1 = 0; 
       if (isset($_POST['submit1']) )
       {
           $id = get_safe_get($mysqlicheck,"pr_id");
           $ch_1 = 1;
       }
       if (isset($_POST['submit2']) )
       {
			$id = get_safe_get($mysqlicheck,"pr_id");
           
			$ch_1 = 0;
                    
			$sql = 'UPDATE `refer` SET `re_vi`= 3 ,`re_date`="'.$date.'",`re_time`="'.$time.'" WHERE `re_pr_id`= "'.$id.'" and `re_ur_id`= "'.$_SESSION['user_id'].'" ';
			$result = $mysqlicheck->query($sql);
			if (!$result)
            {
               echo'<div class="alert alert-danger alert-styled-left alert-bordered">
                    <button data-dismiss="alert" class="close" type="button">
					<span>×</span><span class="sr-only">Close</span></button>
                    ارسال اطلاعات با <span class="text-semibold">خطا</span> رو برو گردید دوباره سعی نمائید.
                    </div>';
            }
            else
            {
				echo'<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
					<button data-dismiss="alert" class="close" type="button">
					<span>×</span><span class="sr-only">Close</span></button>
                    پروسه از طرف شما تأیید گردید .
					</div>';
            }
                
         }
        if (isset($_POST['rect']) )
         {
              header('Location: rece_pas.php');
         }
        
        $table_c1 = mysqli_query($mysqlicheck,'SELECT `re_vi` FROM `refer` WHERE `re_pr_id`= "'.$id.'" and `re_ur_id` = "'.$_SESSION['user_id'].'"');
        $rows_c1 = mysqli_fetch_assoc($table_c1); 
        
        if ($rows_c1['re_vi'] != 3)
        {
            $sql_v = 'UPDATE `refer` SET `re_vi`=2,`re_date`="'.$date.'" ,`re_time`="'.$time.'" WHERE `re_pr_id`= "'.$id.'" and `re_ur_id` = "'.$_SESSION['user_id'].'"';
            $result_v = $mysqlicheck->query($sql_v);
        }
        $table1 = mysqli_query($mysqlicheck,"SELECT * FROM `process` where proc_id = '".$id."'");
        $rows1 = mysqli_fetch_assoc($table1);
        $id = $rows1['proc_id'];
      ?>
      <!-- Content area -->
				<div class="content">

					<!-- Detailed task -->
					<div class="row">
						<div class="col-lg-9">

							<!-- Task overview -->
							<div class="panel panel-flat">
								<div class="panel-heading mt-5">
									<h5 class="panel-title"><?php echo $id; ?>#: <?php echo $rows1['subject']; ?>:</h5>
									<form method="post">
									<input type="hidden" value="<?php echo $id; ?>" name="ch_id">
                                        <div class="form-group">
                                            <div class="text-right">
                                              <?php if($ch_1 == 0 && $rows_c1['re_vi'] != 3){?>
                                              <button type="submit" class="btn bg-teal-400" name="submit1">تأیید نمودن پروسه<i class="icon-play3 position-right"></i></button>
                                              <?php }?>
                                              <?php if($ch_1 == 1){?>
                                              <div style="text-align:center">
                                                  <p>آیا مطمئن هستید که می خواهید این پروسه را تأیید نمائید ؟</p>
                                                  <button class="btn btn-link" type="submit" name="rect" ><i class="icon-cross"></i>انصراف</button>
                                                  <button type="submit" name="submit2" class="btn bg-teal-400">تأیید <i class="icon-check"></i></button>
                                              </div>
                                              <?php }?>
                                            </div>
                                        </div>
                                    </form>
								</div>
                                <?php if($ch_1 == 0){?>
								<div class="panel-body">
									<h6 class="text-semibold">توضیحات</h6>
									<p class="content-group"><?php echo $rows1['descr']; ?>.</p>

									
				                    <h6 class="text-semibold">آخرین کامنتهای اشخاص</h6>
									

									<div class="table-responsive content-group">
										<table class="table table-framed">
											<thead>
												<tr>
													<th style="width: 20px;">#</th>
													<th class="col-xs-3">همکار</th>
													<th class="col-xs-2">تاریخ</th>
													<th>کامنت</th>
												</tr>
											</thead>
											<tbody>
											<?php
                                            $table_v4 = mysqli_query($mysqlicheck,"SELECT `user`.*, `refer`.* FROM `user` INNER JOIN `refer` on `user`.`user_id` = `refer`.`re_ur_id` WHERE `refer`.`re_pr_id` = '".$id."'");
                                            $nu = 1 ;
                                            while($rows_v4=mysqli_fetch_assoc($table_v4))
                                            {
                                                $table_v5 = mysqli_query($mysqlicheck,"SELECT * from co_f_pr where co_pr_id = '".$id."' and co_ur_id = '".$rows_v4['user_id']."' ORDER BY com_id DESC LIMIT 1 ");
                                                $rows_v5=mysqli_fetch_assoc($table_v5);
                                                if($rows_v5)
                                                {
                                                ?>
                                                <tr>
													<td><?php echo $nu; ?></td>
													<td><span class="text-semibold"><?php echo $rows_v4['user_family']; ?></span></td>
													<td>
									                	<?php echo $rows_v5['co_data'].'<br>'.$rows_v5['co_time']; ?>
													</td>
													<td><?php echo $rows_v5['come']; ?></td>
												</tr>
												<?php $nu ++ ;}}?>
											</tbody>
										</table>
									</div>

				                    <h6 class="text-semibold">آپدیت فایل</h6>
									<p>فایلهای مورد نیاز برای انجام این پروسه.</p>

									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="assets/images/placeholder.jpg" alt="">
													<div class="caption-overflow">
														<span>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-zoomin3"></i></a>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-download"></i></a>
														</span>
													</div>
												</div>

												<div class="caption text-center">
													 dashboard_draft.png
												</div>
											</div>
										</div>

										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="assets/images/placeholder.jpg" alt="">
													<div class="caption-overflow">
														<span>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-zoomin3"></i></a>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-download"></i></a>
														</span>
													</div>
												</div>

												<div class="caption text-center">
													 profile_page.png
												</div>
											</div>
										</div>

										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="assets/images/placeholder.jpg" alt="">
													<div class="caption-overflow">
														<span>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-zoomin3"></i></a>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-download"></i></a>
														</span>
													</div>
												</div>

												<div class="caption text-center">
													 shopping_cart.png
												</div>
											</div>
										</div>

										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="assets/images/placeholder.jpg" alt="">
													<div class="caption-overflow">
														<span>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-zoomin3"></i></a>
															<a href="#" class="btn bg-success-300 btn-xs btn-icon"><i class="icon-download"></i></a>
														</span>
													</div>
												</div>

												<div class="caption text-center">
													 sales_statistics.png
												</div>
											</div>
										</div>
									</div>
								</div>
                                    
								<div class="panel-footer">
									<ul>
										<li><span class="status-mark border-blue position-left"></span> Status:</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Open <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li class="active"><a href="#">Open</a></li>
												<li><a href="#">On hold</a></li>
												<li><a href="#">Resolved</a></li>
												<li><a href="#">Closed</a></li>
												<li class="divider"></li>
												<li><a href="#">Dublicate</a></li>
												<li><a href="#">Invalid</a></li>
												<li><a href="#">Wontfix</a></li>
											</ul>
										</li>

									</ul>

									<ul class="pull-right">
										<li><a href="#"><i class="icon-compose"></i></a></li>
										<li><a href="#"><i class="icon-trash"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-grid-alt"></i> <span class="caret"></span></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="#"><i class="icon-alarm-add"></i> Check in</a></li>
												<li><a href="#"><i class="icon-attachment"></i> Attach screenshot</a></li>
												<li><a href="#"><i class="icon-user-plus"></i> Assign users</a></li>
												<li><a href="#"><i class="icon-warning2"></i> Report</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<?php }?>
							</div>
							<!-- /task overview -->

                            <?php if($ch_1 == 0){?>
							<!-- Comments -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title text-semiold"><i class="icon-bubbles4 position-left"></i> کامنت</h5>
								</div>

								<div class="panel-body">
									<ul class="media-list content-group-lg stack-media-on-mobile">
									<?php
                                    $table_v2 = mysqli_query($mysqlicheck,"SELECT `co_f_pr`.* , `user`.`user_family` from `co_f_pr`INNER JOIN `user` on `user`.`user_id` = `co_f_pr`.`co_ur_id` where `co_f_pr`.`co_pr_id` = '".$id."'");
                                    while($rows_v2=mysqli_fetch_assoc($table_v2))
                                    {
									?>
										<li class="media">
											<div class="media-left">
												<a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
											</div>
                                            
											<div class="media-body">
												<div class="media-heading">
													<a href="#" class="text-semibold"><?php echo $rows_v2['user_family']; ?></a>
													<span class="media-annotation dotted"><?php echo $rows_v2['co_data'].' / '.$rows_v2['co_time']; ?></span>
												</div>

												<p><?php echo $rows_v2['come']; ?>.</p>

											</div>
										</li>
                                   <?php }?>
                                    </ul>
                                    <?php
                                    if ($rows_c1['re_vi'] != 3)
                                    { ?>
									<h6 class="text-semibold"><i class="icon-pencil7 position-left"></i>کامنت شما</h6>
									<form method="post">
                                        <div class="form-group has-success has-feedback">
                                            <textarea rows="5" cols="5" name="text" class="form-control" placeholder="مطلب خود را بنویسید ..."></textarea>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn bg-blue" value="add_c" name="add_c"><i class="icon-plus22"></i> اضافه نمودن کامنت</button>
                                        </div>
									</form>
									<?php } ?>
								</div>
							</div>
							<!-- /comments -->
                            <?php }?>
						</div>

						<div class="col-lg-3">

							<!-- Assigned users -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><i class="icon-users position-left"></i> کاربران ارجاع شده</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">
									<ul class="media-list">
									<?php
                                    $table_v42 = mysqli_query($mysqlicheck,"SELECT `user`.*, `refer`.* FROM `user` INNER JOIN `refer` on `user`.`user_id` = `refer`.`re_ur_id` WHERE `refer`.`re_pr_id` = '".$id."'");
                                      while($rows_v42=mysqli_fetch_assoc($table_v42))
                                      {  
                                        
										echo '<li class="media">
											<div class="media-left">';
											if ($rows_v42['re_vi'] == 3)
												echo '<a href="#" class="btn border-success text-success btn-flat btn-icon btn-rounded btn-sm"><i class="icon-checkmark3"></i></a>';
                                            else
												echo '<a href="#" class="btn border-danger text-danger btn-flat btn-icon btn-rounded btn-sm"><i class="icon-cross2"></i></a>';
										echo '</div>

											<div class="media-body media-middle text-semibold">'
												.$rows_v42['user_name']." ".$rows_v42['user_family'].'
												<div class="media-annotation">'.$rows_v42['user_job'].'</div>';
                                          if ($rows_v42['re_vi'] == 3)
												echo '<div class="media-annotation text-success" >اتمام یافته</div>';
                                          elseif ($rows_v42['re_vi'] == 2)
												echo '<div class="media-annotation text-orange" >در دست اقدام</div>';
                                          else
												echo'<div class="media-annotation text-danger" >دیده نشده</div>';
											echo '</div>

										</li>';
                                    }?>
                                    </ul>
								</div>
							</div>
							<!-- /assigned users -->


							

						</div>
					</div>
					<!-- /detailed task -->


					

				</div>
				<!-- /content area -->
    </div>
  </div>
</div>
</body>
</html>