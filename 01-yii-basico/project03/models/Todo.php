<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $todo
 * @property integer $done
 * @property string $finish
 * @property string $created_at
 *
 * @property User $user
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['todo', 'done','finish'], 'required'],
            [['user_id', 'done'], 'integer'],
            [['finish', 'created_at'], 'safe'],
            [['todo'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            ['created_at', 'default', 'value' => date('Y-m-d H:i:s')],
            ['user_id', 'default', 'value' => Yii::$app->user->identity->id ?? null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'todo' => 'Tarefa',
            'done' => 'Completa',
            'finish' => 'Conclui em',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return TodoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TodoQuery(get_called_class());
    }
}
