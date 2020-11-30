<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use app\models\Products;


class ProductsSearch  extends Products
{
    
    public function rules()
    {
        return [
            [['id','category_id'], 'integer'],
            [['name'], 'string'],
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
           'name' => $this->name,
            'category_id' => $this->category_id,
        ]);
      //  var_dump($query->createCommand()->getRawSql());die;


        $query->andFilterWhere(['like', 'name', $this->name]);
            // ->andFilterWhere(['like', 'category_id', $this->category_id]);
                //  var_dump($query->createCommand()->getRawSql());die;
                // var_dump($dataProvider->getTotalCount());die;
        return $dataProvider;
    }

    public function searchApi($params)
    {
       
        $query = Products::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 4]
         ] );
        
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
           'name' => $this->name,
            'category_id' => $this->category_id,
        ]);
      //  var_dump($query->createCommand()->getRawSql());die;


        $query->andFilterWhere(['like', 'name', $this->name]);
            // ->andFilterWhere(['like', 'category_id', $this->category_id]);
                //  var_dump($query->createCommand()->getRawSql());die;
                // var_dump($dataProvider->getTotalCount());die;
        return $dataProvider;
    }



    
}