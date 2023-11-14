<?php

namespace app\components;


use frontend\models\Comment;
use frontend\models\News;
use yii\base\Widget;

class MenuWidget extends Widget
{

    public $tpl;

    public $id;

    public $data;

    public $tree;
    public $menuHtml;

    public $model;

    public $modelForm;

    public $lastParentId;

    public function init()
    {
        parent::init();

        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {

        $this->data = News::find()->select('{{%news}}.id, {{%comment}}.id, parent_id, {{%news}}.description, {{%comment}}.description, news_id, created_at, user_id')->innerJoinWith('comment')->where(['news_id' => $this->id])->indexBy('id')->asArray()->all();

        $this->tree = $this->getTree();

        $this->menuHtml = $this->getMenuHtml($this->tree);

        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
        }
        return $tree;
    }

    public function getLastParentId($comment)
    {
        if (isset($comment['children'])) {
           foreach ($comment['children'] as $child){
               $this->lastParentId = $child['id'];
               $this->getLastParentId($child);
           }
        }
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $comment) {
            $str .= $this->catToTemplate($comment, $tab);
        }
        return $str;
    }

    protected function catToTemplate($comment, $tab)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}