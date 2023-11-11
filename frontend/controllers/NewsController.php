<?php

namespace frontend\controllers;

use frontend\models\Comment;
use frontend\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{

    public function behaviors()
    {
        return [//Кеширование на стороне сервера
           /* [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 60,
                'variations' => [
                    \Yii::$app->request->get('page'),
                    \Yii::$app->request->get('pare-page'),
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(*) FROM'.News::tableName(),
                ],
            ],*/
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['view'],
                'duration' => 60,
                'variations' => [
                    \Yii::$app->request->get('id'),//варьируется в зависимости от текущего id
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => News::find()->select('slug')->where(['id' => \Yii::$app->request->get('id')])->createCommand()->getRawSql(),
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $title = \Yii::t('frontend', 'News');

        /*$dataProvider = new ActiveDataProvider([
            'query' => News::find()->innerJoinWith('category'),//Todo innerJoinWith
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);*/

        $model = News::find()->innerJoinWith('category')->all();

        $modelForm = new Comment();

        return $this->render('index', compact('title', 'model', 'modelForm'));
    }


    public function actionView()
    {

        $id = \Yii::$app->request->get('id');

        $model = News::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException(\Yii::t('frontend', 'Page not found'));
        }

        return $this->render('view', compact('id', 'model'));
    }

    public function actionCatch()
    {
        $dependency = new \yii\caching\FileDependency(['fileName' => '@frontend/views/site/index.php']);//Как только файл будет меняться уеш будет обновляться

        $catch = \Yii::$app->cache_frontend;//название задал в common/config/main.php

        $data = $catch->get('test_1');

        if ($data === false) {
            $data = [1,2,3];
            $catch->set('test_1', $data, 200, $dependency);
            var_dump($data);
        }
        var_dump($data);
    }
}