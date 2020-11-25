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




            // public function afterSave($insert, $changedAttributes)
            // {
            //                          {
            //                  $this->products_count=+1;
            //          }         
            //     Products::$model->updateCounters(['products_count'=>$this->products_count], 'id=:id',[':id'=>$this->id]);

            //     if ($this->products_count==($model->products.id)) {
            //         $this->products_count += 1;
            //         Cms::find()->count();
                      
                            // $model=$this->findModel($id);
                            // $model->status=0;
                            // $model->save();
            //         $this->products_count->save();
            //     }

            //         return  parent::afterSave($insert, $changedAttributes);
                    
            // }
            

/*

# self : model shift

payment = self.env['account.payment']

for record in self:

products_count = 0

category_id = payment.search([('shift_id', '=', self.id)])

if payment_ids:

for payment in payment_ids:

products_count += payment.total

record.current_balance = record.opening_balance + payment_total




*/
    
}  