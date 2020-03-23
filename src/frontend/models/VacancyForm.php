<?php

namespace frontend\models;

use common\models\Vacancy;
use yii\base\Model;

/**
 * Vacancy form
 */
class VacancyForm extends Model
{
    public $id;
    public $title;
    public $description;
    public $requeriments;
    public $salary_range;
    public $status;
    public $created_at;
    public $updated_at;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['title', 'required'],
            ['title', 'string', 'min' => 1, 'max' => 255],
            ['description', 'string'],
            ['requeriments', 'string'],
            ['salary_range', 'double'],
        ];
    }

    /**
     * Save vacancy.
     *
     * @return bool whether the update vacancy
     */
    public function save()
    {
        if (!$this->validate()) {
            return null;
        }
        $vacancy = new Vacancy();
        $vacancy->title = $this->title;
        $vacancy->description = $this->description;
        $vacancy->requeriments = $this->requeriments;
        $vacancy->salary_range = $this->salary_range;
        return $vacancy->save();
    }
}
