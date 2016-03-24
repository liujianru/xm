<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
class LiuController extends Controller
{
    public function index(){
		return view("liu/index");
	}
	public function adds(){
		$user=$_POST['user'];
		$content=$_POST['content'];
		$time=date("Y-m-d H:i:s");
		//echo $time;die;
		$sql="insert into liuyan(liu_name,liu_content,liu_time) values('$user','$content','$time')";
		//echo $sql;die;
		$ifs=DB::insert($sql);
		if($ifs){
			echo "<script>alert('添加成功');location.href='/lists'</script>";
		}else{
			echo "<script>alert('添加失败');location.href='/lists'</script>";
		}		
		
	}
	public function lists(){
		/*$page=empty($_GET['page'])?1:$_GET['page'];
		$arr=DB::table("liuyan")->get();
		$rows=count($arr);
		$pagesize='4';
		$pages=round($rows/$pagesize);
		//echo $pages;die;
		$pagelimit=($page-1)*$pagesize;
		$sql="select * from liuyan limit $pagelimit,$pagesize";
		$arr=DB::select($sql);
		//print_r($arr);die;
		return view("liu/adds")->with("arr",$arr)->with('page',$pages);*/
          $arr=DB::table("liuyan")->paginate(5);
          return view("liu/adds",['arr'=>$arr]);

	}
	public function del(){
		$id=$_GET['id'];
		$sql="delete from liuyan where liu_id='$id'";
		$dels=DB::delete($sql);
		echo "<script>alert('删除成功');location.href='/lists'</script>";
	}
	public function up(){
		$id=$_GET['id'];
		$sql="select * from liuyan where liu_id='$id'";
		$arr=DB::select($sql);
		return view("liu/up")->with("arr",$arr);
	}
	public function doup(){
		$id=$_POST['id'];
		$user=$_POST['user'];
		$content=$_POST['content'];
		$sql="update liuyan set liu_name='$user',liu_content='$content' where liu_id='$id'";
		//echo $sql;die;
		$arr=DB::update($sql);
		echo "<script>alert('修改成功');location.href='/lists'</script>";
	}
}