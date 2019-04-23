<?php
/* @var $this yii\web\View */

use yii\helpers\Url; // Helper de urls
?>
<h1>Listagem de cursos</h1>

<h3><a href="<?= Url::to(['course/create']) ?>">Novo Curso</a></h3>

<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Hours</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($courses as $course){ ?>
            <tr>
                <td><?= $course->id ?></td>
                <td><?= $course->name ?></td>
                <td><?= $course->hours ?></td>
                <td><a href="<?= Url::to(['course/update', 'id' => $course->id]) ?>">Editar Curso</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
