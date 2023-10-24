<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class TagToNews extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%tag_to_news}}';
    }

    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }

    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }
}