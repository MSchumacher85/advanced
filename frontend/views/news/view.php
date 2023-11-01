<?php

use yii\helpers\Html;

/**
 * @var frontend\models\News $model
 */
?>

<?php
echo Html::a($model->category->title, \yii\helpers\Url::to(['category/view', 'id' => $model->category->id]), ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px']);
echo '<br/>';
foreach ($model->getTag()->each() as $item) {
    echo Html::a($item->title, \yii\helpers\Url::to(['tag/view', 'id' => $item->id]), ['class' => 'btn btn-success']);
}

?>

<h1><?= $model->title ?></h1>

<p><?= $model->description ?></p>

<?php $this->registerCss(".btn { margin-right: 5px }"); ?>

<?php
    echo Html::a( Yii::t('frontend', 'Go back'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']);
?>