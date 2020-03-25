<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * ProfileVacancy model
 *
 * @property integer $id
 * @property string $profile_id
 * @property string $vacancy_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProfileVacancy extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profile_vacancy}}';
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
