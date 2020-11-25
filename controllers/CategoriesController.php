<?php
namespace app\controllers;
use yii\filters\VerbFilter;
use app\models\Categories;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;

use Yii;
use yii\base\Model;

class CategoriesController extends \yii\web\Controller
{
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
        $query=Categories::find();

        $dataProvider = new ActiveDataProvider(
            ['query' => $query,]);
            
                  return $this->render('index', [
                'dataProvider' => $dataProvider ]);
    }


      
    public function actionView($id)
    {
            return $this->render('view', [
                'model' => $this->findModel($id), ]);

    }



     public function actionCreate()
     {

        $model = new Categories();

        if ($model->load(Yii::$app->request->post())&&$model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }


    }

        
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if (!empty(Yii::$app->request->post())) {
         $model->load(Yii::$app->request->post());
         if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);}
         }
        return $this->render('update', [
            'model' => $model,

        ]);
    }
          

    
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->status=0;
        $model->save();
        return $this->redirect(['index']);
    }
    



    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null)
         {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    

}



