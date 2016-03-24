<?php
   use yii\widget\LinkParger;

?>
<table>
<th>id</th><th>留言</th><th>操作</th>
<?php foreach($arr as $k=>$v){?>
<tr>
	<td><?php echo $v['l_id']?></td>
	<td><?php echo $v['l_desc']?></td>
	<td> 
	<a href="index.php?r=liu/delete&id=<?php echo $v['l_id'];?>">删除</a>
    <a href="index.php?r=liu/update&id=<?php echo $v['l_id'];?>">修改</a>
	</td>

</tr>
<?php }?>
</table>
<? echo  LinkPager::widget(
    array(
        'pagination' => $pages,
        //  'header' => '', //分页前显示的内容
        //  'maxButtonCount' => 10, //显示分页数量
        //   'htmlOptions' => array('class' => ''),
        'firstPageLabel' => '首页',
        'nextPageLabel' => '下一页',
        'prevPageLabel' => '上一页',
        'lastPageLabel' => '末页',
    )

);?>