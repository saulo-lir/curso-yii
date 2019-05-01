<?php
/* @var $this yii\web\View */

/* Usando Widgets */

use yii\bootstrap\Alert;
use app\widgets\SingleProduct;
use yii\helpers\Html;
use yii\helpers\Url;

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

// Usando helpers

// Link
echo Html::a('Contato', Url::toRoute('@contato'), ['class' => 'btn btn-primary']);

// Select (Dropdownlist)
echo Html::dropDownList('produtos', Yii::$app->user->identity->id, [
    'value1' => 'valor1',
    'value2' => 'valor2',
    'value3' => 'valor3'
]);

?>
<h1>Hello World!</h1>
