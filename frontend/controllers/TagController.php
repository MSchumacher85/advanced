<?php

namespace frontend\controllers;

use frontend\models\Tag;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TagController extends Controller
{
    public function actionIndex(){

        $model = Tag::find();

        $this->view->title = \Yii::t('frontend','Tags');

        return $this->render('index', compact('model'));
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $model = Tag::findOne($id);

        if($model === null){
            throw new NotFoundHttpException(\Yii::t('frontend', 'Page not found'));
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getNews(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', compact('id', 'dataProvider'));
    }
}