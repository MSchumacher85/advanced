<?php

use backend\models\Message;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\searches\MessageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Message'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'source.category',
            //'source.message',
            [
                'attribute' => 'message',
                'value' => 'source.message',
            ],
            'language',
            'translation:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Message $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'language' => $model->language]);
                },
                'template' => '{update}',
            ],
        ],
    ]); ?>


</div>
