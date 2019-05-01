<?php
/* @var $this yii\web\View */

/* Usando Widgets */

use yii\bootstrap\Alert;
use app\widgets\SingleProduct;

echo Alert::widget([
    'options' => [
        'class' => 'alert-info',
    ],
    'body' => 'Say hello...',
]);


// Chamando nosso Widget criado
echo SingleProduct::widget([
    'produto' => 'Produto Teste',
    'descricao' => 'Descrição Teste',
    'valor' => 2.90
]);

?>
<h1>Hello World!</h1>
