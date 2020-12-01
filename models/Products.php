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
        $scenarios[self::SCENARIO_CREATE] =  ['price','name','description','category_id','idate','product_image'];
        $scenarios[self::SCENARIO_UPDATE] = ['price','name','description','category_id','udate','product_image'];
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
        [['product_image'], 'file', 'extensions' => 'png, jpg, jpeg'],
        [['id','category_id'], 'integer'],
        [['idate', 'udate'], 'date', 'format' => 'php:Y-m-d H:i:s'],

    
        
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
            'udate'=>'udate',
            'category_id'=>'Category',
            'product_image'=>'product_image',
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
     

       public function getImageurl()
        {
             return \Yii::$app->request->BaseUrl.'http://localhost:8080/images/products/' . $this->product_image ;
         }
     
         
       public function getCategory()
       {

           return $this->hasOne(Categories::class,['id'=>'category_id']);

       }
       




    
        public function afterSave($insert, $changedAttributes)
        {  
        $products= Products::find()->where(['category_id'=>$this->category_id])->count();
        $model = Categories::findOne($this->category_id);
        $model->products_count =$products;
        $model->save();
        }
        // $model = $this->category;
        // $model->products_count =$products_count;
        // $model->save();
        // $this->category->products_count = count($products);
        // $this->category->save();
            
          
        }
