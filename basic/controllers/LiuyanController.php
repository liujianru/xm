<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\liuyan;
use yii\data\Pagination;


class LiuyanController extends Controller
{
	public $enableCsrfValidation = false;
    public function actionIndex()
    {
		return $this->renderPartial("index");
    }
	public function actionAdds(){
		$request=Yii::$app->request;
		$user=$request->post("user",'');
		$content=$request->post("content",'');
		$time=date("Y-m-d H:i:s");
		$sql="insert into liuyan(liu_name,liu_content,liu_time) values('$user','$content','$time')";
		$adds=Yii::$app->db->createCommand($sql)->execute();
		if($adds){
			echo "<script>alert('添加成功');location.href='index.php?r=liuyan/lists'</script>";
		}else{
			echo "<script>alert('添加失败');location.href='index.php?r=liuyan/lists'</script>";
		}
	}public function actionLists(){
		$test=new Liuyan();	//实例化model模型
		$arr=$test->find();
		//$countQuery = clone $arr;
		$pages = new Pagination([
			//'totalCount' => $countQuery->count(),
			'totalCount' => $arr->count(),
			'pageSize'   => 5   //每页显示条数
		]);
		$models = $arr->offset($pages->offset)
			->limit($pages->limit)
			->all();
		return $this->render('lists', [
			'models' => $models,
			'pages'  => $pages
		]);

	}
	public function actionDel(){
		$request=Yii::$app->request;
		$id=$request->get("id",'');
		$sql="delete from liuyan where liu_id='$id'";
		//echo $sql;die;
		$aa=Yii::$app->db->createCommand($sql)->execute();
		if($aa){
			echo "<script>alert('删除成功');location.href='index.php?r=liuyan/lists'</script>";
		}else{
			echo "<script>alert('删除失败');location.href='index.php?r=liuyan/lists'</script>";
		}
	}
	public function actionUp(){
		$request=Yii::$app->request;
		$id=$request->get("id",'');
		$sql="select * from liuyan where liu_id='$id'";
		$all=Yii::$app->db->createCommand($sql)->queryOne();
		//print_r($all);die;
		return $this->render("up",['all'=>$all]);
	}
	public function actionDoup(){
		$request=Yii::$app->request;
		$id=$request->post("id",'');
		$user=$request->post("user",'');
		$content=$request->post("content",'');
		$sql="update liuyan set liu_name='$user',liu_content='$content' where liu_id='$id'";
		//echo $sql;die;
		$all=Yii::$app->db->createCommand($sql)->execute();
		if($all){
			echo "<script>alert('修改成功');location.href='index.php?r=liuyan/lists'</script>";
		}else{
			echo "<script>alert('修改失败');location.href='index.php?r=liuyan/lists'</script>";
		}
	}
}