<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/**
 * @var frontend\models\News $model
 * @var frontend\models\News $modelForm
 */


$description = \yii\helpers\StringHelper::truncateWords(strip_tags($model->description), 300);
?>
<div class="post">

    <?= Html::a(
        '<h2>' . Html::encode($model->title) . '</h2>' . HtmlPurifier::process($description), ['news/view', 'id' => $model->id], ['class' => 'list-group-item']
    ) ?>
    <?= Html::tag('button',
        Yii::t('frontend', 'comments:') . ':  ' . $model->getComment()->count(), ['class' => 'btn btn-primary',
            'data-bs-toggle' => 'collapse',
            'data-bs-target' => "#{$model->slug}",
            'aria-expanded' => true,
            'aria-controls' => $model->slug,
        ]);
    ?>
    <?= Html::tag('button',
        Yii::t('frontend', 'leave a comment'), ['class' => 'btn btn-secondary',
            'data-bs-toggle' => 'collapse',
            'data-bs-target' => "#form-comment",
            'aria-expanded' => true,
            'aria-controls' => 'form-comment',
            ]);
    ?>
    <div class="accordion" id="accordionExample111">
        <div class="accordion-item">
            <div id="<?= $model->slug ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <?php foreach ($model->comment as $item): ?>
                            <li class="list-group-item list-group-item-primary">
                                <p><?= $item->description ?></p>
                                <p><span>Дата: </span><?= $item->created_at ?>
                                    <span>Прокоментировал: </span><?= \yii\helpers\ArrayHelper::getValue(\common\models\User::findOne(['id' => $item->user_id]), 'username') ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionExample222">
        <div class="accordion-item">
            <div id="form-comment" class="accordion-collapse collapse" aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($modelForm, 'description') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerCss(".post { border: 1px solid black; border-radius: 10px; margin-top: 5px; padding: 10px }");
?>

