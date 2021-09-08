<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\PegawaiSearch;
use app\models\PermissionHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete', 'view'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function($rules){
                            return PermissionHelper::requireSuperAdmin();
                        }
                    ],

                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function($rules){
                            return PermissionHelper::requireAdminSDM();
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Pegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pegawai model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pegawai();
        $fotomodel = new UploadForm();

        // if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->Post())){
        //     Yii::$app->response->format = Response::FORMAT_JSON;;
        //     return ActiveForm::validate($model);
        // }

        if($model->load(Yii::$app->request->post())){
            $fotomodel->foto = UploadedFile::getInstance($fotomodel, 'foto');
            if ($fotomodel->upload()) {
                $model->foto = $fotomodel->foto->name;
                if ($model->save()) {
                    return $this->redirect(['index']);
                }else{
                    return $this->render('create', [
                        'model' => $model,
                        'fotomodel' => $fotomodel,
                    ]);
                }
            } 
        } else {
            return $this->render('create', [
                'model' => $model,
                'fotomodel' => $fotomodel,
            ]);
        }
    }

    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fotomodel = new UploadForm();

        if($model->load(Yii::$app->request->post())){
            $fotomodel->foto = UploadedFile::getInstance($fotomodel, 'foto');
            if ($fotomodel->upload()) {
                if($fotomodel->foto){
                    $model->foto = $fotomodel->foto->name;
                }
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->nip]);
                } else {
                    return $this->render('update', [
                        'model' => $model,
                        'fotomodel' => $fotomodel,
                    ]);
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'fotomodel' => $fotomodel,
            ]);
        }
    }

    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pegawai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
