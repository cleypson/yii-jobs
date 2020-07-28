<?php

namespace console\controllers;

use Exception;
use common\models\Profile;
use common\models\User;
use yii\console\Controller;

class GeneratorController extends Controller
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
        $delimitador = ',';
        $cerca = '"';
        $f = fopen('/home/cleypson/Desenvolvimento/Talent_Miner/PHP/feba-jobs/src/users.csv', 'r');
        if ($f) {
            // Ler cabecalho do arquivo
            $cabecalho = fgetcsv($f, 0, $delimitador, $cerca);

            // Enquanto nao terminar o arquivo
            while (!feof($f)) {

                // Ler uma linha do arquivo
                $linha = fgetcsv($f, 0, $delimitador, $cerca);
                if (!$linha) {
                    continue;
                }
                // Montar registro com valores indexados pelo cabecalho
                try {
                    $registro = array_combine($cabecalho, $linha);
                    $user = new User();
                    $profile = new Profile();
                    $user->username = $registro['USERNAME'];
                    $user->email = $registro['EMAIL'];
                    $user->setPassword('123qwe');
                    $user->generateAuthKey();
                    $user->generateEmailVerificationToken();
                    $user->save();
                    $profile->first_name = $registro['NOME'];
                    $profile->last_name = $registro['SOBRENOME'];
                    $profile->user_id = $user->id;
                    $profile->save();
                    echo $registro['NOME'] . PHP_EOL;
                } catch (Exception $e) {
                    echo '------------------------';
                    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
                    echo $registro['NOME'] . PHP_EOL;
                    echo '------------------------';
                }

            }
        }
    }
}
