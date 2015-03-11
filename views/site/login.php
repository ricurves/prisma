<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
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
    <title>Prisma 2.4 Login Page</title>
	<?php $this->head() ?>
	<link href="<?= Url::base() ?>/css/login.css" rel="stylesheet">
    <!-- PLUGINS FONTAWESOME -->
    <link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/plugins/font-awesome/css/font-awesome.min.css"/>

</head>
<body>
	
<?php $this->beginBody() ?>
    <div class="login-container">
        <div class="col-md-8 leftside">
            <div class="login-image">
                <img src="<?= Url::base() ?>/images/login/login-image.png">
                <h4 class="title"><?php echo $title;?></h4>
            </div>
            <div class="login-client">
                <div class="client-logo"><img src="<?= Url::base() ?>/images/client-logo.png" alt="" style="width:60px;height:60px;"></div>
                <h2>PRISMA 2.4</h2>
                <p>Project Indexs and Scheduling Management</p>
            </div>
        </div>
        <div class="col-md-4 rightside">

            <div class="heading">
                <h3>User Login</h3>
            </div>
            <div class="notice">
                Please enter <strong>username</strong> and <strong>password</strong> to login to system!
            </div>
            
            <?php $form = ActiveForm::begin(['id' => 'login-form',]); ?>
            
                <div class="form-group">
                    <div class="input-bg">
                        <i class="fa fa-user icon"></i>
                        <?= 
                        	$form->field($model, 'username', [
                        		'inputOptions' => [
                        			'class' => 'form-control',
                        			'placeholder' => 'Username',
                        			],
                        		])
                        	->label(false); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-bg">
                        <i class="fa fa-lock icon"></i>
                        <?= 
                        	$form->field($model, 'password', [
                        		'inputOptions' => [
                        			'class' => 'form-control',
                        			'placeholder' => 'Password',
                        			],
                        		])
                        	->label(false)
							->passwordInput(); 
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6" style="padding-left:5px;">
                        <button type="submit" class="btn btn-primary btn-block">Sign In <i class="go go-arrow-forward"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
          	
          	<?php ActiveForm::end(); ?>
          	
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="footer">
        <img src="<?= Url::base() ?>/images/footer.png">
    </div>

<?php $this->endBody() ?>    
</body>
</html>
<?php $this->endPage() ?>
