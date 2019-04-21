<?php

namespace app\controllers;

use app\models\Course;

class TesteController extends \yii\web\Controller
{
    public function actionIndex($id = 500)
    {
        // Usando um helper para pegar os dados da requisição
        $request = \Yii::$app->request;
        $xpto = $request->get('xpto');

        // nome-da-view, array de dados que serão enviados para a view
        return $this->render('index', [
            'id' => $id,
            'xpto' => $xpto
        ]);
    }

    public function actionMaisParametros($id, $name)
    {
        echo $id.' - '.$name;
        exit;
    }

    // Consultando dados do banco
    public function actionGetCourses()
    {
        $courses = Course::find()->all();

        foreach($courses as $course){
            echo $course->id.' - Nome: '.$course->name.' - '.$course->hours;
            echo '<br/>';
        }
    }

}
