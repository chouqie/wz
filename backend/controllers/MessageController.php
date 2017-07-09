<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


class MessageController extends Controller
{
	public $layout = false;
	public $enableCsrfValidation = false;
	public function actionIndex(){
		$arr['synopsis']= Yii::$app->params['synopsis'];
		$arr['culture'] = Yii::$app->params['culture'];
		$arr['hexinjiazhiguan'] = Yii::$app->params['hexinjiazhiguan'];
		$arr['linian'] = Yii::$app->params['linian'];
		$arr['huming'] = Yii::$app->params['huming'];
		$arr['kaihuhang'] = Yii::$app->params['kaihuhang'];
		$arr['account'] = Yii::$app->params['account'];
		$arr['hanghao'] = Yii::$app->params['hanghao'];
		$arr['beizhu'] = Yii::$app->params['beizhu'];
		// print_r($arr);die;
		return $this->render('index',array('data' => $arr));
	}
	public function actionUpdates(){
		// echo 1;die;
		$arr['synopsis']= Yii::$app->params['synopsis'];
		$arr['culture'] = Yii::$app->params['culture'];
		$arr['hexinjiazhiguan'] = Yii::$app->params['hexinjiazhiguan'];
		$arr['linian'] = Yii::$app->params['linian'];
		$arr['huming'] = Yii::$app->params['huming'];
		$arr['kaihuhang'] = Yii::$app->params['kaihuhang'];
		$arr['account'] = Yii::$app->params['account'];
		$arr['hanghao'] = Yii::$app->params['hanghao'];
		$arr['beizhu'] = Yii::$app->params['beizhu'];
		// print_r($arr);die;
		return $this->render('updates',array('data' => $arr));
	}
	public function actionAdd()
	{
		// echo '<? php';die;
		$data = Yii::$app->request->post();
		$str='<?php return [';
		foreach($data as $k=>$v){
			$arr[]="'".$k."'"."=>"."'".$v."'";
		}
		$str.=implode(",",$arr)."];";
		file_put_contents("../config/params.php",$str);
		return $this->redirect('?r=message/index');
		// echo $str;die;
		// print_r($arr);die;
	}
}