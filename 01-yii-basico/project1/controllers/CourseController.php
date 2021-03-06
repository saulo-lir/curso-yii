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

    public function actionUpdate($id)
    {
        $model = Course::findOne($id);

        if(!$model){
            throw new NotFoundHttpException("Curso não encontrado!");
        }

        $request = Yii::$app->request;

        if($request->isPost){
            $model->attributes = $request->post();
            $model->save();
            return $this->redirect(['course/index']);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $model = Course::findOne($id);

        if(!$model){
            throw new NotFoundHttpException("Curso não encontrado!");
        }

        $model->delete();
        return $this->redirect(['course/index']);
    }

}
