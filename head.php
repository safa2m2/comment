<?php

$date = jdate('Y/n/j');
$time = jdate('H:i:s');
?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header"> <a class="navbar-brand" href="index.php"><img src="assets/images/logo_light.png" alt=""></a>
    <ul class="nav navbar-nav pull-right visible-xs-block">
      <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
      <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
  </div>
  <div class="navbar-collapse collapse" id="navbar-mobile">
    <ul class="nav navbar-nav">
      <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
		<li class="dropdown dropdown-user"> <a class="dropdown-toggle" data-toggle="dropdown"> <img src="assets/images/image.png" alt=""> <span><?php echo $_SESSION['user_name'].' '.$_SESSION['user_family'] ?></span> <i class="caret"></i> </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#"><i class="icon-user-plus"></i> پروفایل</a></li>
          <?php
    
          $table_c2 = mysqli_query($mysqlicheck,'SELECT COUNT(`re_vi`) FROM `refer` WHERE `re_ur_id`= "'.$_SESSION['user_id'].'" and `re_vi`= 1 ');
            $rows_c2 = mysqli_fetch_assoc($table_c2);
            ?>
          <li><a href="proce_on.php"><span class="badge badge-warning pull-right"><?php echo $rows_c2['COUNT(`re_vi`)'] ; ?></span> <i class="icon-comment-discussion"></i> پیام ها</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="icon-cog5"></i> تنظیمات</a></li>
          <li><a href="#"><i class="icon-switch2"></i> خروج</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
