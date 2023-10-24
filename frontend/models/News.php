<?php

namespace frontend\models;

use backend\models\TagToNews;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getTabToNews()
    {
        return $this->hasMany(TagToNews::class, ['news_id' => 'id']);
    }

    public function getTag()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('tag_to_news');
    }
}