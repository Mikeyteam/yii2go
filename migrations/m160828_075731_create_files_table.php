<?php

use yii\db\Migration;

/**
 * Handles the creation for table `files`.
 */
class m160828_075731_create_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%files))', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%files}}');
    }
}
