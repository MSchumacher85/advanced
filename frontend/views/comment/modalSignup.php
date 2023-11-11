<div class="modal fade" id="exampleModalSignup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <?php

                /** @var yii\web\View $this */
                /** @var yii\bootstrap5\ActiveForm $form */
                /** @var frontend\models\SignupForm $model */

                use frontend\models\SignupForm;
                use yii\bootstrap5\Html;
                use yii\bootstrap5\ActiveForm;

                $model = new SignupForm();

                $this->title = 'Signup';
                $this->params['breadcrumbs'][] = $this->title;
                ?>
                <div class="site-signup">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>Пожалуйста, заполните следующие поля для регистрации:</p>

                    <div class="row">
                        <div class="">
                            <?php $form = ActiveForm::begin(['action' => '/site/signup','id' => 'form-signup']); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <div class="form-group">
                                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                <?= Html::tag('button',
                                    Yii::t('frontend', 'Войти'), ['class' => 'btn btn-info',
                                        'data-bs-toggle' => 'modal',
                                        'data-bs-target' => "#exampleModalLogin",
                                        'aria-expanded' => true,
                                        'aria-controls' => 'exampleModalLogin',
                                        'data-bs-dismiss' => "modal"
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

