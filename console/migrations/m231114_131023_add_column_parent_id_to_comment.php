<?php

use yii\db\Migration;

/**
 * Class m231114_131023_add_column_parent_id_to_comment
 */
class m231114_131023_add_column_parent_id_to_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment', 'parent_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('comment', 'parent_id');
    }


}
