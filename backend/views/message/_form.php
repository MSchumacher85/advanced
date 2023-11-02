<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Message $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model->source, 'category')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'translation')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
