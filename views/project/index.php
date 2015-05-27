<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Project';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<strong>Project Form</strong>',
    'id' => 'modal',
    'closeButton' => [],
]);

echo "<div id='modalContent'></div>";
Modal::end();

?>


<!-- BEGIN PAGE HEADER -->
<div class="page-header layout layout-north">
    <div class="pull-left">
        <h2><img src="<?= Url::base() ?>/images/icon/books.png"> Reference Project</h2>
    </div>
    <div class="pull-right">

        <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        
    </div>
    <div class="clearfix"></div>
</div>
<!-- END OF PAGE HEADER -->
<div id="contentpane" class="layout layout-center">
    <div class="pane layout layout-north">
        <div class="pull-left">
        	<?= Html::button('<i class="fa fa-plus"></i> Add New Project', ['value' => Url::to(['project/create']), 'class' => 'btn btn-primary', 'onclick' => 'showModal(this)']) ?>
        </div>
        <div class="pull-right">
        	
            <?= Html::beginForm(Url::to(['project/index'])) ?>
            	
	            <?=
	            	Html::dropDownList(
	            		'filter_year',
	            		Yii::$app->session['filter_year'],
						ArrayHelper::map($yearModel, 'nama', 'nama'),
						[
							'class' => 'chosen-select',
							'style' => 'width:80px',
							'onchange' => '$(this).parent().submit()',
						]
					);
	            ?>
	            
	            <input type="text" name="filter_key" style="width:200px" placeholder="Pencarian..." class="inputbox" value="<?= Yii::$app->session['filter_key'] ?>" />
	            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Cari</button>
            <?= Html::endForm() ?>
        
        </div>
        <div class="clearfix"></div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $model->search(),
        'tableOptions' => ['class' => 'data table-strip'],
        'options' => ['class' => 'layout layout-center'],
        'layout' => Yii::$app->params['gridLayout'],
        'columns' => [
            [
            	'class' => 'yii\grid\SerialColumn',
            	'header' => 'No',
            	'contentOptions' => ['align' => 'right'],
            	'headerOptions' => ['width' => '40'],
            ],
            [
            	'class' => 'yii\grid\ActionColumn',
            	'header' => 'Aksi',
            	'headerOptions' => ['width' => '60'],
            	'contentOptions' => ['align' => 'center', 'class' => 'action'],
            	'template' => '{update} {delete}',
            	
            	'buttons' => [
            		'update' => function ($url, $model, $key){
            			return Html::button('<i class="fa fa-edit"></i>', ['value' => $url, 'class' => 'btn btn-default', 'onclick' => 'showModal(this)']);
            		},
            		'delete' => function ($url, $model, $key){
            			return Html::a('<i class="fa fa-trash-o"></i>', $url, ['class' => 'btn btn-default confirm', 'data-title' => 'Delete Data', 'tiltle' => 'Delete']);
            		}
            	]
            	
            ],
            [
            	'attribute' => 'tahun',
            	'headerOptions' => ['width' => '60'],
            ],
            [
            	'attribute' => 'kode',
            	'headerOptions' => ['width' => '100'],
            ],
            'nama',
            'klien',
        ],
    ]); ?>
    
</div>
		
<script type="text/javascript">
	function showModal(element){
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(element).attr('value'))
	};
</script>