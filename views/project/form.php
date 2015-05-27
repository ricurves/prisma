<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if(!$model->isNewRecord): ?>
	<div class="subheader">Update for Project <strong><?= Html::encode($model->kode) ?></strong></div>
<?php endif; ?>

<div class="project-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'tahun')->textInput() ?>
    
    <?= $form->field($model, 'kode')->textInput(['maxlength' => 20, 'style' => 'width: 200px']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'klien')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'id_status')->textInput() ?>

    <div class="form-group" style="text-align: right">
        <?= Html::submitButton($model->isNewRecord ? 'Create &raquo;' : 'Update &raquo;', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
