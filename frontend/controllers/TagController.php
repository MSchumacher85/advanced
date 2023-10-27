<?php

namespace frontend\controllers;

use frontend\models\Tag;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TagController extends Controller
{
    public function actionIndex(){

        $model = Tag::find()->all();

        return $this->render('index', compact('model'));
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $model = Tag::findOne($id);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getNews(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', compact('id', 'dataProvider'));
    }
}