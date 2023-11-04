<?php

namespace api\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [
            [['slug', 'title'], 'required'],
            [['enabled'], 'integer'],
            [['slug', 'title'], 'string', 'max' => 256],
            [['slug'], 'unique'],
        ];
    }

   /* public function getNews(){
        return $this->hasMany(News::class, ['category_id' => 'id']);
    }*/

}