<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Vacancy model
 *
 * @property integer $id
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class Tag extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag}}';
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['description', 'string', 'min' => 1, 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public static function getTagByDescription($description)
    {
        $tag = Tag::find()->where(['description' => $description])->one();
        if (!$tag) {
            $tag = new Tag();
            $tag->description = $description;
            $tag->save(false);
        }
        return $tag;
    }
}
