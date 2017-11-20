<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%personnel}}".
 *
 * @property integer $id
 * @property string $nickname
 * @property string $username
 * @property integer $mobile
 * @property integer $qq
 * @property string $email
 * @property integer $status
 * @property integer $func_id
 * @property integer $gender
 * @property integer $location_province
 * @property integer $location_ctiy
 * @property string $annual_salary
 * @property integer $expectation_province
 * @property integer $expectation_city
 * @property integer $expectation_industry
 * @property integer $expectation_func
 * @property string $expectation_annual_salary
 * @property integer $marry
 * @property integer $work_life
 * @property integer $birthday
 * @property string $skill
 * @property string $skill_evaluation
 * @property string $self_evaluation
 * @property integer $type
 * @property integer $resume_id
 * @property string $photos
 * @property string $website
 * @property string $remarks
 *
 * @property Func $func
 */
class Personnel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%personnel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'mobile', 'qq', 'email', 'status', 'func_id', 'gender', 'location_province', 'location_ctiy', 'annual_salary', 'expectation_city', 'expectation_industry', 'expectation_func', 'expectation_annual_salary', 'work_life'], 'required'],
            [['mobile', 'qq', 'status', 'func_id', 'gender', 'location_province', 'location_ctiy', 'expectation_province', 'expectation_city', 'expectation_industry', 'expectation_func', 'marry', 'work_life', 'birthday', 'type', 'resume_id'], 'integer'],
            [['annual_salary', 'expectation_annual_salary'], 'number'],
            [['skill_evaluation', 'self_evaluation'], 'string'],
            [['nickname', 'username'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 40],
            [['skill', 'photos', 'website', 'remarks'], 'string', 'max' => 255],
            [['func_id'], 'exist', 'skipOnError' => true, 'targetClass' => Func::className(), 'targetAttribute' => ['func_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nickname' => Yii::t('app', 'Nickname'),
            'username' => Yii::t('app', '姓名'),
            'mobile' => Yii::t('app', 'Mobile'),
            'qq' => Yii::t('app', 'Qq'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', '状态'),
            'func_id' => Yii::t('app', '现在职能'),
            'gender' => Yii::t('app', '姓别'),
            'location_province' => Yii::t('app', '现在所以省份 id'),
            'location_ctiy' => Yii::t('app', '现在所在城市 id'),
            'annual_salary' => Yii::t('app', '现在年收入'),
            'expectation_province' => Yii::t('app', 'Expectation Province'),
            'expectation_city' => Yii::t('app', '期望城市 id'),
            'expectation_industry' => Yii::t('app', '期望行业 id'),
            'expectation_func' => Yii::t('app', '期望职能 id'),
            'expectation_annual_salary' => Yii::t('app', '期望年收入'),
            'marry' => Yii::t('app', '是否结婚 '),
            'work_life' => Yii::t('app', '工作年限'),
            'birthday' => Yii::t('app', '生日'),
            'skill' => Yii::t('app', '技能标签'),
            'skill_evaluation' => Yii::t('app', '技能评价'),
            'self_evaluation' => Yii::t('app', '自我评价'),
            'type' => Yii::t('app', '人才类型'),
            'resume_id' => Yii::t('app', '附件简历id'),
            'photos' => Yii::t('app', '用户图像'),
            'website' => Yii::t('app', '主页'),
            'remarks' => Yii::t('app', '备注'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunc()
    {
        return $this->hasOne(Func::className(), ['id' => 'func_id']);
    }

    /**
     * @inheritdoc
     * @return RegionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegionQuery(get_called_class());
    }
}
