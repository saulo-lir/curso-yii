<?php
namespace app\controllers;

use app\models\CadastroForm;
use Yii;

class FormController extends \yii\web\Controller
{
    public function actionCadastro()
    {
        $model = new CadastroForm;

        // Pegar os dados do formulário de cadastro e valida
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            var_dump(Yii::$app->request->post());
        }

        return $this->render('cadastro', [
            'model' => $model
        ]);
    }
}