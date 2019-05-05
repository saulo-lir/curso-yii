<?php

use yii\db\Migration;

/**
 * Handles the creation of table `todo`.
 */
class m170713_044531_create_todo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('todo', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'todo' => $this->string(200)->notNull(),
            'done' => $this->smallInteger()->notNull()->defaultValue(0),
            'finish' => $this->datetime()->notNull(),
            'created_at' => $this->dateTime()->notNull()
        ]);

        $this->addForeignKey(
            'fk-todo-user_id',
            'todo',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `todo`
        $this->dropForeignKey(
            'fk-todo-user_id',
            'todo'
        );

        $this->dropTable('todo');
    }
}
