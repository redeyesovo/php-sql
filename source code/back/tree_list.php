<?php 
include_once("inc.php");

$page=(int)$_GET['page'];//当前的页码

$sql="SELECT count(*) FROM `tree_list`";
$result_total=mysqli_query($conn,$sql);
$result_total_row=mysqli_fetch_array($result_total,MYSQLI_ASSOC);
$num_rows_total=(int)$result_total_row['count(*)'];//共有几条记录
$num_rows_page=6;//每页几条记录
$num_pages=intval(($num_rows_total-1)/$num_rows_page)+1;
$pref=$page-1==0?1:$page-1;//上一页的页码
$next=$page+1>$num_pages?$num_pages:$page+1;//下一页的页码
$last=$num_pages;//最后一页的页码

$start=($page-1)*$num_rows_page;

$sql="SELECT * FROM `tree_list` LIMIT ".$start.",".$num_rows_page;
$result=mysqli_query($conn,$sql);
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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 部门列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>树木名称</th>
        <th>树木特征</th>
        <th>树木价值</th>
        <th>图片</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
     <?php

  if($num=mysqli_num_rows($result))
  {
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
  ?>
  <tr>
    <td align="center"><?php echo $row['id'] ?></td>
    <td align="center"><?php echo $row['name'] ?></td>
    <td align="center"><?php echo $row['cha'] ?></td>
    <td align="center"><?php echo $row['worth'] ?></td>
    <td><img src="<?php echo $row['img']==''?'images/none.jpg':$row['img']; ?>" height="30" width="40"></td>
    <td align="center"><?php echo date("Y-m-d", $row['insert_time']) ?></td>
    <td align="center"><a href="tree_edit.php?id=<?php echo $row['id'] ?>">修改</a>|<a href="tree_delete.php?id=<?php echo $row['id'] ?>">删除</a></td>
  </tr>
  <?php
    }
  }
  ?>
      <tr>
        <td colspan="8">
        <div class="pagelist">
        <a href="tree_list.php?page=<?=$pref?>">上一页</a>
        <?php
        for($i=1;$i<=$num_pages;$i++) {
        	if($page==$i)
        		echo '<span class="current">'.$i.'</span>';
        	else
        		echo '<a href="tree_list.php?page='.$i.'">'.$i.'</a>';	
        }
        ?>
        <a href="tree_list.php?page=<?=$next?>">下一页</a>
        <a href="tree_list.php?page=<?=$last?>">尾页</a>
        </div>
        </td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>