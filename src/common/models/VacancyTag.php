<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * ProfileVacancy model
 *
 * @property integer $id
 * @property string $tag_id
 * @property string $vacancy_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class VacancyTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vacancy_tag}}';
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
