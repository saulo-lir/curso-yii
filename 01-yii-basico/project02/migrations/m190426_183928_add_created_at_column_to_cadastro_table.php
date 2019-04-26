<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `{{%cadastro}}`.
 */
class m190426_183928_add_created_at_column_to_cadastro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%cadastro}}', 'created_at', $this->datetime()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%cadastro}}', 'created_at');
    }
}
