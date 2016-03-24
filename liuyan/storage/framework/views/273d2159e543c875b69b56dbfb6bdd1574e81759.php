<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>留言</title>
 </head>
 <body>
	<h2>留言修改</h2>
	<form action="/doup" method="post">
	<input type="hidden" name="id" value="<?php echo $arr[0]['liu_id'];?>">
	留言人:<input type="text" name="user" value="<?php echo $arr[0]['liu_name'];?>"><br/>		
		<textarea rows="5" cols="60" name="content" value="<?php echo $arr[0]['liu_content'];?>"></textarea><br/>
		<input type="submit" value="修改" id="sub">
	</form>
	<span id="lists"></span>
 </body>
</html>