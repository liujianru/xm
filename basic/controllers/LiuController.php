<?php
namespace app\controllers;

use Yii;
use app\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Liuyan;
use yii\data\Pagination;

class LiuController extends Controller{
    public $enableCsrfValidation = false;
     public function actionIndex(){
         // $this->layout=false;
       return $this->render('index');
       }
        public function actionAdd(){
            //$this->layout=false;
          // print_r($_POST);die;
           $model=new liuyan();
           $arr=$model::find()->all();
             //print_r($arr);die;
              $request=Yii::$app->request->post('desc','');
              $model->l_desc='$request';
              $re=$model->save();
                if($re){
                echo "<script>alert('添加成功');location.href='index.php?r=liu/list'</script>";
                }else{
                	 echo "<script>alert('添加失败');location.href='index.php?r=liu/list'</script>";
                }

          }
              public function actionList(){
                   $model=new Liuyan();
                 $arr=$model::find()->all();
                  //print_r($arr);die;
			         $query = Article::find()->where(['status' => 1]);
			    $countQuery = clone $query;
			    $pages = new Pagination(['totalCount' => $countQuery->count()]);
			    $models = $query->offset($pages->offset)
			        ->limit($pages->limit)
			        ->all();

			    return $this->render('index', [
			         'models' => $models,
			         'pages' => $pages,
			    ]);







                 return $this->render('list',['arr'=>$arr]);
               }
              public function actionDel(){
              	     //$this->layout=false;
					$request=Yii::$app->request;
					$id=$request->get("id",'');
					$sql="delete from liuyan where l_id='$id'";
					//echo $sql;die;
					$aa=Yii::$app->db->createCommand($sql)->execute();
					if($aa){
						echo "<script>alert('删除成功');location.href='index.php?r=liu/list'</script>";
					}else{
						echo "<script>alert('删除失败');location.href='index.php?r=liu/list'</script>";
					}
				} 
				  
	 }     
	
?>