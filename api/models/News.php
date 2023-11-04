<?php

namespace api\models;

use frontend\models\Category;
use frontend\models\Tag;
use frontend\models\TagToNews;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class News extends ActiveRecord implements Linkable
{

    public static function tableName()
    {
        return '{{%news}}';
    }

    public function fields()//Будут выводится только поля которые попали в это поле
    {
        return [
            'id',
            'title',
            'enabled' => function () {
                return \Yii::$app->formatter->asBoolean(true);;
            }
        ];
    }

    public function extraFields()
    {
        return ['category'];//. Как правило, extraFields() используется для указания полей, значения которых являются объектами. В данном случае это связь
    }

    public function getLinks()
    {
        return [
            [
                Link::REL_SELF => Url::to(['news/view', 'id' => $this->id], true),//Второй параметр означает абсолютный путь
            ],
            [
                Link::REL_SELF => Url::to(['category/view', 'id' => $this->category_id], true),
            ]
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getTagToNews()
    {
        return $this->hasMany(TagToNews::class, ['news_id' => 'id']);
    }

    public function getTag()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('tagToNews');
    }
}