<div class="modal fade" id="exampleModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel" style="color: red">Коментрарии могут оставлять только зарегистрированные пользователи</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <?php

                /** @var yii\web\View $this */
                /** @var yii\bootstrap5\ActiveForm $form */
                /** @var \common\models\LoginForm $model */

                use yii\bootstrap5\Html;
                use yii\bootstrap5\ActiveForm;

                $this->title = 'Вход';
                $this->params['breadcrumbs'][] = $this->title;
                $model = new \common\models\LoginForm();
                ?>
                <div class="site-login">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>Пожалуйста, заполните следующие поля для входа:</p>

                    <div class="row">
                        <div class="">
                            <?php $form = ActiveForm::begin(['action' => '/site/login', 'id' => 'login-form']); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <div class="my-1 mx-0" style="color:#999;">
                                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                <br>
                                Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                <?= Html::tag('button',
                                    Yii::t('frontend', 'Зарегистрироваться'), ['class' => 'btn btn-info',
                                        'data-bs-toggle' => 'modal',
                                        'data-bs-target' => "#exampleModalSignup",
                                        'aria-expanded' => true,
                                        'aria-controls' => 'exampleModalSignup',
                                        'data-bs-dismiss' => "modal",
                                    ]);
                                ?>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


