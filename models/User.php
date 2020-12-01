 <?php
//namespace app\models;

// use Yii;
// use yii\base\NotSupportedException;
// use yii\behaviors\TimestampBehavior;
// use yii\db\ActiveRecord;
// use yii\web\IdentityInterface;

// class User extends ActiveRecord implements IdentityInterface
// {
//     const STATUS_DELETED = 0;
//     const STATUS_ACTIVE = 10;

//     public static function tableName()
//     {
//         return 'user';
//     }

//     public function behaviors()
//     {
//         return [
//             TimestampBehavior::className(),
//         ];
//     }

//     public function rules()
//     {
//      return [
//          [['name'], 'required',],
//          [['id'], 'integer'],
//          [['status'], 'integer'],
//          [['email'], 'string'],
//          [['create_at'], 'date', 'format' => 'php:Y-m-d H:i:s'],


         
//      ];

//     }
//     public function beforeSave($insert)
//      {
//     if (parent::beforeSave($insert)) {
//         if ($this->isNewRecord) {
//             $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
//         }
//         return true;
//     }
//     return false;
//      }

//     public static function findIdentity($id)
//     {
//         return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
//     }

//     public static function findIdentityByAccessToken($token, $type = null)
//     {

//         return static::findOne(['name' => $token]);
//     }


//    public  function validateAuthKey($authKey)
//     {
//         return $this->authKey === $authKey;
//     }

//     public function getId()
//     {
//         return $this->id;
//     }

//     public function getAuthKey()
//     {
//         return $this->authKey;
//     }

//} 