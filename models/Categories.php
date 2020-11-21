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



        ];
    }
                




    
}