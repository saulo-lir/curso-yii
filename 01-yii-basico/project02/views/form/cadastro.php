<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Cadastro';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Cadastro de Usuário</h1>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'nome'); ?>
            <?= $form->field($model, 'telefone'); ?>
            <?= $form->field($model, 'email'); ?>
            <?= Html::submitButton('cadastrar', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>