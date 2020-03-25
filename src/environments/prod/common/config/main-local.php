<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db.feba.dev;dbname=feba_jobs',
            'username' => 'feba_jobs',
            'password' => 'vM4z6oMmfyE6ZiULN0jj6L3G$',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
