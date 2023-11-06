<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
            ],
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
            'cachePath' => '@frontend/runtime/cache'//Todo, если захотим очищать кеш через консоль, необходимо прописать 'cachePath'
        ],
        'cache_frontend' => [
            'class' => \yii\caching\FileCache::class,
            'cachePath' => '@frontend/runtime/cache'//Todo, если захотим очищать кеш через консоль, необходимо прописать 'cachePath'
        ],
        'cache_backend' => [
            'class' => \yii\caching\FileCache::class,
            'cachePath' => '@backend/runtime/cache'
        ],
    ],
    'modules' => [
        'gridview' => ['class' => 'kartik\grid\Module']
    ]
];
