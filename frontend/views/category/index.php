<?php

use yii\widgets\ListView;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

if ($dataProvider->getCount() > 0) {
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_category_items',
        'options' => [
            'class' => 'list-group',
        ],
    ]);
}

