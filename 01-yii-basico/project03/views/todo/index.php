<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Tarefa', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Mostrar Todas', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Filtrar concluidos', ['index?done=0'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'todo',
            'finish:date',
            [
                'content' => function ($model) {
                    if ($model->done) {
                        return Html::a('Refazer', '/todo/done?id='.$model->id, ['class' => 'btn btn-warning']);
                    }
                    return Html::a('Completar', '/todo/done?id='.$model->id, ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>


</div>
