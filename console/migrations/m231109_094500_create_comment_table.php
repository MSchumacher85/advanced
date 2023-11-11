<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m231109_094500_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'user_id' => $this->integer(),
            'description' =>$this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_comment_news',
            'comment',
            'news_id',
            'news',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_comment_user',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_comment_news',
            'comment'
        );
        $this->dropForeignKey(
            'fk_comment_user',
            'comment'
        );

        $this->dropTable('{{%comment}}');
    }
}
