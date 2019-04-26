<?php

namespace app\controllers;

class SonTestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest()
    {
        echo "Ação teste funcionando...";
        exit;
    }

    // A rota será: http://localhost:8080/index.php?r=son-test/test-composto
    public function actionTestComposto()
    {
        echo "Ação teste composto funcionando...";
        exit;
    }

}
