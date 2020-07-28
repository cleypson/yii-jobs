<?php

namespace console\controllers;

use Exception;
use common\models\Profile;
use common\models\ProfileTag;
use common\models\Tag;
use common\models\User;
use common\models\Vacancy;
use common\models\VacancyTag;
use yii\console\Controller;

class TagGeneratorController extends Controller
{
    public $message;

    public function options($actionID)
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return ['m' => 'message'];
    }

    public function actionIndex()
    {
        $vacancies = Vacancy::find()->all();
        $profiles = Profile::find()->all();
        $tags = Tag::find()->all();
        $tcount = Tag::find()->count();
        echo '------------------------------------------------' . "\n";
        echo 'Generating vacancy tags' . "\n";
        foreach ($vacancies as $vacancy) {
            echo '------------------------'."\n";
            echo $vacancy->title . "\n";
            echo '------------' . "\n";
            foreach (range(1, rand(3, 15)) as $qtde){
                $tagid = rand(1, $tcount);
                $vtag = new VacancyTag();
                $tag = Tag::findOne($tagid);
                echo $tag->description . ": ".$qtde ."\n";
                $vtag->vacancy_id = $vacancy->id;
                $vtag->tag_id = $tag->id;
                $vtag->save();
            }         
        }
        echo '------------------------------------------------' . "\n";
        echo 'Generating profile tags' . "\n";
        foreach ($profiles as $profile) {
            echo '------------------------' . "\n";
            echo $profile->first_name . "\n";
            echo '------------' . "\n";
            foreach (range(1, rand(3, 15)) as $qtde) {
                $tagid = rand(1, $tcount);
                $ptag = new ProfileTag();
                $tag = Tag::findOne($tagid);
                echo $tag->description . ": " . $qtde . "\n";
                $ptag->profile_id = $profile->id;
                $ptag->tag_id = $tag->id;
                $ptag->save();
            }
        }
    }
}
