<?php

namespace frontend\models;

use common\models\User;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Comment extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%comment}}';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }
    public function beforeSave($insert)
    {
        $this->user_id = \Yii::$app->user->identity->id;

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function rules()
    {
        return [
            [['description'], 'string', 'min' => 2, 'max' => 256],
            [['parent_id'], 'integer'],
            [['news_id'], 'integer'],
            [['user_id'], 'integer'],
        ];
    }

    public function getNews(){
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }

    public function getUser(){
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getComments(){
        return $this->hasOne(Comment::class, ['id' => 'parent_id']); //Todo связали таблицу саму с собой
    }
}