<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/**
 * @var frontend\models\Category $model
 */

?>
<div class="list-group-item list-group-item-action">
    <?= Html::tag('h2',
        Html::tag('a', HtmlPurifier::process($model->title)
            . Html::tag('span', Yii::t('frontend',"Number of news: {count}", ['count' => $model->getNews()->count()])),
            ['href' => \yii\helpers\Url::to(['category/view', 'id' => $model->id]), 'class' => 'btn', 'style' => 'display: flex; justify-content: space-between']));
    ?>
</div>
