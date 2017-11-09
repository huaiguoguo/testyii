<?php
/**
 * Created by PhpStorm.
 * Author: 火柴<290559038@qq.com>
 * Date: 2017/11/5
 * Time: 17:10
 */

namespace backend\controllers;


use yii\web\Controller;

class CompanyController extends Controller
{

    public function actionIndex()
    {
    }

    public function actionList()
    {
        $data = [];
        return $this->render('list', $data);
    }

    public function actionAdd()
    {
    }

    public function actionEdit()
    {
    }

    public function actionDelete()
    {
    }
}