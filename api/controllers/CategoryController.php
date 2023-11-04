<?php

namespace api\controllers;

use api\models\Category;
use yii\web\Response;
use yii\rest\ActiveController;



class CategoryController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;//Todo для получения данных в формате json
        return $behaviors;
    }

    public $modelClass = 'api\models\Category';
}