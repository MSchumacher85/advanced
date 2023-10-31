<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4"><?php echo Yii::t('frontend', 'Congratulations!') ?></h1>
            <p class="fs-5 fw-light"><?php echo Yii::t('frontend', 'You have successfully created your Yii-powered application.') ?></p>
            <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com"><?= Yii::t('frontend', 'Get started with Yii'); ?></a></p>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2><?php echo Yii::t('frontend', 'Heading') ?></h2>

                <p><?php echo Yii::t('frontend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.') ?></p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/"><?php echo Yii::t('frontend', 'Yii Documentation') ?>
                        &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2><?php echo Yii::t('frontend', 'Heading') ?></h2>

                <p><?php echo Yii::t('frontend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.') ?></p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/"><?php echo Yii::t('frontend', 'Yii Forum') ?></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h2><?php echo Yii::t('frontend', 'Heading') ?></h2>

                <p><?php echo Yii::t('frontend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.') ?></p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/"><?php echo Yii::t('frontend', 'Yii Extensions') ?>
                        &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
