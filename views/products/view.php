<?php

use yii\widgets\DetailView;
use yii\helpers\Html;


$this->title = $model->id;
yii\web\YiiAsset::register($this);
//echo '<pre>';
//var_dump($model->category);die;
$this->title = 'view';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',	
            'idate',
            'udate',
            'price',
            [
            'label'=>'category',
            'value'=>($model->category)?$model->category->name:'',
            ],
            [
            'attribute'=>'product_image',
            'value'=>yii::getAlias('@productsimgurl').'/' . $model->product_image,
            'format'=>['image']
            ]
           
            ],
             ]) ?>

</div>