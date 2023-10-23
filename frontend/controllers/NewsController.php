<?php

namespace frontend\controllers;

use frontend\models\News;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex(){

        return $this->render('index');
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $model = News::findOne($id);

        return $this->render('view', compact('id', 'model'));
    }
}