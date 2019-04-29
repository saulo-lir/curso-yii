<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190429_115240_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(80)->notNull(),
            'password' => $this->string(60)->notNull(),
            'authKey' => $this->string(120)->notNull(),
            'accessToken' => $this->string(120)->notNull(),
        ]);

        // Popular os dados da tabela

        $this->insert('user', [
            'id' => '100',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ]);

        $this->insert('user', [
            'id' => '101',
            'username' => 'demo',
            'password' => password_hash('demo', PASSWORD_BCRYPT),
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ]);

        $this->insert('user', [
            'id' => '102',
            'username' => 'user',
            'password' => password_hash('user', PASSWORD_BCRYPT),
            'authKey' => 'test102key',
            'accessToken' => '102-token',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
