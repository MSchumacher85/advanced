<?php

use yii\widgets\ListView;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var frontend\controllers\NewsController $title */

Yii::$app->view->title = $title;

echo '<h1>'.\yii\helpers\Html::encode($title).'</h1>';

if($dataProvider->getCount() > 0){
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_news_items',
        'options' => ['class = list-group']
    ]);
}


