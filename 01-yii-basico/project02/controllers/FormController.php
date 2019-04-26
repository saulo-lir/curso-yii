<?php
namespace app\controllers;

use app\models\CadastroForm;
use app\models\Cadastro;
use Yii;

class FormController extends \yii\web\Controller
{
    public function actionCadastro()
    {
        $model = new CadastroForm;

        // Pegar os dados do formulário de cadastro e valida
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            // Salvar dados no banco
            $cadastro = new Cadastro($model);
            //$cadastro->nome = 'valor';

            if($cadastro->save()){
                $this->refresh();
            }
        }

        return $this->render('cadastro', [
            'model' => $model
        ]);
    }

    public function actionSelect()
    {
        //$cadastro = Cadastro::findOne(2);
        $cadastro = Cadastro::find()->all();
        //$cadastro = Cadastro::find()->where(['nome' => 'nomeQualquer'])->one();
    }

    public function actionAlterar()
    {
        $cadastro = Cadastro::findOne(2);
        $cadastro->nome = 'Nome atualizado';

        $cadastro->save();
    }

    public function actionDelete()
    {
        $cadastro = Cadastro::findOne(3);

        $cadastro->delete();
    }
}