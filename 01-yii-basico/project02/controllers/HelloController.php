<?php

namespace app\controllers;

class HelloController extends \yii\web\Controller
{
    // Mudando layout padrão para todas as views dessa classe
    //public $layout = 'hello_layout';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
