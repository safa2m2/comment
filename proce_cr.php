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
      <?php
	if (isset($_POST['submit']) )
	{
		$refer = '';
        foreach ($_POST['refer'] as $s_Option)
        $refer .= $s_Option ;
        if(get_safe_post($mysqlicheck,"submit") == "save" && get_safe_post($mysqlicheck,"subject") != "" && $refer != "" && get_safe_post($mysqlicheck,"comme") != "" )
        {
            $subject = get_safe_post($mysqlicheck,"subject");
            $comme = get_safe_post($mysqlicheck,"comme");
                              
			$sql = 'INSERT INTO `process`(`subject`, `pr_ur_id`, `descr`, `pr_data`, `pr_time`) VALUES ("'.$subject.'","'.$_SESSION['user_id'].'","'.$comme.'","'.$date.'","'.$time.'")';
                         
            $result = $mysqlicheck->query($sql);
            if ($result)
            {
                 $result7 = mysqli_query($mysqlicheck,"SELECT MAX(proc_id) FROM process "); 
                 $max2=mysqli_fetch_row($result7);
                            
                 foreach ($_POST['refer'] as $s_Option)
                 {
					 $sql2 = 'INSERT INTO `refer`(`re_pr_id`, `re_ur_id`, `re_vi`) VALUES ("'.$max2[0].'","'.$s_Option.'",1)';
                     $result2 = $mysqlicheck->query($sql2);
                 }
             }
             if (!$result || !$result2)
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
					پروسه جدید با موفقیت ایجاد گردید .
                    </div>';
			}

		}
        else
        {
			echo'<div class="alert alert-danger alert-styled-left alert-bordered">
                <button data-dismiss="alert" class="close" type="button">
				<span>×</span><span class="sr-only">Close</span></button>
				تمامی فیلدها باید پر باشد
                </div>';
		}
    }
?>
      <div class="content">
        <form method="post" class="form-horizontal">
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">ایجاد پروسه</h5>
              <div class="heading-elements">
                <ul class="icons-list">
				</ul>
              </div>
            </div>
            <hr>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-lg-2 control-label">موضوع :</label>
                    <div class="col-lg-10">
                      <input type="text" name="subject" class="form-control" placeholder="عنوان">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-lg-2 control-label">ارجاع به :</label>
                    <div class="col-lg-10">
                      <div class="form-group">
                        <select multiple="multiple"  name="refer[]" data-placeholder="انتخاب اشخاص..." class="select">
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
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-lg-2 control-label">توضیحات :</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" name="comme" class="form-control" placeholder="درج توضیحات شما .."></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-3" >
                  <div class="form-group">
                    <label class="col-lg-4 control-label">تاریخ :</label>
                    <div class="col-lg-8">
                      <input type="text"  class="form-control" value="<?php echo $date;?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="col-md-3" >
                  <div class="form-group">
                    <label class="col-lg-4 control-label">ساعت :</label>
                    <div class="col-lg-8">
                      <input type="text"  class="form-control" disabled value="<?php echo $time;?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" name="submit" value="save" class="btn btn-primary">ایجاد و ذخیره <i class="icon-arrow-left13 position-right"></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>