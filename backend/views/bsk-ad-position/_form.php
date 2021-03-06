<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BskAdPosition */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bsk-ad-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'key')->textInput(['maxlength' => true, 'placeholder' => '如: index-carousel']) ?>

    <?php echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'image')->widget(\trntv\filekit\widget\Upload::classname(), [
        'url'=>['ad-thumb-upload']
    ]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
