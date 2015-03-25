<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="<?= Url::base() ?>/css/prisma.css" rel="stylesheet">

    <!-- PLUGINS FONTAWESOME -->
    <link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/plugins/font-awesome/css/font-awesome.min.css"/>

    <!-- CSS -->
    <link href="<?= Url::base() ?>/css/jmc_layout.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/jmc_widget.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/jmc_theme.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/jmc_responsive.css" rel="stylesheet">
	
	<!-- MAIN LIBRARY -->
    <script src="<?= Url::base() ?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?= Url::base() ?>/js/bootstrap.min.js"></script>
    <script src="<?= Url::base() ?>/js/application.js"></script>

    <!-- CHOSEN PLUGINS -->
    <link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/plugins/chosen/chosen.css">
	<script type="text/javascript" src="<?= Url::base() ?>/plugins/chosen/chosen.jquery.min.js"></script>
    
    <!-- PACE PLUGINS -->
    <link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/plugins/pace/pace.minimal.css"/>
    <script type="text/javascript" src="<?= Url::base() ?>/plugins/pace/pace.min.js"></script>

    <!-- SWEET ALERT PLUGINS -->
    <link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/plugins/sweet-alert/sweet-alert.css"/>
    <script type="text/javascript" src="<?= Url::base() ?>/plugins/sweet-alert/sweet-alert.min.js"></script>

    <!-- SLIMSCROLL PLUGINS -->
    <script type="text/javascript" src="<?= Url::base() ?>/plugins/slimscroll/jquery.slimscroll.min.js"></script>

</head>

<body>
<?php $this->beginBody() ?>
<div id="page" class="layout">
    <div id="jmc_navbar" class="navbar navbar-inverse layout layout-north">
        <div class="app-logo">
            <div class="mobile-menu-left visible-xs">
                <a href="#" class="btn btn-trans-white btn-icon mobile-menu-toggler" onclick="$('.topnav').toggle();"><i class="fa fa-bars"></i></a>
            </div>
            <a href="#">Prototype 2.4</a>
        </div>
        <ul class="nav navbar-nav navbar-left navbar-collapse collapse">
            <li><a href="#" class="sidebar-toggler"><i class="fa fa-bars"></i></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-collapse collapse">
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i></a>
                <ul class="dropdown-menu dropdown-notification">
                    <li><a href="#"><strong>You have 4 New Notification</strong></a></li>
                    
                    <li>
                        <a href="#">
                            <div class="pull-left">
                                <i class="fa fa-envelope fa-fw"></i> You Have 16 messages
                            </div>
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </a>
                    </li>

                    <li class="link"><a href="#">View All Notification</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i></a>
                <ul class="dropdown-menu dropdown-message">
                    <li><a href="#"><strong>You have 5 New Messages</strong></a></li>
                    
                    <li>
                        <a href="#">
                            <div class="message-avatar">
                                <img src="<?= Url::base() ?>/images/avatar/avatar.jpg" class="img-circle img-responsive pull-left">
                            </div>
                            <div class="message-text">
                                Duis mollis, est non commodo luctus, nisi erat porttitor ligula...
                            </div>
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </a>
                    </li>

                    <li class="link"><a href="#">View All Messages</a></li>
                </ul>
            </li>
            <li><a href="#" class="btn btn-signout" onclick="logOut();return false;">Sign Out <i class="fa fa-arrow-circle-right"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div id="jmc_sidebar" class="layout layout-west">
        
        <div class="sidebar-profile layout layout-north">
		    <div class="avatar"><img class="img-responsive" src="<?= Url::base() ?>/images/avatar/avatar.jpg"></div>
		    <h4><?= Html::encode(Yii::$app->user->identity->nama) ?></h4>
		    <small class="title"><?= Html::encode(Yii::$app->user->identity->job) ?></small>
		    <small class="title"><?= Html::encode(Yii::$app->user->identity->divisi) ?></small>
		</div>
		<div class="layout layout-center scroll">
		<ul class="nav nav-sidebar">
		    <li><a href="admin.php"><img class="icon" src="<?= Url::base() ?>/images/icon/home.png"> Dashboard</a></li>
		    <li><a href="admin.php?page=plan"><img class="icon" src="<?= Url::base() ?>/images/icon/calendar-month.png"> Plan</a></li>
		    <li><a href="admin.php"><img class="icon" src="<?= Url::base() ?>/images/icon/category.png"> Tasks</a></li>
		    <li><a href="admin.php"><img class="icon" src="<?= Url::base() ?>/images/icon/briefcase.png"> Project</a></li>
		    <li class="divider"></li>
		    <li><a href="admin.php"><img class="icon" src="<?= Url::base() ?>/images/icon/users.png"> Resource</a></li>
		    <li><a href="admin.php"><img class="icon" src="<?= Url::base() ?>/images/icon/report.png"> Report</a></li>
		    <li><a href="#"><img class="icon" src="<?= Url::base() ?>/images/icon/books.png"> Reference <i class="fa fa-chevron-right pull-right"></i></a>
		        <ul>
		            <li><a href="<?= Url::to(['project/index']) ?>">Project</a></li>
		            <li><a href="admin.php?page=referensi_task_category">Task Category</a></li>
		            <li><a href="admin.php?page=referensi_user">User</a></li>
		            <li><a href="#">Job</a></li>
		            <li><a href="#">Departement</a></li>
		        </ul>
		    </li>
		</ul>
		</div>
		<div class="layout layout-south">
		    <div style="text-align:center;padding:10px;border-top:1px solid #ddd;">JMC IT Consultant</div>
		</div>
        
    </div>
    <div id="jmc_body" class="layout layout-center">
        <?= $content; ?>
    </div>
</div>
<script type="text/javascript">
    function logOut(){
        swal({   
            title: "Log Out",   
            text: "Apakah anda yakin ingin keluar dari sistem?",   
            type: "warning",   
            showCancelButton: true,   
            cancelButtonText:'Cancel',
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Sign Out!",   
            closeOnConfirm: false 
        }, function(){   
            location.href="<?= Url::to(['site/logout']) ?>"
        });
    }
</script>    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
