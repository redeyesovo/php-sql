<?php
include_once("inc.php");
$sql="SELECT * FROM `department`";
$sql="select * FROM w_list where id=".$_GET['id'];
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0){
	die("地址错误！");
}
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="w_update.php">  
      <div class="form-group">
        <div class="label">
          <label>价值：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $row['name'] ?>" name="name" data-validate="required:请输入价值" />
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $row['content'] ?>" name="cha" data-validate="required:请输入内容" />
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>