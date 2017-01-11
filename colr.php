
<div class="sidebar sidebar-main sidebar-fixed">
  <div class="sidebar-content">
    <div class="sidebar-user">
      <div class="category-content">
        <div class="media"> <a href="#" class="media-left"><img src="assets/images/image.png" class="img-circle img-sm" alt=""></a>
          <div class="media-body"> <span class="media-heading text-semibold"><?php echo
            $_SESSION['user_name'].' '.$_SESSION['user_family']; ?></span>
            <div class="text-size-mini text-muted"> <i class="icon-pin text-size-small"></i> &nbsp;مکان شما </div>
          </div>
          <div class="media-right media-middle">
            <ul class="icons-list">
              <li> <a href="#"><i class="icon-cog3"></i></a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
          <li class="navigation-header"><span>پروفایل</span> <i class="icon-menu" title="Main pages"></i></li>
          <li><a href="index.php"><i class="icon-home4"></i> <span>خانه</span></a></li>
          <li> <a href="#"><i class="icon-stack"></i> <span>پروسه های کاری</span></a>
            <ul>
              <li><a href="proce_cr.php">ایجاد پروسه جدید</a></li>
              <li><a href="proce_on.php">پروسه های در حال اجرا</a></li>
              <li><a href="proce_co.php">پروسه های اتمام یافته</a></li>
            </ul>
          </li>
          <?php if ($_SESSION["login"]=="admin"){?>
          <li> <a href="#"><i class="icon-indent-decrease2"></i> <span>تنظیمات</span></a>
            <ul>
              <li><a href="add_user.php">ایجاد کاربر</a></li>
              <li><a href="rece_pas.php">بازیابی رمز عبور</a></li>
            </ul>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </div>
</div>
