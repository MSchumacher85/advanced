<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function getNews(){
        return $this->hasMany(News::class, ['category_id' => 'id']);
    }

}