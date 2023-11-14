<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\HtmlPurifier;

/**
 * @var \frontend\models\News $model
 * @var \frontend\models\Comment $modelForm
 */
?>
<?php
foreach ($model as $item): ?>
    <div class="post">
        <?php

        $description = \yii\helpers\StringHelper::truncateWords(strip_tags($item->description), 300);

        echo Html::a(
            '<h2>' . Html::encode($item->title) . '</h2>' . HtmlPurifier::process($description), ['news/view', 'id' => $item->id], ['class' => 'list-group-item']
        );
        ?>
        <?= Html::tag('button',
            Yii::t('frontend', 'comments:') . ':  ' . $item->getComment()->count(), ['class' => 'btn btn-primary',
                'data-bs-toggle' => 'collapse',
                'data-bs-target' => "#{$item->slug}",
                'aria-expanded' => true,
                'aria-controls' => $item->slug,
                'disabled' => $item->getComment()->count() == 0 ? true : false,
            ]);
        ?>
        <?= Html::tag('button',
            Yii::t('frontend', 'leave a comment'), ['class' => 'btn btn-secondary btn-add-comment scrollButton',
                'data-bs-toggle' => 'collapse',
                'data-scroll' => "{$item->id}",
                'data-bs-target' => "#{$item->slug}test",
                'aria-expanded' => true,
                'aria-controls' => 'form-comment',
                'data-guest' => Yii::$app->user->isGuest == true ? 'true' : 'false',
            ]);
        ?>

        <div class="accordion" id="accordionExample111">
            <div class="accordion-item">
                <div id="<?= $item->slug ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"
                     data-bs-parent="#accordionExample111">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php /*getComments($item, $modelForm) */ ?>
                            <?= app\components\MenuWidget::widget(['tpl' => 'comment', 'model' => $model, 'modelForm' => $modelForm, 'id' => $item->id]) ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="accordion" id="accordionExample222">
                <div class="accordion-item">
                    <div id="<?= "{$item->slug}test" ?>" class="accordion-collapse collapse"
                         aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample222">
                        <div class="accordion-body">

                            <?php $form = ActiveForm::begin(['action' => '/comment/index?id=' . $item->id, 'id' => $item->id]); ?>

                            <?= $form->field($modelForm, 'description')->textarea()->label('Коментировать'); ?>

                            <div class="form-group">
                                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary mt-2']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<?php function getComments($item, $modelForm)
{ ?>
    <?php foreach ($item->comment as $i): ?>
    <li class="list-group-item list-group-item-primary">

        <p><?= $i->description ?></p>
        <p style="color: #9e9e9e">
            <span>Дата: </span><?= \Yii::$app->formatter->asDatetime($i->created_at, "php:d-m-Y  H:i:s"); ?>
            <span>Прокоментировал: </span><?= \yii\helpers\ArrayHelper::getValue(\common\models\User::findOne(['id' => $i->user_id]), 'username') ?>
            <?= Html::tag('button',
                Yii::t('frontend', 'Ответить'), ['class' => 'btn btn-add-comment',
                    'style' => 'background: #b5cff7',
                    'data-bs-toggle' => 'collapse',
                    'data-bs-target' => "#test111{$i->id}",
                    'aria-expanded' => true,
                    'aria-controls' => 'form-response',
                    'data-guest' => Yii::$app->user->isGuest == true ? 'true' : 'false',
                ]);
            ?>
        </p>
        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="accordion" id="accordionExample333">
                <div class="accordion-item">
                    <div id="<?= "test111{$i->id}" ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample333">
                        <div class="accordion-body form-response">

                            <?php $form = ActiveForm::begin(['action' => '/comment/index?id=' . $item->id . '&parent=' . $i->id]); ?>

                            <?= $form->field($modelForm, 'description')->textarea()->label(false); ?>

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
<?php endforeach; ?>
<?php } ?>
<?php
$this->registerCss(".accordion-body.form-response{ padding: 5px; background: #CFE2FF; border-color: #ccc;}
.accordion-body.form-response textarea { border-color: #ccc; background: #CFE2FF; }
.accordion{ --bs-accordion-border-color: none; }
.accordion-body.form-response textarea { border-color: #ccc; background: #d4e5ff; }
.list-group-item.list-group-item-primary {border-radius: 5px; }
");
?>
