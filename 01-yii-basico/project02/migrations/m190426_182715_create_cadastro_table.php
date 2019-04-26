<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cadastro}}`.
 */
class m190426_182715_create_cadastro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cadastro}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(80)->notNull(),
            'telefone' => $this->integer()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cadastro}}');
    }
}
