<center>
<table border=1>
<tr>
	<td>id</td>
	<td>留言人</td>
	<td>留言内容</td>
	<td>操作</td>
</tr>
<?php
foreach($arr as $k=>$v){
?>
<tr>
<td><?php echo $v['liu_id'];?></td>
<td><?php echo $v['liu_name'];?></td>
<td><?php echo $v['liu_content'];?></td>
<td><a href="/del?id=<?php echo $v['liu_id'];?>">删除</a><a href="/up?id=<?php echo $v['liu_id'];?>">修改</a></td>
</tr>
<?php
}
for($i=1;$i<=$page;$i++){
	echo "<a href='/lists?page=$i'>".$i."</a>";
}

?>
</table>
</center>