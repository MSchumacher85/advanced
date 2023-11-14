<?php

/**
 * @var frontend\models\News $model
 */

/**
 * @var frontend\models\Comment $modelForm
 */

?>

<?= $this->render('@frontend/views/comment/form', compact('model', 'modelForm')); ?>
<?= $this->render('@frontend/views/comment/modalLogin'); ?>
<?= $this->render('@frontend/views/comment/modalSignup'); ?>

<?php
$this->registerCss(".post { border: 1px solid black; border-radius: 10px; margin-top: 5px; padding: 10px }");
?>
