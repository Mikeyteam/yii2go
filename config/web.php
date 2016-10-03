<?php

$params = require(__DIR__ . '/params.php');


$config = [
    'id' => 'basic',
    'name' => 'Homework',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'baseUrl' => '',
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'xxxxxxx',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'post' => 'post/index',
                'users' => 'user/users',
                'ajax' => 'ajax/index',
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => '',
                    'route' => 'site/index',
                ],
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => '<action>',
                    'route' => 'site/<action>',
                ],
                [
                    'class' => 'yii\web\urlRule',
                    'pattern' => 'post/<action:update|delete>/<id:\d>',
                    'route' => 'post/<action>',
                    //'suffix' => '.html',

                ],
                [
                    'class' => 'yii\web\urlRule',
                    'pattern' => 'post/<id:\d>',
                    'route' => 'post/view',
                    //'suffix' => '.html',

                ],


             /*   'post/<id:\d+>' => 'post/view'*/

            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
