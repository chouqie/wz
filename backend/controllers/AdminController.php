<?php
/**
 * 后台管理模块
 * Class AdminController
 * @package Admin\Controller
 * @auth ZhaoYiBo
 * @date 2017-7-5
 */
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use app\models\navigation;
class AdminController extends Controller
{

	public $layout = false;

	public $enableCsrfValidation = false;

	/*
	 *
	 *@后台管理首页
	 *No param
	 * 
	 */
	public function actionIndex()
	{
		
		return $this->render( "index" );

	}

	/*
	 *
	 *@导航首页
	 *No param
	 * 
	 */
	
	public function actionNavlist()
	{
		//csrftoken验证
		$csrfToken = \YII::$app->request->csrfToken;

		$navObj = new navigation();

		$arr = $navObj->find()->asArray()->all();

		return $this->render( 'navlist' , array(
			'arr'=>$arr,
			'csrfToken'=>$csrfToken
		)); 
		
	}

	/*
	 *
	 *@导航删除
	 *No param
	 * 
	 */
	
	public function actionNavdelete()
	{
		//get nav_id
		$nav_id = $_GET['id'];

		$navObj = new navigation();

		$r = $navObj->deleteAll( array( 'nav_id'=>$nav_id ) );

		if( $r )
		{

			echo "<script>alert('删除成功');location.href='?r=admin/navlist';</script>";

		}

		else
		{

			echo "<script>alert('删除失败');location.href='?r=admin/navlist';</script>";

		}

	}

	/*
	 *
	 *@导航添加
	 *No param
	 * 
	 */
	
	public function actionNavadd()
	{

		$navname = $_POST['navname'];

		$navObj = new navigation();

		$navObj->name = $navname;

		$r = $navObj->save();
		
		if( $r )
		{

			$data = array(
				'msg'=>'添加成功',
				'error'=>'0'
			);

		}

		else
		{

			$data = array(
				'msg'=>'添加失败',
				'error'=>'1'
			);

		}

		echo json_encode( $data );
		
	}

	/*
	 *
	 *@导航修改
	 *No param
	 * 
	 */
	
	public function actionNavupdate()
	{
		$name = $_POST['content'];

		$navObj = new navigation();

		$r = $navObj->find()->where( ['nav_id'=>$_POST['id'] ] ) ->one();

		$r->name = $name;

		$res = $r->save();

		if( $res )
		{

			$data = array(
				'msg'=>'修改成功',
				'state'=>'0'
			);

		}

		else
		{

			$data = array(
				'msg'=>'修改失败',
				'state'=>'1'
			);

		}

		echo json_encode( $data );

	}


}