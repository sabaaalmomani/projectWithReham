<?php

namespace app\controllers;
use app\models\Products;
use app\models\Categories;
use yii\web\NotFoundHttpException;
use yii\data\PaginatedRepresentation;
use yii\data\ActiveDataProvider;

use Yii;
use yii\data\Pagination;

class ApiController extends \yii\web\Controller
{



    public  $enableCsrfValidation=false;



    public function actionCreateProduct()
     {

        $model = new Products();
        $model->attributes=Yii::$app->request->post();
        if ($model->validate()&& $model->save())
         {
            return json_encode([
                "success" => true, "data"=>'product ceated successfuly'
            ]);
        }
        else {
            return json_encode(['status'=> false , 'data'=>$model->getErrors()
            ]);
        }


    }



    // public function actionGetAllProducts()
    // {

    //     $products = Products::find()->asArray()->all();
        
    //     $limit = 5;
    //     $page = 1;
    //     $numberOfPages = (int) ceil(count($products) / $limit);
    //     $paginated = new Pagination(
    //         $page,
    //         $limit,
    //         $numberOfPages
    //     );
    //     $response = $this->createApiResponse($paginated, 200, 'json');
    //     return json_encode($response);

    // }
        

    



    public function actionGetAllProducts()
    {

        $products = Products::find()->asArray()->all();
        
            return json_encode($products);

    }


    public function actionGetProduct($id)
    {

        $product = products::findOne($id);
        return json_encode($product);

    
    }

    public function actionUpdateProduct($id)
    {
        //echo $id;
        $model = Products::findOne($id);
        if($model){
           $model->load(Yii::$app->request->post());
        }
        if($model && $model->save()){
            return json_encode([
                "success" => true
            ]);
        }else{
            return json_encode([
                "success" => false,
                "error" => $model->getErrors()
            ]);
        }

        
    }
        

    public function actionDeleteProduct($id)
    {
         $model = Products::findOne($id);
         $model->delete();
            // var_dump('deleted') ;die;
        
            if($this->delete()){
                return json_encode([
                    "status" => true,'data'=>'product deleted successfuly'
                ]);}
                
                else {
                    return json_encode(['status'=> false , 'data'=>$model->getErrors()
                    ]);
                }
    }





    public function actionCreateCategory()
     {

        $model = new Categories();
        $model->attributes=Yii::$app->request->post();
        if ($model->validate()&& $model->save())
         {
            return json_encode([
                "success" => true, "data"=>'category ceated successfuly'
            ]);
        }
        else {
            return json_encode(['status'=> false , 'data'=>$model->getErrors()
            ]);
        }


    }




}