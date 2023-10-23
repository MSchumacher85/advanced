<?php

namespace frontend\controllers;

use frontend\models\Tag;
use yii\web\Controller;

class TagController extends Controller
{
    public function actionIndex(){

        return $this->render('index');
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $model = Tag::findOne($id);

        return $this->render('view', compact('id', 'model'));
    }
}