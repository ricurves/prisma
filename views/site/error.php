<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="page-header layout layout-north">
    <div class="pull-left">
        <h2>Error !</h2>
    </div>
    <div class="pull-right">
        
    </div>
    <div class="clearfix"></div>
</div>
<!-- END OF PAGE HEADER -->
<div id="contentpane" class="layout layout-center">
    <div class="pane layout layout-north">
        <div class="pull-left">
            &nbsp;
        </div>
        <div class="pull-right">

        
        </div>
        <div class="clearfix"></div>
    </div>
	
	<div class="layout layout-center" style="margin: 60px 10px;">
		<div class="alert alert-danger" >
	        <?= nl2br(Html::encode($message)) ?>
	    </div>
	
	    <p>
	        The above error occurred while the Web server was processing your request.
	    </p>
	    <p>
	        Please contact us if you think this is a server error. Thank you.
	    </p>
	</div>
	
    
</div>
<!--
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
-->