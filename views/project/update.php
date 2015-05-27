<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-update">

    <div class="subheader">Update for Project <strong><?= Html::encode($this->title) ?></strong></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
