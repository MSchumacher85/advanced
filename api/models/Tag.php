<?php

namespace api\models;

use frontend\models\News;
use frontend\models\TagToNews;
use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%tag}}';
    }

    public function getTagToNews()
    {
        return $this->hasMany(TagToNews::class, ['tag_id' => 'id']);
    }

    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])->via('tagToNews');
    }

}