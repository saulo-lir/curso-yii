<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'TODO List';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>TODO List</h1>

        <p class="lead">Sistema de gerenciamento de tarefas.</p>

        <p><a class="btn btn-lg btn-success" href="<?=Url::toRoute('@web/todo')?>">Começar a criar tarefas</a></p>
    </div>

    <div class="body-content">

    </div>
</div>
