<?php
namespace app\models;

// O Model Contem as regras de negócio e as validações

class CadastroForm extends \yii\base\Model
{
    // Campos da tabela e do formulário
    public $nome;
    public $telefone;
    public $email;

    // Aqui setamos as regras e validações dos campos
    // Todos os tipos de validações estão em: https://www.yiiframework.com/doc/guide/2.0/pt-br/tutorial-core-validators
    public function rules()
    {
        return [
            [['nome', 'telefone', 'email'], 'required'],
            ['email', 'email'],
            ['telefone', 'number'],
            ['created_at', 'default', 'value' => date('Y-m-d H:i:s')] // Setando um valor default para o campo created_at
        ];
    }

    public function attributeLabels()
    {
        return [
            'nome' => 'Seu Nome:'
        ];
    }
}