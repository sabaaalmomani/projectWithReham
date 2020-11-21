<?php

use app\models\Categories;
use app\models\Products;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

<?php $form = ActiveForm::begin(['id' => 'home-search','method' => 'get', 'action' => Url::to(['products/index'])]); ?>
<?= $form->field($model, 'name')->textInput(array('placeholder' => 'Search Name','style'=>'width:300px'))->label("Name:") ?>
<?= $form->field($model, 'category_id')->dropDownList(
    ArrayHelper::map(Categories::find()->all(),'id','name'),
    ['prompt'=>'Select category','style'=>'width:300px'])->label(false) ?>

<div class="form-group search-button">
    <button type="submit" class="btn btn-primary" name="login-button">Search <i class="fa fa-lg fa-arrow-circle-o-right"></i></button>
</div>

<?php ActiveForm::end(); ?>

</div>