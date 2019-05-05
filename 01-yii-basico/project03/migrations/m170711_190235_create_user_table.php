<?php

use yii\db\Migration;
use Yii;

/**
 * Handles the creation of table `user`.
 */
class m170711_190235_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(80)->notNull(),
            'password' => $this->string(60)->notNull(),
            'authKey' => $this->string(120)->notNull(),
            'accessToken' => $this->string(120)->notNull(),
        ]);

        $this->insert('user', [
            'id' => '100',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
            'authKey' => \Yii::$app->security->generateRandomString(),
            'accessToken' => '100-token',
        ]);

        $this->insert('user', [
            'id' => '101',
            'username' => 'demo',
            'password' => password_hash('demo', PASSWORD_BCRYPT),
            'authKey' => \Yii::$app->security->generateRandomString(),
            'accessToken' => '101-token',
        ]);

        $this->insert('user', [
            'id' => '102',
            'username' => 'user',
            'password' => password_hash('user', PASSWORD_BCRYPT),
            'authKey' => \Yii::$app->security->generateRandomString(),
            'accessToken' => '102-token',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
