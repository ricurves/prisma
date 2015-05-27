<?php
/**
 * @author Punto Aji <punto@jogjamedia.co.id>
 * @copyright Copyright (c) 2015 JMC IT Consultant
 * @link http://www.jogjamedia.co.id
 */
 
namespace app\controllers;

use Yii;
use app\models\Project;
use app\models\Tahun;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\bootstrap\ActiveForm;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Project();
		$yearModel = Tahun::find()->all();
		
		// if filter year haven't been set then set it with current year 
		if(!isset(Yii::$app->session['filter_year']))
			Yii::$app->session['filter_year'] = date('Y');
		
		// apply filter to the models
		if (Yii::$app->request->post())
		{
			Yii::$app->session['filter_year'] = Yii::$app->request->post('filter_year');
			Yii::$app->session['filter_key'] = Yii::$app->request->post('filter_key');
		}
			
        return $this->render('index', [
            'model' => $model,
            'yearModel' => $yearModel,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
		
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
		    Yii::$app->response->format = Response::FORMAT_JSON;
		    $json = ActiveForm::validate($model);
			
			if($json == '[]') {
				$model->save();
				return $this->redirect(['index']);
			}	
			else 
				return $json;
			
        } else {
            return $this->renderAjax('form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
