<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>留言修改</title>
 </head>
 <body>
	<h2>留言修改</h2>
	<form action="index.php?r=liuyan/doup" method="post">
	<input type="hidden" name="id" value="<?php echo $all['liu_id'];?>">
	留言人:<input type="text" name="user" value="<?php echo $all['liu_name'];?>"><br/>
		
		<textarea rows="5" cols="60" name="content" ><?php echo $all['liu_content'];?></textarea><br/>
		<input type="submit" value="提交" id="sub">
	</form>
	<span id="lists"></span>
 </body>
</html>