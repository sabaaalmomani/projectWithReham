<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use app\models\Products;


class ProductsSearch  extends Products
{
    
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'category'], 'string'],
        ];
    }

   
  
    public function search($params)
    {
       
        $query = Products::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5]
         ] );
        
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'category', $this->category]);
                // var_dump($query->createCommand()->getRawSql());die;
        return $dataProvider;
    }



    
}