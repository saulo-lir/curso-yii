<?php

namespace app\controllers;

use app\models\Course;
use Yii;

class CourseController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $courses = Course::find()->all();
        return $this->render('index', [
            'courses' => $courses
        ]);
    }

    public function actionCreate()
    {
        $request = Yii::$app->request; // Recebendo dados do formulário

        if($request->isPost){
            // Atribuindo valores da request no model Course
            $model = new Course();
            $model->attributes = $request->post();

            /*
            Equivale a:

            $data = $request->post();
            $model->name = $data['name'];
            $model->hours = $data['hours'];

            OBS.: Se feito assim, as 'rules' não são necessárias
            */

            $model->save();

            return $this->redirect(['course/index']);
        }

        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
