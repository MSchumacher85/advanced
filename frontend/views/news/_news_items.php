<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/**
 * @var frontend\models\News $model
 */


$description = \yii\helpers\StringHelper::truncateWords(strip_tags($model->description), 300);
?>
<div class="post">

    <?= Html::a(
        '<h2>' . Html::encode($model->title) . '</h2>' . HtmlPurifier::process($description), ['news/view', 'id' => $model->id], ['class' => 'list-group-item']
    ) ?>

</div>

<?php
$this->registerCss(".post { border: 1px solid black; border-radius: 10px; margin-top: 5px; padding: 10px }");
?>

