<?php

namespace app\models;

// O ActiveRecord contém regras de negócios, validações e a comunicação com o banco de dados. Ele herda da classe Model

class Cadastro extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{cadastro}}';
    }
}