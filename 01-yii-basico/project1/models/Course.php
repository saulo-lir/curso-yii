<?php

namespace app\models;

use yii\db\ActiveRecord;

class Course extends ActiveRecord
{
    public static function tableName()
    {
        return 'courses';
    }

    // No método rules indicamos quais campos vindos do formulário são seguros para serem salvos na tabela. Ele é deve ser usado se utilizarmos o $model->attributes para receber os dados
    public function rules()
    {
        return [
            [['name', 'hours'], 'safe'] // Os campos name e hours são seguros
        ];
    }

}