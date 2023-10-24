<?php


use kartik\form\ActiveForm;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var backend\models\News $model */
/** @var kartik\form\ActiveForm $form */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Category::find()->all(), 'id', 'title')) ?>

    <?php /*= $form->field($model, 'slug')->textInput(['maxlength' => true]) */?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php /*= $form->field($model, 'enabled')->textInput() */?>

    <?= $form->field($model, 'enabled')->radioButtonGroup([1 => 'Да', 0 => 'Нет']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs(
    "$('#news-enabled .btn').on('click', function() { $('#news-enabled .btn.active').removeClass('active'); });"//Todo удаление класса
);

?>
