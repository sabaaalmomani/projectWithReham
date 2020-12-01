 <?php

//namespace app\controllers;

//use Yii;

// use yii\rest\ActiveController;
// use common\models\LoginForm;
// use app\models\user;
// use yii\filters\auth\CompositeAuth;
// use yii\filters\auth\HttpBasicAuth;
// use yii\filters\auth\HttpBearerAuth;
// use yii\filters\auth\QueryParamAuth;

// class UserController extends ActiveController
// { 
    // public $modelClass = 'api\modules\v1\models\Country';    

    // public function behaviors()
    // {
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class' => HttpBasicAuth::className(),
    //         //'class' => CompositeAuth::className(),
    //         // 'authMethods' => [
    //             HttpBasicAuth::className(),
    //         //     HttpBearerAuth::className(),
    //         //     QueryParamAuth::className(),
    //         // ],
    //     ];
    //     return $behaviors;
    // }


//     public function actionLogin()
//     {
//     $post = Yii::$app->request->post();
//     $model = User::findOne(["name" => $post["name"]]);
//     if (empty($model)) {
//         throw new \yii\web\NotFoundHttpException('User not found');
//     }
//     if ($model->validatePassword($post["password"])) {
//         $model->last_login = Yii::$app->formatter->asTimestamp(date_create());
//         $model->save(false);
//         return $model; //return whole user model including auth_key or you can just return $model["auth_key"];
//     } else {
//         throw new \yii\web\ForbiddenHttpException();
//     }
// }


//     public function actionLogout()
//     {
//         $user_t = Yii::$app->user->logout();
//         return $this->apiItem(array(),'Logout Successfully');
//     }

// }