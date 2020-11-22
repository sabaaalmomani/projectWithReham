<?php

namespace app\models;


class Products extends \yii\db\ActiveRecord 
{


    public static function tableName()
    {
        return 'products';
    }

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public function scenarios()
    { 
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] =  ['price','name','description','category_id','idate'];
        $scenarios[self::SCENARIO_UPDATE] = ['price','name','description','category_id','udate'];
        return $scenarios;  
    }

  


    public function rules()
    {
    return [
        [['name'], 'required'],
        [['price'],'required', 'on' => self::SCENARIO_CREATE],
        [['name','description','price','category_id'],'safe'],
      //  [['price'], 'number', 'numberPattern' => '/^[0-9]{1,2}([\.,][0-9]{1,2})*$/',
      //  'message' => 'Price must be between 1-100 JD AND must be number', 'max' => 110, 'min' => 1.00],
        [['price'], 'number','message' => 'Price must be between 1-100 JD AND must be number', 'max' => 110, 'min' => 1.00],
        [['name','description'], 'string'],

        [['id','category_id'], 'integer'],

    
        
    ];

    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description'=>'Description',
            'price'=>'Price',
            'idate'=>'idate',
            'udate'=>'Udate',
            'category_id'=>'Category'
        ];
    }
    

    



       public function behaviors()
       {
           return [
               'timestamp' => [
                   'class' => \yii\behaviors\TimestampBehavior::className(),
                   'attributes' => [
                       \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['idate'],
                       \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['udate'],
                   ],
                   'value' => new \yii\db\Expression('NOW()'),
               ],
           ];
       }

     
       public function getCategory()
       {

           return $this->hasOne(Categories::class,['id'=>'category_id']);

           }


        }

   // public function beforeSave($insert)}
       //{
      //  echo $this->scenario;die;
     //     $current_time = date('Y-m-d H:i:s');
    //     if ( $this->isNewRecord )
   //     {
  //        $this->idate = $current_time;
 //     }else{
 //        $this->udate = $current_time;
//     }
 //      return parent::beforeSave($insert);
// }
