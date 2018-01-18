<?php
/**
 * Created by PhpStorm.
 * Author: 火柴<290559038@qq.com>
 * Date: 2017/12/3
 * Time: 14:11
 */

namespace frontend\controllers;


use common\models\CompanyExperience;
use common\models\EduExperience;
use common\models\Personnel;
use common\models\ProjectExperience;
use frontend\models\ResumeForm;
use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class HomeController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ]
                ]
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => []
            ]
        ]; // TODO: Change the autogenerated stub
    }


    public function actionIndex()
    {
        $data = [];

        $param = Yii::$app->request->post();
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model                         = new Personnel();
                $model->uid                    = Yii::$app->user->identity->getId();
                $model->username               = $param['username'];
                $model->nickname               = $param['nickname'];
                $model->email                  = $param['email'];
                $model->qq                     = $param['qq'];
                $model->mobile                 = $param['mobile'];
                $model->birthday               = strtotime($param['birthday']);
                $model->status                 = $param['status'];
                $model->self_evaluation        = $param['self_evaluation'];
                $model->expectation_job        = $param['expectation_job'];
                $model->expectation_salary_min = $param['expectation_salary_min'];
                $model->expectation_salary_max = $param['expectation_salary_max'];
                $model->expectation_industry   = $param['expectation_industry'];
                $model->expectation_city       = $param['expectation_city'];
                if (!$model->save()) {
                    throw new yii\db\Exception(implode(",", $model->getFirstErrors()), ['test' => 1], 204);
                }

                foreach ($param['edu'] as $key => $value) {
                    $edu                    = new EduExperience();
                    $edu->personnel_id      = $model->id;
                    $edu->school_name       = $value['school_name'];
                    $edu->professional_name = $value['professional_name'];
                    $edu->education         = $value['education'];
                    $edu->start_date        = time();
                    $edu->end_date          = time();
                    $edu->school_experience = $value['school_experience'];
                    $edu->created_at        = time();
                    $edu->updated_at        = time();
                    if (!$edu->save()) {
                        throw new yii\db\Exception("保存教育经历失败");
                    }
                    unset($edu);
                }

                foreach ($param['company'] as $key => $value) {
                    $companyExp               = new CompanyExperience();
                    $companyExp->personnel_id = $model->id;
                    $companyExp->company_name = $value['company_name'];
                    $companyExp->job_type     = $value['job_type'];
                    $companyExp->job_title    = $value['job_title'];
                    $companyExp->industry_id  = $value['industry_id'];
                    $companyExp->department   = $value['department'];
                    $companyExp->job_content  = $value['job_content'];
                    $companyExp->start_date   = time();
                    $companyExp->end_date     = time();
                    $companyExp->created_at   = time();
                    $companyExp->updated_at   = time();
                    if (!$companyExp->save()) {
                        throw new yii\db\Exception(implode("+", $companyExp->getFirstErrors()));
                    }
                    unset($companyExp);
                }

                foreach ($param['project'] as $key => $value) {
                    $projectExp                      = new ProjectExperience();
                    $projectExp->personnel_id        = $model->id;
                    $projectExp->project_name        = $value['project_name'];
                    $projectExp->project_role        = $value['project_role'];
                    $projectExp->project_description = $value['project_description'];
                    $projectExp->start_date          = time();
                    $projectExp->end_date            = time();
                    $projectExp->created_at          = time();
                    $projectExp->updated_at          = time();
                    if (!$projectExp->save()) {
                        throw new yii\db\Exception(implode("|", $projectExp->getFirstErrors()));
                    }
                    unset($projectExp);
                }

                $transaction->commit();

                dump("成功1");

            } catch (yii\db\Exception $e) {
                $transaction->rollBack();

                dump(['status' => false, 'msg' => $e->getMessage()]);
            }

        }

        return $this->render('index', $data);
    }


    public function actionPreview()
    {
        $data                 = [];
        $id                   = Yii::$app->user->getId();

        $baseinfo             = Personnel::findOne($id);
        $data['baseinfo']     = $baseinfo;
        $data['edu_expr']     = EduExperience::find()->where(['personnel_id'=>$baseinfo->id])->one();
        $data['company_expr'] = CompanyExperience::find()->where(['personnel_id'=>$baseinfo->id])->one();
        $data['project_expr'] = ProjectExperience::find()->where(['personnel_id'=>$baseinfo->id])->one();

        return $this->render('preview', $data);
//        return $this->renderPartial('p_test', $data);
    }


}