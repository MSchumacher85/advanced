<?php

namespace api\models\searches;

use api\models\Tag;
use yii\base\Model;

class TagSearch extends Tag //Если захотим наследоваться от класса Models то необходимо будет прописать public $id; public $slug и т.д.
{

    public function rules()
    {
        return [
            ['id', 'integer'],
            [['slug', 'title'], 'string', 'min' => 2, 'max' => 200],
        ];
    }
}