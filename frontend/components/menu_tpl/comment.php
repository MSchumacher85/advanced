<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

?>
<li class="list-group-item list-group-item-primary ">
    <p <?php if (isset($comment['children'])) ?>><?= $comment['description'] ?></p>
    <p style="color: #9e9e9e">
        <span>Дата: </span><?= \Yii::$app->formatter->asDatetime($comment['created_at'], "php:d-m-Y  H:i:s"); ?>
        <span>Прокоментировал: </span><?= \yii\helpers\ArrayHelper::getValue(\common\models\User::findOne(['id' => $comment['user_id']]), 'username') ?>
        <?php if (isset($comment['children'])): ?>
    <ul>
        <?= $this->getMenuHtml($comment['children']); ?>
        <?php $this->getLastParentId($comment); ?>
    </ul>
    <?php else: ?>
        <?php $this->lastParentId = $comment['id'] ?>
    <?php endif; ?>
    </p>

    <?php if ($comment['parent_id'] == 0): ?>
        <?= Html::tag('button',
            Yii::t('frontend', 'Ответить'), ['class' => 'btn btn-add-comment',
                'style' => 'background: #b5cff7',
                'data-bs-toggle' => 'collapse',
                'data-bs-target' => "#test111{$comment['id']}",
                'aria-expanded' => true,
                'aria-controls' => 'form-response',
                'data-guest' => Yii::$app->user->isGuest == true ? 'true' : 'false',
            ]);
        ?>
    <?php endif; ?>

    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="accordion" id="accordionExample333">
            <div class="accordion-item">
                <div id="<?= "test111{$comment['id']}" ?>" class="accordion-collapse collapse"
                     aria-labelledby="headingOne"
                     data-bs-parent="#accordionExample333">
                    <div class="accordion-body form-response">
                        <?php $form = ActiveForm::begin(['action' => '/comment/index?id=' . $comment['news_id'] . '&parent=' . $this->lastParentId]); ?>

                        <?= $form->field($this->modelForm, 'description')->textarea()->label(false); ?>

                        <div class="form-group">
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary mt-2']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</li>
