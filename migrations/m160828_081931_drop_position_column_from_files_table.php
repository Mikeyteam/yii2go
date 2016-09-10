<?php

use yii\db\Migration;

/**
 * Handles dropping position from table `files`.
 */
class m160828_081931_drop_position_column_from_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('files', 'position');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('files', 'position', $this->integer());
    }
}
