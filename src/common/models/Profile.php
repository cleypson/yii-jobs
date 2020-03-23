<?php

namespace common\models;

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
            TimestampBehavior::className(),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

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