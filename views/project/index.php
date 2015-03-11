<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Project';
$this->params['breadcrumbs'][] = $this->title;
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
            <a href="#" class="btn btn-primary" onclick="addModal();return false;"><i class="fa fa-plus"></i> Add New Project</a>
        </div>
        <div class="pull-right">
            <select class="chosen-select" data-placeholder="Select Year..." style="width: 120px;">
                <option value=""></option>
                <option>2015</option>
                <option>2014</option>
                <option>2013</option>
            </select>
        </div>
        <div class="clearfix"></div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' =>'{items}\n{pager}\n{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tahun',
            'nama',
            'klien',
            'kode',
            // 'status',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<!-- Add Modal -->
<div class="modal zoom" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Project</h4>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="form-group">
                        <label>Year</label>
                        <select class="form-control">
                            <option>2015</option>
                            <option>2014</option>
                            <option>2013</option>
                            <option>2012</option>
                            <option>2011</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Client</label>
                        <input type="text" class="inputbox form-control">
                    </div>
                    <div class="form-group">
                        <label>Project</label>
                        <input type="text" class="inputbox form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="plugins/chosen/chosen.css">
<script type="text/javascript" src="plugins/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('.chosen-select').chosen({disable_search_threshold: 10});
    });
</script>
<script type="text/javascript">
    function addModal(){
        $('#add-modal').appendTo($('body')).modal();
    }
</script>
