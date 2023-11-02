<?php

namespace backend\controllers;

use backend\models\Message;
use backend\models\searches\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Message models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param int $id ID
     * @param string $language Language
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $language)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $language),
        ]);
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param string $language Language
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $language)
    {
        $model = $this->findModel($id, $language);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['message/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    protected function findModel($id, $language)
    {
        if (($model = Message::findOne(['id' => $id, 'language' => $language])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
