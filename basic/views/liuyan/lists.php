<?php
use yii\widgets\LinkPager;
?>
<table>
<tr>
	<td>id</td>
	<td>留言人</td>
	<td>留言内容</td>
	<td>操作</td>
</tr>
<?php
foreach($models as $k=>$v){
	echo "<tr>";
	echo "<td>".$v['liu_id']."</td>";
	echo "<td>".$v['liu_name']."</td>";
	echo "<td>".$v['liu_content']."</td>";
	echo "<td><a href='index.php?r=liuyan/del&id=".$v['liu_id']."'>删除</a><a href='index.php?r=liuyan/up&id=".$v['liu_id']."'>修改</a></td>";
	echo "</tr>";
}
?>
</table>
<?php

echo LinkPager::widget([
	'pagination' => $pages,
]);
?>