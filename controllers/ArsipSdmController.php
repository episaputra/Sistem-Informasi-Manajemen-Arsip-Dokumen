<?php

namespace app\controllers;

use Yii;
use app\models\ArsipSdm;
use app\models\Pegawai;
use app\models\KategoriDokumen;
use app\models\ArsipSdmSearch;
use app\models\PermissionHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;
use yii\web\Response;

/**
 * ArsipSdmController implements the CRUD actions for ArsipSdm model.
 */
class ArsipSdmController extends Controller
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
                            return PermissionHelper::requireAdminSDM();
                        }
                    ],

                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function($rules){
                            return PermissionHelper::requirePegawaiSDM();
                        }
                    ],

                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function($rules){
                            return PermissionHelper::requireSuperAdmin();
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all ArsipSdm models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new ArsipSdmSearch();
        $models = (new \yii\db\Query())
            ->select(['as.nip AS nip', 'pg.nama AS nama', 'COUNT(as.no_dokumen) AS jumlah'])
            ->groupBy('as.nip')
            ->from('pegawai pg, arsip_sdm as')
            ->where('as.nip = pg.nip')
            ->all();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'models'=>$models,
        ]);
    }

    public function actionDetail($id)
    {
        $searchModel = new ArsipSdmSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams, $id,['pagination' => ['pageSize => 10']]);
        $sdm = ArsipSdm::find()->select('no_dokumen')->where('nip=:nip', [':nip'=>$id])->one();
        
        return $this->render('detail', [
            'model' => $this->findModel($sdm->no_dokumen),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArsipSdm model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new ArsipSdmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ArsipSdm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArsipSdm();
        $nip = Pegawai::find()->all();
        $kode_kategori = KategoriDokumen::find()->all();
        $filemodel = new UploadForm();

        if($model->load(Yii::$app->request->post())){
            $filemodel->filedokumen = UploadedFile::getInstance($filemodel, 'filedokumen');
            if ($filemodel->upload()) {
                $model->file = $filemodel->filedokumen->name;
                if ($model->save()) {
                    return $this->redirect(['index']);
                } else {
                    return $this->render('create', [
                        'model' => $model, 
                        'nip' => $nip, 
                        'kode_kategori' => $kode_kategori,
                        'filemodel' => $filemodel,
                    ]);
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model, 
                'nip' => $nip, 
                'kode_kategori' => $kode_kategori,
                'filemodel' => $filemodel,
            ]);
        }
    }

    /**
     * Updates an existing ArsipSdm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $nip = Pegawai::find()->all();
        $kode_kategori = KategoriDokumen::find()->all();
        $filemodel = new UploadForm();

        if($model->load(Yii::$app->request->post())){
            $filemodel->filedokumen = UploadedFile::getInstance($filemodel, 'filedokumen');
            if ($filemodel->upload()) {
                if($filemodel->filedokumen){
                    $model->file = $filemodel->filedokumen->name;
                }
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->no_dokumen]);
                } else {
                    return $this->render('update', [
                        'model' => $model, 
                        'nip' => $nip, 
                        'kode_kategori' => $kode_kategori,
                        'filemodel' => $filemodel,
                    ]);
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model, 
                'nip' => $nip, 
                'kode_kategori' => $kode_kategori,
                'filemodel' => $filemodel,
            ]);
        }
    }

    /**
     * Deletes an existing ArsipSdm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /*public function actionCari()
    {
        $searchModel = new ArsipSdmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    }*/

    public function actionDownload($id)
    {
        
    }

    /**
     * Finds the ArsipSdm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ArsipSdm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArsipSdm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
