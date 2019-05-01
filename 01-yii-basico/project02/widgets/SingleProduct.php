<?php

// Criando um widget

namespace app\widgets;

class SingleProduct extends \yii\base\Widget
{
    public $produto;
    public $descricao;
    public $valor;

    public function init()
    {
        parent::init();
        $this->produto ?? 'Titulo';
        $this->descricao ?? 'Descrição';
        $this->valor ?? 'R$ Valor';
    }

    public function run()
    {
        return $this->render('single', [
            'produto' => $this->produto,
            'descricao' => $this->descricao,
            'valor' => $this->valor,
        ]);
    }
}