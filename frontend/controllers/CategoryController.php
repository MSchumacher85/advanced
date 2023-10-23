<?php

namespace frontend\controllers;

use frontend\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex(){

        return $this->render('index');
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $model = Category::findOne($id);

        return $this->render('view', compact('id', 'model'));
    }
}