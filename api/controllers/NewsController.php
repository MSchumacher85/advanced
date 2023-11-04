<?php

namespace api\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

class NewsController extends ActiveController
{
    public $modelClass = 'api\models\News';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;//Todo для получения данных в формате json
        return $behaviors;
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            /*'create' => [//Запретили создавать, обновлять и удалять
                'class' => 'yii\rest\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
            'update' => [
                'class' => 'yii\rest\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'delete' => [
                'class' => 'yii\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],*/
            'options' => [
                'class' => 'yii\rest\OptionsAction',
                'collectionOptions' => ['GET', 'HEAD', 'OPTIONS'],// показываем какие действия можно совершать для коллекции данных, пример http://advanced.api/news
                'resourceOptions' => ['GET', 'HEAD', 'OPTIONS']// показываем какие действия можно совершать для конкретных данных, пример http://advanced.api/news/17
            ],
        ];
    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
    }
}

