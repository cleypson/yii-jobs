<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use cornernote\linkall\LinkAllBehavior;
use yii\db\ActiveRecord;

/**
 * Vacancy model
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $requeriments
 * @property float $salary_range
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Vacancy extends ActiveRecord
{
    public $tag_ids;
    
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vacancy}}';
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            LinkAllBehavior::className(),
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'tag_ids'] ,'required'],
            ['title', 'string', 'min' => 1, 'max' => 255],
            ['description', 'string'],
            ['requeriments', 'string'],
            ['salary_range', 'double'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
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
    public function afterSave($insert, $changedAttributes)
    {
        $tags = [];
        foreach ($this->tag_ids as $tag_description) {
            $tag = Tag::getTagByDescription($tag_description);
            if ($tag) {
                $tags[] = $tag;
            }
        }
        $this->linkAll('tags', $tags);
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('vacancy_tag', ['vacancy_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getApplications()
    {
        return $this->hasMany(Profile::className(), ['id' => 'profile_id'])
            ->viaTable('profile_vacancy', ['vacancy_id' => 'id']);
    }

    

}