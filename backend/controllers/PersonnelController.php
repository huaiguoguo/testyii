<?php
/**
 * Created by PhpStorm.
 * Author: 火柴<290559038@qq.com>
 * Date: 2017/11/5
 * Time: 17:20
 */

namespace backend\controllers;

use common\models\Personnel;
use yii;
use backend\component\EController;

/**
 * @author: 火柴<290559038@qq.com>
 * @descri: 人才管理控制器
 * Class PersonnelController
 * @package backend\controllers
 */
class PersonnelController extends EController
{

    public function actionIndex()
    {
        $data = [];

        return $this->render('index', $data);
    }


    public function actionList()
    {
        $data         = [];
        $list         = Personnel::find()->all();
        $data['list'] = $list;

        return $this->render('list', $data);
    }

    public function actionAdd()
    {
        $data = [];
        if (Yii::$app->request->isAjax) {

        }

        return $this->render('add', $data);
    }


    public function actionHaha()
    {

        return $this->render('haha');

    }


    public function actionEdit()
    {
        $data = [];
        if (Yii::$app->request->isAjax) {

        }

        return $this->render('edit', $data);
    }

    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {

        }
    }

}