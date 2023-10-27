<?php


use kartik\form\ActiveForm;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var backend\models\News $model */
/** @var kartik\form\ActiveForm $form */
/** @var backend\models\News $formTagsArray */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Category::find()->all(), 'id', 'title')) ?>

    <?php /*= $form->field($model, 'slug')->textInput(['maxlength' => true]) */ ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php

    echo $form->field($model, 'formTags')->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Tag::find()->all(), 'title', 'title'),
        'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
        ],
    ])->label('Tag Multiple');
    ?>

    <?php echo $form->field($model, 'description')->widget(CKEditor::class, [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'height' => '200px'
        ],
    ]); ?>

    <?php /*= $form->field($model, 'description')->textarea(['rows' => 6]) */ ?>

    <?php /*= $form->field($model, 'enabled')->textInput() */ ?>

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
