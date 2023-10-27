<?php
/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

use yii\widgets\ListView;


if ($dataProvider->getCount() > 0) {
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '//news/_news_items',
    ]);
}




