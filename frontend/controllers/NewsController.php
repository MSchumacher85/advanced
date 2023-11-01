<?php

namespace frontend\controllers;

use frontend\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $title = \Yii::t('frontend', 'News');

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

        if($model === null){
            throw new NotFoundHttpException(\Yii::t('frontend', 'Page not found'));
        }

        return $this->render('view', compact('id', 'model'));
    }
}