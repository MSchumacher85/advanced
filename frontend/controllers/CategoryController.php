<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index'],
                'cacheControlHeader' => 'public, max-age=60',//изменили максимальное время кеширования для index с 3600 секунд на 60
                'lastModified' => function ($action, $params) {
                    $q = new \yii\db\Query();
                    return 2222225; //При изменении происходит обновление кеша, чисто теоритический пример. Более практический в документации
                },
            ],
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['view'],
                'etagSeed' => function ($action, $params) {
                    $category = Category::findOne(\Yii::$app->request->get('id'));
                    return serialize([$category->title, $category->slug]);
                },
            ],
        ];
    }
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