<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

</head>
<body>
index.html
<?=$name;?>
<br/>
<?=$sex;?>
<br/>
model:
<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["account"]); endforeach; endif; else: echo "" ;endif; ?><!--用于输出数据库内的字段
!-->
<br/>
load:
<?php echo $name;?>
<img alt="" src="<?php echo ($aa); ?>">
</body>
</html>