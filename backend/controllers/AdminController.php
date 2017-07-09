<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


class AdminController extends Controller
{
	public $layout = false;
	public $enableCsrfValidation = false;
	public function actionIndex(){
		return $this->render('index');
	}
}