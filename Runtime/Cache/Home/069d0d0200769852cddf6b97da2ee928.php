<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

</head>
<body>
<form action="<?php echo U('Index/model');?>" method="post">
<input type="radio" name="Sex" value="男" checked>男
<input type="radio" name="Sex" value="女" >女<br/>
<input type="text" name="username">
<input value="submit" type="submit">
<br/>
<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["account"]); endforeach; endif; else: echo "" ;endif; ?>
</form>
</body>
</html>