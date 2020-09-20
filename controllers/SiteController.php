<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Validar;
use app\models\FormClientes;
use app\models\formMantenimiento;
use app\models\Mantenimiento;
use app\models\Clientes;
use yii\data\SqlDataProvider;

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
        $count = Yii::$app->db->createCommand("select COUNT(*) from mantenimiento")->queryScalar();
        $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT c.nombre , m.atiende, m.fechaRegistro, m.fechaMantenimiento, c.automovil
        FROM mantenimiento m
        INNER JOIN clientes c
        ON m.idCliente = c.id',
        'sort'=>[
            'attributes'=>["nombre","atiende", "fechaRegistro", "fechaMantenimiento", "automovil"],
        ],

]);
        return $this->render('index', ["dataProvider"=>$dataProvider]);
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

    public function actionCreatecliente()
    {
        $msg = null;
        $model = new FormClientes;
        if ($model->load(Yii::$app->request->post())){
            if($model->validate()){
               $table = new Clientes;
               $table -> nombre = $model->nombre;
               $table -> telefono = $model->telefono;
               $table -> direccion = $model->direccion;
               $table -> automovil = $model->automovil;
               if($table->insert()){
                   $msg = "Cliente Guardado Correctamente";
                   $model->nombre = null;
                   $model->telefono = null;
                   $model->direccion = null;
                   $model->automovil = null;
               }else{
                   $msg = "Error Al Guardar Cliente";
               }
            }
        else{
            $model->getErrors();
        }
    }
        return $this->render('createcliente',['model'=> $model, 'msg'=> $msg]);
    }

    public function actionCreatemantenimiento()
    {
        $msg = null;
        $model = new FormMantenimiento;
        $llenar = new Clientes;
        $combo = $llenar->find()->all();
        if ($model->load(Yii::$app->request->post())){
            if($model->validate()){
               $table = new Mantenimiento;
               $table -> atiende = $model->atiende;
               $table -> fechaRegistro = $model->fechaRegistro;
               $table -> fechaMantenimiento = $model->fechaMantenimiento;
               $table -> idCliente = $model->idCliente;
               if($table->insert()){
                   $msg = "Mantenimiento Guardado Correctamente";
                   $model->atiende = null;
                   $model->fecharegistro = null;
                   $model->fechamantenimiento = null;
               }else{
                   $msg = "Error Al Guardar Mantenimiento";
               }
            }
        else{
            $model->getErrors();
        }
    }
        return $this->render('createmantenimiento',['model'=> $model, 'msg'=> $msg, 'combo'=>$combo]);
    }

    public function actionViewclientes()
    {
        $table= new Clientes;
        $model = $table->find()->all();
        return $this->render('viewclientes', ["model"=>$model]);
    }

    public function actionViewmantenimiento()
    {
        $table= new Clientes;
        $model = $table->find()->all();
        return $this->render('viewmantenimiento', ["model"=>$model]);
    }
}
