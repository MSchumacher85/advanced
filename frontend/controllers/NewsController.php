<?php

namespace frontend\controllers;

use frontend\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $title = 'Страница с новостями';

        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->innerJoinWith('category'),//Todo innerJoinWith
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', compact('title', 'dataProvider'));
    }


    public function actionView()
    {

        $id = \Yii::$app->request->get('id');

        $model = News::findOne($id );

        return $this->render('view', compact('id', 'model'));
    }
}