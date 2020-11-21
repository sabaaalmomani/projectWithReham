<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'products';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php echo $this->render('_search', ['model' => $searchModel]);  ?> 


<?= Html::a('Add product', ['create'], ['class' => 'btn btn-success']) ?>  
<?= Html::a('Categories ', ['categories/index'], ['class' => 'btn btn-success']) ?><br><br>

<?=  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [  'label' => 'Category',
               'attribute'=>'category_id',
               'value'=> 'category.name',
           ],
            'description',
            'idate',
            'udate',
            'price',
          
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]);
     ?>


   

</div>