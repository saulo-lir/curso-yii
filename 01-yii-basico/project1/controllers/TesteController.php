<?php

namespace app\controllers;

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

}
