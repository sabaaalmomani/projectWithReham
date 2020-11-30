<?php

namespace app\models;


class Categories extends \yii\db\ActiveRecord 
{


    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
     return [
         [['name'], 'required',],
         [['id'], 'integer'],
         [['status'], 'integer'],
         
     ];

    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status'=>'Status',
            'idate'=>'idate',
            'udate'=>'udate',
            'products_count'=>'products_count',
        ];
    }
                
     public function beforeSave($insert)
     {
       $current_time = date('Y-m-d H:i:s');
          if ( $this->isNewRecord )
        {
          $this->idate = $current_time;
         } 
         else{
          $this->udate = $current_time;
         }
          return parent::beforeSave($insert);
     }

     

     


}  