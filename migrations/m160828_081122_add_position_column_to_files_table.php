<?php

use yii\db\Migration;

/**
 * Handles adding position to table `files`.
 */
class m160828_081122_add_position_column_to_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('files', 'position', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('files', 'position');
    }
}
