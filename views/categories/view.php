<?php

use yii\widgets\DetailView;
use yii\helpers\Html;


$this->title = $model->id;
yii\web\YiiAsset::register($this);

$this->title = 'view';
$this->params['breadcrumbs'][] = ['label' => 'Category', 'url' => ['categories/index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'status',	
          
           
        ],
    ]) ?>

</div>