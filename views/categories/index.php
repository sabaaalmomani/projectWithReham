<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;


$this->title = 'products';
$this->params['breadcrumbs'][] = $this->title;

?>

 <?= Html::a('Products ', ['products/index'], ['class' => 'btn btn-success']) ?>

 <?= Html::a('Add category ', ['categories/create'], ['class' => 'btn btn-success']) ?>



<?=  GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          
            'id',
            'name',
           
            [
                'attribute'=>'status',
                'filter' => ['1'=>'active', '0'=>'not_active'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->status == '1')
                    {
                        return 'active';
                    }
                    else
                    {   
                        return 'not_active';
                    }
                },
            ],
              
             ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
     ?>


   

</div>