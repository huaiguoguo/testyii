<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14
 * Time: 10:30
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

}