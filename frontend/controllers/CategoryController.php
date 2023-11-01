<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function actionIndex(){

        $this->view->title = \Yii::t('frontend', 'Categories');

        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->innerJoinWith('news'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', compact('dataProvider'));
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $model = Category::findOne($id);

        if($model === null){
            throw new NotFoundHttpException(\Yii::t('yii', 'Page not found.'));
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getNews(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', compact('dataProvider'));
    }
}