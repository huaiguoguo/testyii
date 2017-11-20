<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Personnel]].
 *
 * @see Personnel
 */
class RegionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Personnel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Personnel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
