<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => ''
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                //news
                'news' => 'news/index',
                'news/<id:\d+>' => 'news/view',

                //category
                'category' => 'category/index',
                '/category/<id:\d+>' => 'category/view',

                //tag
                'tag' => 'tag/index',
                'tag/<id:\d+>' => 'tag/view',
            ],
        ],
        'i18n' => [
            'translations' => [
                'frontend' => [//Todo Указывается первым параметром Yii::t()
                    /*'class' => 'yii\i18n\PhpMessageSource',//Используем файлы
                    'basePath' => '@frontend/messages/',
                    'fileMap' => [
                        'frontend' => 'frontend.php',
                        'app/error' => 'error.php',
                    ],*/
                    'class' => 'yii\i18n\DbMessageSource',//Используем БД
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages/',
                    'fileMap' => [
                        'yii' => 'yii.php',
                    ],
                ],
            ],
        ],

    ],
    'params' => $params,
];
