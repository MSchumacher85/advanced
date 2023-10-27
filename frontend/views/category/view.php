<?php

use yii\widgets\ListView;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider;
 */

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '//news/_news_items',
]);
