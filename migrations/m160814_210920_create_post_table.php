<?php

use yii\db\Migration;

/**
 * Handles the creation for table `post`.
 */
class m160814_210920_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'text' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
        ]);
        $this->createIndex('idx-post-user_id','{{%post}}','user_id');
        $this->addForeignKey(
            'FK_post_author', '{{%post}}', 'author_id', 'user', 'id', 'SET NULL', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
