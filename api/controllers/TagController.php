<?php

namespace api\controllers;

use api\models\Tag;
use Yii;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

class TagController extends Controller
{
    public function actionIndex()
    {
        /*return new ActiveDataProvider([
            'query' => Tag::find(),
        ]);*/

        $filter = new ActiveDataFilter([
            'searchModel' => 'api\models\searches\TagSearch',
        ]);

        $filterCondition = null;

        if ($filter->load(Yii::$app->request->get())) {
            $filterCondition = $filter->build();
            if ($filterCondition === false) {
                // Serializer would get errors out of it
                return $filter;
            }
        }

        $query = Tag::find();
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);

    }

}