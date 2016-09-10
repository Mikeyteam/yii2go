<?php

use yii\db\Migration;

/**
 * Handles the creation for table `news`.
 */
class m160827_095649_create_news_table extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(10),
            'text' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),

        ]);

        $this->addForeignKey(
            'FK_news_author', '{{%news}}', 'author_id', 'user', 'id', 'SET NULL', 'CASCADE'
        );
    }



    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%news}}');
    }
}
