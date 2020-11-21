<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 


?>

<div class="category-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'status')->dropDownList(['1' => 'active', '0' => 'not_active'],['prompt'=>'Select status']);
     ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>