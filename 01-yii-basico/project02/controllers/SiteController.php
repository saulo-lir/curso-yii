<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTeste()
    {
        $request = Yii::$app->request;

        // Pegar as requisições POST
        $post = $request->post();

        // Pegar as requisições GET
        $get = $request->get();

        // Pegar a url que estamos que estamos acessando
        echo $request->url;

        // Pegar a url comleta que estamos que estamos acessando
        echo $request->absoluteUrl;

    }

    /* Trabalhando com Sessions */

    public function actionCriar()
    {
        // Instanciando uma session
        $session = Yii::$app->session;

        // Inicializando
        $session->open();

        // Verificar se a section está ativa
        var_dump($session->isActive);

        // Criando uma section
        $session->set('campo', 'valor');

        // Exibir mensagem instantânea quando uma página é carregada. Ao ser mostrada a mensagem, ela será destruída da sessão
        $session->setFlash('msg', 'Sucesso ao concluir');

        // Fechar a sessão
        $session->close();

        /* Cookies */

        // Instanciando um cookie
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'MeuCookie',
            'value' => 'Teste123',
            'expire' => strtotime('+10 seconds')
        ]));
        
    }

    // Acessar uma sessão ou cookie que já foram criados anteriormente
    public function actionLer()
    {
        $session = Yii::$app->session;
        $cookies = Yii::$app->request->cookies;

        // Ler um cookie
        echo $cookies->get('MeuCookie');

        // Ler uma sessão
        $session->open();
        echo $session->get('campo');
        echo $session->getFlash('msg');
    }

}
