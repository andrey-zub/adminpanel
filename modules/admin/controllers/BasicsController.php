<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Basics;
use app\modules\admin\models\BasicsSearch;
use app\modules\admin\models\BasicsFindInn;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BasicsController implements the CRUD actions for Basics model.
 */
class BasicsController extends AppAdminController
{
    /**
     * {@inheritdoc}
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
        ];
    }


    public function actionIndex()
    {
      Yii::$app->db->pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $searchModel = new BasicsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //
        // $exportModel = new BasicsExport();
        // $dataProviderExport = $searchModel->search(Yii::$app->request->queryParams);

      Yii::$app->db->pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // 'dataProviderExport' => $dataProviderExport,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Basics();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = BasicsSearch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //----------------------------------------------------------------------------------------

    public function actionBasicsInn(){
      Yii::$app->db->pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);


        $searchModel = new BasicsFindInn();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


      Yii::$app->db->pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $this->render('basics-inn', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }


}
