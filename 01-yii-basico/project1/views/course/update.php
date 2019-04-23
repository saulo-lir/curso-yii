<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use Yii;
?>

<h1>Editar curso</h1>

<form name="form" method="post" action="<?= Url::to(['course/update', 'id' => $model->id]) ?>">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $model->name ?>">
    </div>
    <div class="form-group">
        <label for="hours">Hours:</label>
        <input type="text" class="form-control" id="hours" name="hours" placeholder="Digite a carga horária" value="<?= $model->hours ?>">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>