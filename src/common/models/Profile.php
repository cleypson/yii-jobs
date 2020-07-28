<?php

namespace common\models;

use cornernote\linkall\LinkAllBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * Profile model
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name 
 * @property string $last_name
 * @property string $github_link
 * @property string $linkedin_link
 * @property string $resume_link
 * @property string $portfolio_link
 * @property string $phonenumber
 * @property string $note
 * @property integer $created_at
 * @property integer $updated_at
 */


class Profile extends ActiveRecord
{
    public $username;
    public $email;
    public $password;
    public $tag_ids;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profile}}';
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
            [['first_name', 'last_name', 'tag_ids'], 'required'],
            ['first_name', 'string', 'min' => 1, 'max' => 255],
            ['last_name', 'string', 'min' => 1, 'max' => 255],
            ['phonenumber', 'string', 'max' => 16],
            ['github_link', 'string', 'max' => 255],
            ['resume_link', 'string', 'max' => 255],
            ['linkedin_link', 'string', 'max' => 255],
            ['portfolio_link', 'string', 'max' => 255],
            ['note', 'string'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullName()
    {
        return $this->first_name .' '. $this->last_name;
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
            ->viaTable('profile_tag', ['profile_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::classname(), ['id' => 'vacancy_id'])
            ->viaTable('profile_vacancy', ['vacancy_id', 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Finds profile by user_id
     *
     * @param string $user_id
     * @return static|null
     */
    public static function findByUserID($user_id)
    {
        return static::findOne(['user_id' => $user_id]);
    }
}
