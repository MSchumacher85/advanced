<?php

namespace backend\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property int $enabled
 *
 * @property Category $category
 * @property TagToNews[] $tagToNews
 * @property Tag[] $tags
 */
class News extends \yii\db\ActiveRecord
{
    public $formTags;
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'enabled'], 'integer'],
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['slug', 'title'], 'string', 'max' => 256],
            [['slug'], 'unique'],
            [['formTags'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'description' => 'Description',
            'enabled' => 'Enabled',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[TagToNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagToNews()
    {
        return $this->hasMany(TagToNews::class, ['news_id' => 'id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('tag_to_news', ['news_id' => 'id']);
    }
}
