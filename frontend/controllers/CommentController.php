<?php

namespace frontend\controllers;

use frontend\models\Comment;
use frontend\models\News;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {

        $id = \Yii::$app->request->get('id');

        $parent = \Yii::$app->request->get('parent');

        $model = new Comment();

        if ($model->load(\Yii::$app->request->post())) {
            $model->news_id = $id;

            !$parent ? $model->parent_id = 0 : $model->parent_id = $parent;

            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'Коментарий добавлен');
            } else {
                \Yii::$app->session->setFlash('success', 'Коментарий добавлен');
            }
        }
        return $this->redirect('../news/index');
    }
}