<?php
namespace frontend\models;

use common\models\Profile;
use common\models\User;
use yii\base\Model;

/**
 * Profile form
 */
class ProfileForm extends Model
{
    public $id;
    public $user_id;
    public $first_name;
    public $last_name;
    public $github_link;
    public $linkedin_link;
    public $resume_link;
    public $portfolio_link;
    public $phonenumber;
    public $note;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 1, 'max' => 255],
            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 1, 'max' => 255],
            ['phonenumber', 'string', 'max' => 14],
            ['github_link', 'string', 'max' => 255],
            ['resume_link', 'string', 'max' => 255],
            ['linkedin_link', 'string', 'max' => 255],
            ['portfolio_link', 'string', 'max' => 255],
            ['note', 'string'],
        ];
    }

    /**
     * Save profile.
     *
     * @return bool whether the update profile
     */
    public function save()
    {
        if (!$this->validate()) {
            return null;
        }
        $profile = new Profile();
        $profile->user_id = $this->user_id;
        $profile->first_name = $this->first_name;
        $profile->last_name = $this->last_name;
        $profile->github_link = $this->github_link;
        $profile->linkedin_link = $this->linkedin_link;
        $profile->resume_link = $this->resume_link;
        $profile->portfolio_link = $this->portfolio_link;
        $profile->phonenumber = $this->phonenumber;
        $profile->note = $this->note;
        return $profile->save();

    }

}
