<?php
/**
 * @var frontend\models\Tag $model
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$this->params['model'] = $model;// для того чтобы передать внутрь renderDynamic()


$id = 345;

if ($this->beginCache($id, ['duration' => 3600, 'dependency' =>
    [
        'class' => 'yii\caching\DbDependency',
        'sql' => 'SELECT COUNT(*) FROM tag'
    ]])) {

    foreach ($model->each() as $item) {
        echo \yii\helpers\Html::a($item->title, ['tag/view', 'id' => $item->id], ['class' => 'btn btn-success']);
    }
    echo '<br/>';
    echo $this->renderDynamic( 'return Yii::$app->security->generateRandomString(12);');

    echo '<br/>';
    echo $this->renderDynamic( 'return $this->params[\'model\']->one()[\'title\'];');

    $this->endCache();
}
echo '<br/>';
echo Html::a(Yii::t('frontend', 'Go back'), Yii::$app->request->referrer, ['class' => 'btn btn-danger', 'style' => 'margin-top: 10px']);



?>

<?php
$this->registerCss(".btn { margin-right: 5px }");
?>
