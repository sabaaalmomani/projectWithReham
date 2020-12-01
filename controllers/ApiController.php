<?php

namespace app\controllers;
use app\models\Products;
use app\models\Categories;
use app\models\ProductsSearch;
use yii\filters\auth\HttpBasicAuth;


use Yii;

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
       

                        
        public function actionGetDataProvider(){
            $searchModel = new ProductsSearch();
            $provider = $searchModel->searchApi(Yii::$app->request->queryParams);
            $products = $provider->getModels();
            $array = [];
           foreach($products as $data){
                $array['name']=$data['name'];    
                $array['price']=$data['price']; 
                $array['category_id']=$data['category_id']; 
            }
            $response['data']=$array;
            return json_encode($response);

         }

        public function actionGetAllProducts()
        {
            
            $products = Products::find()->asArray()->all();
                return json_encode($products);

        }


        public function actionGetProduct()
         {   $id=$_GET['id'];
             if (isset($id)){
            Yii::$app->response->format = \yii\ web\ Response::FORMAT_JSON;
            $product = \app\ models\ Products::findOne($id);
            return $product;
        
        }

          }



        public function actionUpdateProduct($id)
           {
    
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
                    "success" => true, "data"=>'category created successfuly'
                ]);
            }
            else {
                return json_encode(['status'=> false , 'data'=>$model->getErrors()
                ]);
            }


        }




}