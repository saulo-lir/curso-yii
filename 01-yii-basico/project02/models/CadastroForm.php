<?php
namespace app\models;

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
            ['telefone', 'number']
        ];
    }

    public function attributeLabels()
    {
        return [
            'nome' => 'Seu Nome:'
        ];
    }
}