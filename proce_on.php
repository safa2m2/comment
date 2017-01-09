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

<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/natural_sort.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/tasks_list.js"></script>
	<script type="text/javascript" src="assets/js/pages/components_popups.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top">
<?php require_once "head.php"; ?>
<div class="page-container">
  <div class="page-content">
    <?php require_once "colr.php"; ?>
    <div class="content-wrapper">
      <!-- Content area -->
				<div class="content">

					<!-- Task manager table -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">پروسه های در حال اجرا</h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>

						<table class="table tasks-list table-lg">
							<thead>
								<tr>
									<th>#</th>
									<th>Period</th>
					                <th>موضوع</th>
					                <th>ایجاد کننده</th>
					                <th>تاریخ ایجاد</th>
					                <th>تاریخ تغییر</th>
					                <th>اشخاص</th>
									<th class="text-center text-muted" style="width: 30px;"><i class="icon-checkmark3"></i></th>
					            </tr>
							</thead>
							<tbody>
							  <?php
                $table2 = mysqli_query($mysqlicheck,'SELECT `process`.*, `refer`.`re_vi` FROM `process` INNER JOIN `refer` on `process`.`proc_id` = `refer`.`re_pr_id` WHERE `refer`.`re_ur_id` = "'.$_SESSION['user_id'].'" ');
                while($rows2=mysqli_fetch_assoc($table2))
                {
                    $table_c2 = mysqli_query($mysqlicheck,'SELECT MIN(re_vi) FROM `refer` WHERE `re_pr_id` = "'.$rows2['proc_id'].'" ');
                    $rows_c2 = mysqli_fetch_assoc($table_c2);
                    
                    if($rows_c2['MIN(re_vi)'] != 3)
                    {
                        $toen = tr_num($rows2['pr_data'],'en','/');
                        $toar = explode('.', $toen);
                        $time2 = date("Y-m-d");
                        $time1 = jalali_to_gregorian($toar[0],$toar[1],$toar[2],'-');
                        $diff = strtotime($time2) - strtotime($time1);
                        $goza = round($diff / 86400,0,1);
                   
                 ?>
                   
                               <tr>
									<td>#<?php echo $rows2['proc_id']; ?></td>
									<td><?php if ($goza == 0)
                                                echo 'امروز';
                                            elseif ($goza == 1)
                                                echo 'دیروز';
                                            elseif ($goza == 2)
                                                echo 'دو روز قبل';
                                            elseif (2<$goza && $goza<7)
                                                echo 'کمتر از یک هفته';
                                            elseif (7<$goza && $goza<30)
                                                echo 'کمتز از یک ماه';
                                            else
                                                echo 'بیشتر از یک ماه';
                                         ?> 
                                  
                                    </td>
					                <td>
					                	<div class="text-semibold"><a href="proce.php?pr_id=<?php echo $rows2['proc_id']; ?>"><?php echo $rows2['subject']; ?></a></div>
					                	<div class="text-muted"><?php echo substr($rows2['descr'],0,50).'...'; ?></div>
					                </td>
					                <td>
					                    <div class="btn-group" style="width: 80px;">
					                    <?php
					                    $table6 = mysqli_query($mysqlicheck,"SELECT user_family FROM user where user_id = '".$rows2['pr_ur_id']."'");
                                        $rows6=mysqli_fetch_assoc($table6); ?>
                                            <a href="#" ><span class="text-info"><?php echo $rows6['user_family']; ?></span></a>
                                        </div>
					                </td>
					                <td>
					                	<div class="input-group input-group-transparent">
					                		<?php echo $rows2['pr_data']; ?><br>
					                		<?php echo $rows2['pr_time']; ?>
					                	</div>
				                	</td>
				                	<td>
					                	<div class="input-group input-group-transparent">
					                	<?php
                                            $table3 = mysqli_query($mysqlicheck,"SELECT * FROM co_f_pr where `co_pr_id` = '".$rows2['proc_id']."'");
                                            $rows3=mysqli_fetch_assoc($table3);
                                            if ($rows3)
                                                echo $rows3['co_data'].'<br>'.$rows3['co_time'];
                                            else
                                                echo 'مطلبی درج نشده است';
                                        ?>
					                	</div>
				                	</td>
					                <td>
					                <?php
                                    $table4 = mysqli_query($mysqlicheck,"SELECT `user`.`user_name`, `user`.`user_family`, `user`.`user_id`  FROM `user` INNER JOIN `refer` on `user`.`user_id` = `refer`.`re_ur_id` WHERE `refer`.`re_pr_id` = '".$rows2['proc_id']."'");
					                while($rows4=mysqli_fetch_assoc($table4))
                                    {
                                        if($rows2['pr_ur_id'] != $rows4['user_id'])
                                        echo '<a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="" data-popup="tooltip" title="'.$rows4['user_name'].' '.$rows4['user_family'].'"></a>';
                                    }?>
					                </td>
									<td class="text-center">
									    <a href="proce.php?pr_id=<?php echo $rows2['proc_id']; ?>" class="btn border-slate text-slate-800 btn-flat">جزئیات</a>
									</td>
					            </tr>
                <?php }}?>
							</tbody>
						</table>
					</div>
					<!-- /task manager table -->



				</div>
				<!-- /content area -->
    </div>
  </div>
</div>
</body>
</html>