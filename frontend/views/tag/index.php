<?php
/**
 * @var frontend\models\Tag $model
 */

use yii\helpers\Html;

foreach ($model as $item){
    echo \yii\helpers\Html::a($item->title, ['tag/view', 'id' => $item->id], ['class' => 'btn btn-success']);
}
echo '<br/>';
echo Html::a(Yii::t('frontend','Go back'), Yii::$app->request->referrer, ['class' => 'btn btn-danger', 'style' => 'margin-top: 10px']);
?>

<?php
$this->registerCss(".btn { margin-right: 5px }");
?>
