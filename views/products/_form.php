<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categories;

?>


<div class="product-form">

<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        
    ArrayHelper::map(categories::find()->where(['status'=>1])->all(),'id','name'))->label("Add Category");?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'product_image')->fileInput()?>


    <div class="form-group">

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end();?>

</div>
