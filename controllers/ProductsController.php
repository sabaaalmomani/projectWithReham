<?php
namespace app\controllers;

use app\models\Categories;
use Yii;
use yii\filters\VerbFilter;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;



class ProductsController extends \yii\web\Controller
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
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  =>$searchModel,

        ]);

    }
             
     

    public function actionView($id)
    {
            return $this->render('view', [
                'model' => $this->findModel($id), ]);

    }



     public function actionCreate()
     {
            
        $model= new Products();
        $model->scenario = Products::SCENARIO_CREATE;
       
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $image=UploadedFile::getInstance($model,'product_image');
            $imgName= time() .'.' . $image->getExtension();
            $image->saveAs(yii::getAlias( '@productsimgpath'. '/'. $imgName));
            $model->product_image=$imgName;
            $model->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
         else { 
                    //print_r($model->getErrors ()product_image);die;
                    return $this->render('create', [
                        'model' => $model,
                    ]);
              }
    } 

        
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        

        $model->scenario = Products::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {            
            $image=UploadedFile::getInstance($model,'product_image');
            $imgName= time()  . '.' . $image->getExtension();
            $image->saveAs(yii::getAlias( '@productsimgpath'. '/'. $imgName));
            $model->product_image=$imgName;
            $model->save();

         
          return $this->redirect(['view', 'id' => $model->id]);
        }
            // else {
            //   //  print_r($model->getErrors());die;
            // }

          else
          {
        return $this->render('update', [
            'model' => $model,

        ]);}
    }
          


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    



    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    

}
