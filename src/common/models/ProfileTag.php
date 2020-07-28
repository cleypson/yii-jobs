<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * ProfileTag model
 *
 * @property integer $id
 * @property string $tag_id
 * @property string $profile_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProfileTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profile_tag}}';
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
